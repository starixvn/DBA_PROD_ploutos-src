<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PlayerProviderLocking;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\PlayerProviderLocking\PlayerProviderLockingType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\PlayerProviderLockingJoinery;
use PandoraBundle\Resolver\PlayerProviderLockingResolver;
use PandoraBundle\Entity\Playerproviderlocking;

class PlayerProviderLockingMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Player Provider Locking Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new PlayerProviderLockingType(), PlayerProviderLockingJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PlayerProviderLockingType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerProviderLockingResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Playerproviderlocking::class);
        $entityResolver->validateEntity();
        
        if($entityResolver->mergeEntity()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
        
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}