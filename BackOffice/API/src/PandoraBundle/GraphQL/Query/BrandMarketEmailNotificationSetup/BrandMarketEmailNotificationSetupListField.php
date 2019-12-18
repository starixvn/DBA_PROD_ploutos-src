<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\BrandMarketEmailNotificationSetup;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\BrandMarketEmailNotificationSetup\BrandMarketEmailNotificationSetupType;
use PandoraBundle\Joinery\BrandMarketEmailNotificationSetupJoinery;

class BrandMarketEmailNotificationSetupListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Setup Brand Market Notification List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = BrandMarketEmailNotificationSetupJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new BrandMarketEmailNotificationSetupType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new BrandMarketEmailNotificationSetupType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new BrandMarketEmailNotificationSetupType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\BrandMarketEmailNotificationSetupResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}