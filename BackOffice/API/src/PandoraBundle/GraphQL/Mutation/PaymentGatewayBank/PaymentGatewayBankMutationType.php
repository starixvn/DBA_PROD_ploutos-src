<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PaymentGatewayBank;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\PaymentGatewayBank\PaymentGatewayBankType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\PaymentGatewayBankJoinery;
use PandoraBundle\Resolver\PaymentGatewayBankResolver;
use PandoraBundle\Entity\PaymentGatewaybanks;

class PaymentGatewayBankMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Gateway Bank Create/Edit ';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new PaymentGatewayBankType(), PaymentGatewayBankJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PaymentGatewayBankType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PaymentGatewayBankResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(PaymentGatewaybanks::class);
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