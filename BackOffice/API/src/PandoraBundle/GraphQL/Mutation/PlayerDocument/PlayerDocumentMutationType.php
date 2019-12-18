<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\PlayerDocument;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\GraphQL\Type\PlayerDocument\PlayerDocumentType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\PlayerDocumentJoinery;
use PandoraBundle\Resolver\PlayerDocumentResolver;
use PandoraBundle\Entity\Playerdocuments;
use PandoraBundle\Resolver\FileManagedResolver;

class PlayerDocumentMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Document Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new PlayerDocumentType(), PlayerDocumentJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PlayerDocumentType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if(isset($args['entity']['FileIds'])){
            $fileIds = $args['entity']['FileIds'];
            unset($args['entity']['FileIds']);
        }else{
            // DEFAULT ERROR
            throw new \Exception('Document File is required.');
        }
        
        $entityResolver = $this->container->get(PlayerDocumentResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Playerdocuments::class);
        $entityResolver->mapRelatedObject();
        $entityResolver->validateEntity();
        
        $entityId = $entityResolver->mergeEntity();
        if($entityId){
            
            if(isset($fileIds)){
                $systemEnum = new SystemModulesIntTypeEnum();
                $fileResolver = $this->container->get(FileManagedResolver::class);
                $fileResolver->updateFileRecordAttachment($fileIds, (int) $entityId, (int) $systemEnum->parseValue('Playerdocuments'));
            }
            
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}