<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\ABBetHistory;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\ABBetHistoryJoinery;
use PandoraBundle\Resolver\ABBetHistoryResolver;
use PandoraBundle\GraphQL\Type\ABBetHistory\ABBetHistoryType;

class ABBetHistoryListField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $playerProfileFields = ABBetHistoryJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new ABBetHistoryType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new ABBetHistoryType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new ABBetHistoryType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(ABBetHistoryResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}