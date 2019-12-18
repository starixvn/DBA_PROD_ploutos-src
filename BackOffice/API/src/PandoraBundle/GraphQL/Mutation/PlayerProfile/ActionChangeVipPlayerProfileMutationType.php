<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PlayerProfile;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Type\PlayerProfile\PlayerProfileType;
use PandoraBundle\Resolver\PlayerProfileResolver;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;

class ActionChangeVipPlayerProfileMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Action Change VIP Level';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'VipLevelId' => new NonNullType(new IdType()),
        ]);
    }
    
    public function getType()
    {
        return new PlayerProfileType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if($args['Id'] > 0 && $args['VipLevelId'] > 0){
            $entityResolver = $this->container->get(PlayerProfileResolver::class);
            $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
            $entityResolver->initEntityResolver();
            return $entityResolver->updateVipLevelId($args['Id'], $args['VipLevelId']);
        }
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}