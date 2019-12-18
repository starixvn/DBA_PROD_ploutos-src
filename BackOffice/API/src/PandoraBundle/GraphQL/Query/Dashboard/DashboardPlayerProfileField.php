<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Dashboard;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Config\JsonTypes\JsonResponseType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Enum\DateTimeGroupByTypeEnum;
use PandoraBundle\GraphQL\Enum\FilterFieldsAsEnumType;
use PandoraBundle\GraphQL\Enum\QueryFormulaTypeEnum;
use PandoraBundle\GraphQL\Enum\YAxisTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use PandoraBundle\Joinery\PlayerProfileJoinery;
use PandoraBundle\GraphQL\Type\PlayerProfile\PlayerProfileType;
use PandoraBundle\Resolver\PlayerProfileResolver;

class DashboardPlayerProfileField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $entityFields = PlayerProfileJoinery::fields();
        $this->addArguments([
            'filter' => new FilterParamsType(new PlayerProfileType(), $entityFields),
            'x_axis' => new NonNullType(new FilterFieldsAsEnumType([], $entityFields)),
            'y_axis' => new NonNullType(new FilterFieldsAsEnumType([], $entityFields)),
            'y_axis_type' => new NonNullType(new YAxisTypeEnum()),
            'y_axis_filter' => new NonNullType(new StringType()),
            'formula_computation' => new NonNullType(new QueryFormulaTypeEnum()),
            'formula_field' => new NonNullType(new FilterFieldsAsEnumType([], $entityFields)),
            'filter_date' => new NonNullType(new FilterFieldsAsEnumType([], $entityFields)),
            'end_date' => new NonNullType(new DateTimeType()),
            'start_date' => new NonNullType(new DateTimeType()),
            'chart_view' => new NonNullType(new DateTimeGroupByTypeEnum()),
            'brand_market' => new StringType(),
        ]);
    }
    
    public function getType()
    {
        return new JsonResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerProfileResolver::class);
        $entityResolver->initAbstractResolver($args);
        $entityResolver->initEntityResolver();
        return ['jsonResult' => json_encode($entityResolver->getChartData())];
    }
    
}