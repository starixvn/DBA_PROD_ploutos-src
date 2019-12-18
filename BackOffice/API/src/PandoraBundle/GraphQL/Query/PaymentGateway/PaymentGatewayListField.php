<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PaymentGateway;

use PandoraBundle\GraphQL\Type\PaymentGateway\PaymentGatewayType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use PandoraBundle\Resolver\PaymentGatewayResolver;
use PandoraBundle\Joinery\PaymentGatewayJoinery;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;

class PaymentGatewayListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Gateway List';
    }

    public function build(FieldConfig $config)
    {
        $fields = PaymentGatewayJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PaymentGatewayType(), array_keys($fields)),
            'filter' => new FilterParamsType(new PaymentGatewayType(), $fields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new PaymentGatewayType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PaymentGatewayResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
}