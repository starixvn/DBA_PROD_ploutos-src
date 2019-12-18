<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\UniqueDepositAmount;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\UniqueDepositAmountJoinery;
use PandoraBundle\GraphQL\Type\UniqueDepositAmount\UniqueDepositAmountType;

class UniqueDepositAmountListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Unique Deposit Amount List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = UniqueDepositAmountJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new UniqueDepositAmountType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new UniqueDepositAmountType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new UniqueDepositAmountType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\UniqueDepositAmountResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}