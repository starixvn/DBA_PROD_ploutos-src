<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerMessages;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\PlayerMessagesJoinery;
use PandoraBundle\Resolver\PlayerMessagesResolver;
use PandoraBundle\GraphQL\Type\PlayerMessages\PlayerMessagesType;

class PlayerMessagesListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Messages List';
    }

    public function build(FieldConfig $config)
    {
        $playerMessagesFields = PlayerMessagesJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PlayerMessagesType(), array_keys($playerMessagesFields)),
            'filter' => new FilterParamsType(new PlayerMessagesType(), $playerMessagesFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new PlayerMessagesType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerMessagesResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}