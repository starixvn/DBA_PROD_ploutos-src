<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\GamePlatformSupportedCurrency;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\GamePlatformSupportedCurrencyJoinery;
use PandoraBundle\GraphQL\Type\GamePlatformSupportedCurrency\GamePlatformSupportedCurrencyType;

class GamePlatformSupportedCurrencyListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Game Platform Supported Currency List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = GamePlatformSupportedCurrencyJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new GamePlatformSupportedCurrencyType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new GamePlatformSupportedCurrencyType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new GamePlatformSupportedCurrencyType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\GamePlatformSupportedCurrencyResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}