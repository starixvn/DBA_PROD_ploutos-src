<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\WalletAdjustmentMemo;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\WalletAdjustmentMemoJoinery;
use PandoraBundle\GraphQL\Type\WalletAdjustmentMemo\WalletAdjustmentMemoType;
use PandoraBundle\Resolver\WalletAdjustmentMemoResolver;

class WalletAdjustmentMemoListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Debit/Credit Memo List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = WalletAdjustmentMemoJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new WalletAdjustmentMemoType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new WalletAdjustmentMemoType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
            'debit_memo' => new NonNullType(new BooleanType()),
            'credit_memo' => new NonNullType(new BooleanType()),
            'start_date' => new DateTimeType('m/d/Y'),
            'end_date' => new DateTimeType('m/d/Y')
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new WalletAdjustmentMemoType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(WalletAdjustmentMemoResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}