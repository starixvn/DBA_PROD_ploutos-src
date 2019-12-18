<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\NotificationMessageLog;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\NotificationMessageLogJoinery;
use PandoraBundle\GraphQL\Type\NotificationMessageLog\NotificationMessageLogType;

class NotificationMessageLogListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Notification Message Log List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = NotificationMessageLogJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new NotificationMessageLogType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new NotificationMessageLogType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType()
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new NotificationMessageLogType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\NotificationMessageLogResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}