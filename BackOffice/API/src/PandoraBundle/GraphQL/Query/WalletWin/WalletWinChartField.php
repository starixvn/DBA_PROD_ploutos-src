<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\WalletWin;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Config\JsonTypes\JsonResponseType;
use PandoraBundle\GraphQL\Enum\DateTimeGroupByTypeEnum;
use PandoraBundle\GraphQL\Enum\FilterFieldsAsEnumType;
use PandoraBundle\GraphQL\Enum\QueryFormulaTypeEnum;
use PandoraBundle\GraphQL\Enum\YAxisTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use PandoraBundle\Joinery\WalletWinJoinery;
use PandoraBundle\GraphQL\Type\WalletWin\WalletWinType;
use PandoraBundle\Resolver\WalletWinResolver;

class WalletWinChartField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Dashboard Wallet Win Chart';
    }
    
    public function build(FieldConfig $config)
    {
        $entityFields = WalletWinJoinery::fields();
        $this->addArguments([
            'filter' => new FilterParamsType(new WalletWinType(), $entityFields),
            'x_axis' => new NonNullType(new FilterFieldsAsEnumType(['name' => $this->getName()], $entityFields)),
            'y_axis' => new NonNullType(new FilterFieldsAsEnumType(['name' => $this->getName()], $entityFields)),
            'y_axis_type' => new NonNullType(new YAxisTypeEnum()),
            'formula_computation' => new NonNullType(new QueryFormulaTypeEnum()),
            'formula_field' => new NonNullType(new FilterFieldsAsEnumType(['name' => $this->getName()], $entityFields)),
            'chart_view' => new NonNullType(new DateTimeGroupByTypeEnum()),
            'filter' => new FilterParamsType(new WalletWinType(), $entityFields),
        ]);
    }
    
    public function getType()
    {
        return new JsonResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(WalletWinResolver::class);
        $entityResolver->initAbstractResolver($args);
        $entityResolver->initEntityResolver();
        return ['jsonResult' => json_encode($entityResolver->getChartDataQuery())];
    }
    
}