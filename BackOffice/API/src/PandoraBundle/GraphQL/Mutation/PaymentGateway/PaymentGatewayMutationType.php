<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PaymentGateway;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\PaymentGateway\PaymentGatewayType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use PandoraBundle\Resolver\PaymentGatewayResolver;
use PandoraBundle\Joinery\PaymentGatewayJoinery;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\Entity\Paymentgateways;

class PaymentGatewayMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Gateway Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new PaymentGatewayType(), PaymentGatewayJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PaymentGatewayType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PaymentGatewayResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Paymentgateways::class);
        $entityResolver->mapRelatedObject();
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