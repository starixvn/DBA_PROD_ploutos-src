<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\RecordViewed;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Resolver\RecordViewedResolver;
use PandoraBundle\GraphQL\Type\RecordViewed\RecordViewedType;
use PandoraBundle\Joinery\RecordViewedJoinery;
use PandoraBundle\Entity\Recordviewed;

class RecordViewedMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Record Viewed Add / Remove';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new RecordViewedType(), RecordViewedJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new RecordViewedType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(RecordViewedResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Recordviewed::class);
        $entityResolver->initEntityResolver();
        
        // DELETE
        if(isset($args['entity']['Id']) && $args['entity']['Id'] > 0){
            return $entityResolver->deleteRecordViewedEntity($args['entity']['Id']);
        }else{
            // CREATE
            $entityResolver->validateEntity();
            if($entityResolver->mergeEntity()){
                $entityResolver->prepareQueryBuilder();
                return $entityResolver->getQueryBuilderSingleResult();
            }
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}