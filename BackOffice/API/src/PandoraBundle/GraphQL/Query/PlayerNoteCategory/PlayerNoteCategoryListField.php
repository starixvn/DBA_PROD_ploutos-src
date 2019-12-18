<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerNoteCategory;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\PlayerNoteCategory\PlayerNoteCategoryType;
use PandoraBundle\Joinery\PlayerNoteCategoryJoinery;
use PandoraBundle\Resolver\PlayerNoteCategoryResolver;

class PlayerNoteCategoryListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Setup Player Note Category List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = PlayerNoteCategoryJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PlayerNoteCategoryType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new PlayerNoteCategoryType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new PlayerNoteCategoryType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerNoteCategoryResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}