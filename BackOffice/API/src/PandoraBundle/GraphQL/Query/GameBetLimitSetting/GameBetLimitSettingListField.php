<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\GameBetLimitSetting;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\GameBetLimitSettingJoinery;
use PandoraBundle\GraphQL\Type\GameBetLimitSetting\GameBetLimitSettingType;

class GameBetLimitSettingListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Bet Limit Setting List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = GameBetLimitSettingJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new GameBetLimitSettingType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new GameBetLimitSettingType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new GameBetLimitSettingType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\GameBetLimitSettingResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}