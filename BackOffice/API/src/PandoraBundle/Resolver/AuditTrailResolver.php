<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Entity\Audittrail;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\Joinery\AuditTrailJoinery;

class AuditTrailResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Audittrail';
        $this->rawFieldArrayJoinery = AuditTrailJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
    }
    
    public function tagRecordAsViewed($args = []){
        
        // DETERMINE SOURCEOBJECT
        $systeModuleIds = new SystemModulesIntTypeEnum();
        
        $audit = new Audittrail();
        $audit->setSourceObject($args['entity']['SourceObject']); // 1000 MEANs NOT EXISTENT IN SystemModulesIntTypeEnum()
        $audit->setSourceObjectId($args['entity']['SourceObjectId']);
        
        $audit->setAuditDescription(json_encode([
            'obj' => $systeModuleIds->parseInputValue((int) $args['entity']['SourceObject']),
            'objId' => $args['entity']['SourceObjectId'],
            'mode' => 'viewed'
        ]));
        
        // SYSTEM INFO
        $currentAspNetId = $this->currentUser->getAspNetUserId();
        $audit->setCreatedById($currentAspNetId);
        $audit->setModifiedById($currentAspNetId);
        $audit->setRevisionBy($this->currentUser->getUsername());
        $audit->setDateCreated(new \DateTime('NOW'));
        $audit->setDateModified(new \DateTime('NOW'));
        
        $this->pandora_em->persist($audit);
        $this->pandora_em->flush();
        
        return $audit->getId();
    }
}