<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerNotification;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\PlayerNotification\PlayerNotificationType;
use PandoraBundle\Joinery\PlayerNotificationJoinery;
use PandoraBundle\Resolver\PlayerNotificationResolver;

class PlayerNotificationListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Notifications List';
    }

    public function build(FieldConfig $config)
    {
        $fields = PlayerNotificationJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PlayerNotificationType(), array_keys($fields)),
            'filter' => new FilterParamsType(new PlayerNotificationType(), $fields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new PlayerNotificationType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerNotificationResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}