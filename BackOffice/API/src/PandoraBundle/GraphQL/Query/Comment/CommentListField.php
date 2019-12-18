<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Comment;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\Comment\CommentType;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Joinery\CommentJoinery;

class CommentListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Comment List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = CommentJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new CommentType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new CommentType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new CommentType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(CommentResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}