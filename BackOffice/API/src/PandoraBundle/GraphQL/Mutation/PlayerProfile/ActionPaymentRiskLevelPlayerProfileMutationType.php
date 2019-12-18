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
use Youshido\GraphQL\Type\NonNullType;
use PandoraBundle\GraphQL\Type\PlayerProfile\PlayerProfileType;
use PandoraBundle\Resolver\PlayerProfileResolver;
use Youshido\GraphQL\Type\Scalar\IdType;

class ActionPaymentRiskLevelPlayerProfileMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Action Payment Risk Level';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'PaymentRiskLevelId' => new NonNullType(new IdType()),
        ]);
    }
    
    public function getType()
    {
        return new PlayerProfileType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if($args['Id'] > 0 && $args['PaymentRiskLevelId'] > 0){
            $entityResolver = $this->container->get(PlayerProfileResolver::class);
            $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
            $entityResolver->initEntityResolver();
            return $entityResolver->updatePaymentRiskLevelId($args['Id'], $args['PaymentRiskLevelId']);
        }
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}