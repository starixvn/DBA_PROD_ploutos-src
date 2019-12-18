<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\WalletWithdrawal;

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
use PandoraBundle\Joinery\WalletWithdrawalJoinery;
use PandoraBundle\GraphQL\Type\WalletWithdrawal\WalletWithdrawalType;
use PandoraBundle\Resolver\WalletWithdrawalResolver;

class WalletWithdrawalListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Withdrawal List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = WalletWithdrawalJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new WalletWithdrawalType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new WalletWithdrawalType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
            'start_deposit_date' => new DateTimeType('m/d/Y'),
            'end_deposit_date' => new DateTimeType('m/d/Y')
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new WalletWithdrawalType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(WalletWithdrawalResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}