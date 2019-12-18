<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PaymentGateway;

use PandoraBundle\GraphQL\Type\PaymentGateway\PaymentGatewayType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use PandoraBundle\Resolver\PaymentGatewayResolver;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\NonNullType;

class PaymentGatewayField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Gateway View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
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
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();

        return $entityResolver->getQueryBuilderSingleResult();
    }

}