<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\WalletLedger;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\WalletLedger\WalletLedgerType;
use PandoraBundle\Joinery\WalletLedgerJoinery;
use PandoraBundle\Resolver\WalletLedgerResolver;

class WalletLedgerListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Wallet Ledger List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = WalletledgerJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new WalletLedgerType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new WalletLedgerType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new WalletLedgerType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(WalletLedgerResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}