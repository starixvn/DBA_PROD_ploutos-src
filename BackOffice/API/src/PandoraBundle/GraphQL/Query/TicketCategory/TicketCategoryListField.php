<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\TicketCategory;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\TicketCategory\TicketCategoryType;
use PandoraBundle\Joinery\TicketCategoryJoinery;
use PandoraBundle\Resolver\TicketCategoryResolver;

class TicketCategoryListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Ticket Category List';
    }

    public function build(FieldConfig $config)
    {
        $fields = TicketCategoryJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new TicketCategoryType(), array_keys($fields)),
            'filter' => new FilterParamsType(new TicketCategoryType(), $fields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new TicketCategoryType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(TicketCategoryResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}