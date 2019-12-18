<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PaymentMethod;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\PaymentMethod\PaymentMethodType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\PaymentMethodJoinery;
use PandoraBundle\Resolver\PaymentMethodResolver;
use PandoraBundle\Entity\Paymentmethods;

class PaymentMethodMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Payment Method Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new PaymentMethodType(), PaymentMethodJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PaymentMethodType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // CASTING
        $args['entity']['UniqueDepositAmountRuleId'] = (int) $args['entity']['UniqueDepositAmountRuleId'];
        $entityResolver = $this->container->get(PaymentMethodResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Paymentmethods::class);
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