<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerNoteType;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\PlayerNoteType\PlayerNoteTypeType;
use PandoraBundle\Joinery\PlayerNoteTypeJoinery;
use PandoraBundle\Resolver\PlayerNoteTypeResolver;

class PlayerNoteTypeListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Setup Player Note Type List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = PlayerNoteTypeJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PlayerNoteTypeType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new PlayerNoteTypeType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new PlayerNoteTypeType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerNoteTypeResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}