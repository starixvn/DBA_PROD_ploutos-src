<?php
namespace PandoraBundle\EventListener;

use ReflectionClass;
use Doctrine\ORM\Events;
use PandoraBundle\Entity\Comments;
use PandoraBundle\Entity\Audittrail;
use Doctrine\Common\EventSubscriber;
use PandoraBundle\Entity\Filemanaged;
use PandoraBundle\Entity\Playerregistrations;
use PandoraBundle\Entity\Recordviewed;
use PandoraBundle\Entity\Bankaccounts;
use Doctrine\ORM\Event\OnFlushEventArgs;
use PandoraBundle\Entity\Paymentmethods;
use PandoraBundle\Entity\Transactiongrabs;
use Doctrine\Common\Annotations\AnnotationReader;
use PandoraBundle\Annotations\EnumFieldAnnotation;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

/**
 * Listens for changes on Student entity and reacts accordingly when certain
 * properties are changed.
 *
 * @author johnkary
 */
class EntityEventListener implements EventSubscriber
{
    private $tokenStorage;
    
    public function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    
    public function getSubscribedEvents()
    {
        return array(Events::onFlush);
    }
    /**
     * @param OnFlushEventArgs $args
     */
    public function onFlush(OnFlushEventArgs $args)
    {
        $em = $args->getEntityManager();
        $unitOfWork = $em->getUnitOfWork();
        $annotationReader = new AnnotationReader();
        
        foreach ($unitOfWork->getScheduledEntityUpdates() as $entity) {
            
            // IGNORE ENTITIES THAT IS MANAGED BY THE SYSTEM
            if($entity instanceof Audittrail || $entity instanceof Recordviewed || $entity instanceof Filemanaged || $entity instanceof Comments || $entity instanceof Transactiongrabs){
                return;
            }
            
            // GET CHANGED VALUES
            // $unitOfWork->computeChangeSets();
            $entityChanges = $unitOfWork->getEntityChangeSet($entity);
            $entityChanges = array_diff_key($entityChanges, array_flip(['DateModified', 'DateCreated', 'CreatedById', 'ModifiedById']));
            
            // EXIT IF THERE IS NO CANDIDATE ON CHANGEs
            if(count($entityChanges) == 0){
                return;
            }
            
            // GET ENITY INFOs
            $entityReflection = new ReflectionClass($entity);
            $entityMetadata = $em->getClassMetadata(get_class($entity));
            
            // EXTRACT CLASS NAME
            $entityName = explode('\\', $entityMetadata->name);
            $entityName = $entityName[key(array_slice($entityName, -1, 1, TRUE))];
            
            // CHANGED VALUES WRAPPER
            $auditDescription = [
                'obj' => $entityName,
                'objId' => $entity->getId(),
                'mode' => 'edit',
                'items' => [],
            ];
            
            foreach ($entityChanges as $key => $changedProperty){
                // DEFAULT CHANGED VALUES
                $changedField = ['fld' => $key, 'ov' => '', 'nv' => ''];
                
                // FURTHER PROCESS FIELDS THAT ARE NON-NORMAL LIKE ENUms, RELATIONSHIP, BOOLEANs AND OTHERs
                if(isset($entityMetadata->fieldMappings[$key])){
                    
                    $changedField['ov'] = $this->finalizeChangedValue($changedProperty[0]);
                    $changedField['nv'] = $this->finalizeChangedValue($changedProperty[1]);
                    
                    switch ($entityMetadata->fieldMappings[$key]['type']){
                        case 'bigint':
                            // IF FIELD IS IN MAPPING NO NEED TO LOG
                            if($this->fieldIsInMapping($key, $entityMetadata->associationMappings)){
                                $changedField['ov'] = '';
                                $changedField['nv'] = '';
                            }
                            break;
                        case 'integer':
                            $refProp = $entityReflection->getProperty($key);
                            $annotations = $annotationReader->getPropertyAnnotations($refProp);
                            $hasEnumAnnotation = $this->getEnumFieldAnnotation($annotations);
                            
                            if($hasEnumAnnotation){
                                $enumClassName = 'PandoraBundle\GraphQL\Enum\\'.$hasEnumAnnotation->eNumClass;
                                $enumClass = new $enumClassName;
                                $changedField['ov'] = $enumClass->parseInputValue($changedProperty[0]);
                                $changedField['nv'] = $enumClass->parseInputValue($changedProperty[1]);
                            }
                            break;
                        case 'boolean':
                            $changedField['ov'] = $changedProperty[0] ? 'Checked' : 'UnChecked';
                            $changedField['nv'] = $changedProperty[1] ? 'Checked' : 'UnChecked';
                            break;
                        
                        default:
                    }
                }else{
                    // POROCESS ASSOCIATION CHANGES
                    // GET THE RECORD FIELD ON NEW CLASS VALUE INSTEAD OF OLD
                    $classAnnotations = $annotationReader->getClassAnnotations(new ReflectionClass($entityMetadata->associationMappings[$key]['targetEntity']));
                    $classRecordNameAnnotation = $this->getRecordNameFieldAnnotation($classAnnotations);
                    $methodName = 'get'.(($classRecordNameAnnotation) ? $classRecordNameAnnotation->candidateRecordNameField : 'Id');
                    
                    try{
                        $changedField['ov'] = $changedProperty[0]->$methodName();
                    }catch (\Throwable $error){
                        $changedField['ov'] = '';
                    }
                    try{
                        $changedField['nv'] = $changedProperty[1]->$methodName();
                    }catch (\Throwable $error){
                        $changedField['nv'] = '';
                    }
                }
                
                // FEED TO SINGLE ARRAY IF NOT EMPTY
                $auditDescription['items'][] = $changedField;
            }
            
            // SPECIAL CASE FOR MANY-TO-MANY ASSOCIATION
            if($entity instanceof Bankaccounts && $entity->getBankAccountPaymentMethod()->isDirty()){
                $classAnnotations = $annotationReader->getClassAnnotations(new ReflectionClass(Paymentmethods::class));
                $classRecordNameAnnotation = $this->getRecordNameFieldAnnotation($classAnnotations);
                $classRecordNameAnnotation = ($classRecordNameAnnotation) ? 'get'.$classRecordNameAnnotation->candidateRecordNameField : 'getId';
                
                // GET OLD AND NEW ASSOCIATION
                $newRelatedItems = $this->getAssociatedItemsInfo($entity->getBankAccountPaymentMethod(), $classRecordNameAnnotation);
                $oldRelatedItems = $this->getAssociatedItemsInfo($entity->getBankAccountPaymentMethod()->getSnapshot(), $classRecordNameAnnotation);
                
                // FEED TO TRAIL-MIX IF THERE IS DIFFs
                $hadChanged = count($newRelatedItems) == count($oldRelatedItems) && !array_diff($newRelatedItems, $oldRelatedItems);
                if(!$hadChanged){
                    $auditDescription['items'][] = ['fld' => 'PaymentMethods', 'ov' => implode(', ', $oldRelatedItems), 'nv' => implode(', ', $newRelatedItems)];
                }
            }
            
            // DETERMINE SOURCEOBJECT
            $systeModuleIds = new SystemModulesIntTypeEnum();
            $sourceObject = $systeModuleIds->parseValue($entityName);
            $sourceObjectId = $entity->getId();
            
            // HANDLE SPECIAL CASE OF PLAYER PROFILE AND PLAYER REGISTRATION ENTITY
            if($entity instanceof Playerregistrations){
                try{
                    $playerEntity = $em->getRepository('PandoraBundle:Playerprofiles')->findOneBy(['PlayerRegistrationId' => $entity->getId()]);
                    $auditDescription['obj'] = 'Playerprofiles';
                    $auditDescription['objId'] = $playerEntity->getId();
                    $sourceObject = $systeModuleIds->parseValue('Playerprofiles');
                    $sourceObjectId = $playerEntity->getId();
                }catch (\Exception $error){
                    // TODO: IMPLEMENT LOG FILEs
                }
            }
            
            $audit = new Audittrail();
            $audit->setSourceObject($sourceObject ? $sourceObject : 1000); // 1000 MEANs NOT EXISTENT IN SystemModulesIntTypeEnum()
            $audit->setSourceObjectId($sourceObjectId);
            $audit->setAuditDescription(json_encode($auditDescription));
            
            // SYSTEM INFO
            $currentAspNetId = $this->tokenStorage->getToken()->getUser()->getAspNetUserId();
            $audit->setCreatedById($currentAspNetId);
            $audit->setModifiedById($currentAspNetId);
            $audit->setRevisionBy($this->tokenStorage->getToken()->getUsername());
            $audit->setDateCreated(new \DateTime('NOW'));
            $audit->setDateModified(new \DateTime('NOW'));
            
            $em->persist($audit);
            $classMetadata = $em->getClassMetadata(Audittrail::class);
            $unitOfWork->computeChangeSet($classMetadata, $audit);
        }
    }
    
    private function getAssociatedItemsInfo($entities = [], $recordName = ''){
        $returnValues = [];
        foreach ($entities as $entity){
            $returnValues[] = $entity->$recordName();
        }
        return $returnValues;
    }
    
    private function fieldIsInMapping($fieldName = '', $fieldMappings = []){
        foreach ($fieldMappings as $fields){
            if(isset($fields['sourceToTargetKeyColumns']) && isset($fields['sourceToTargetKeyColumns'][$fieldName])){
                return true;
            }
        }
        return false;
    }
    
    private function getEnumFieldAnnotation($objects){
        // TODO: IMPROVE THIS, PUT THE ANNOTATION ON TOP SO WE KNOW IT IS ALWAYS ON TOP OF INDEXED ARRAY
        foreach ($objects as $object){
            if($object instanceof EnumFieldAnnotation){return $object;}
        }
        return false;
    }
    
    private function getRecordNameFieldAnnotation($objects){
        // TODO: IMPROVE THIS, PUT THE ANNOTATION ON TOP SO WE KNOW IT IS ALWAYS ON TOP OF INDEXED ARRAY
        foreach ($objects as $object){
            if($object instanceof RecordNameFieldAnnotation){return $object;}
        }
        return false;
    }
    
    private function finalizeChangedValue($value){
        $returnValue = $value;
        if($returnValue instanceof \DateTime){
            $returnValue = $returnValue->format('Y-m-d h:m:s');
        }
        return $returnValue;
    }
    
    /**
    * Converts camelCase string to have spaces between each.
    * @param $camelCaseString
    * @return string
    */
    private function fromCamelCaseToWords($camelCaseString) {
        $re = '/(?<=[a-z])(?=[A-Z])/x';
        $a = preg_split($re, $camelCaseString);
        return join($a, " " );
    }
}