<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerMessageSeenHistory;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\PlayerMessageSeenHistoryJoinery;
use PandoraBundle\Resolver\PlayerMessageSeenHistoryResolver;
use PandoraBundle\GraphQL\Type\PlayerMessageSeenHistory\PlayerMessageSeenHistoryType;

class PlayerMessageSeenHistoryListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Message Seen History List';
    }

    public function build(FieldConfig $config)
    {
        $playerMessagesSeenHistoryFields = PlayerMessageSeenHistoryJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PlayerMessageSeenHistoryType(), array_keys($playerMessagesSeenHistoryFields)),
            'filter' => new FilterParamsType(new PlayerMessageSeenHistoryType(), $playerMessagesSeenHistoryFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new PlayerMessageSeenHistoryType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerMessageSeenHistoryResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}