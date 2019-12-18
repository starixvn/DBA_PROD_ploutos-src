<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\AspNetUserClaim;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\AspNetUserClaim\AspNetUserClaimType;
use PandoraBundle\Joinery\AspNetUserClaimJoinery;

class AspNetUserClaimListField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $objectFields = AspNetUserClaimJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new AspNetUserClaimType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new AspNetUserClaimType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType())
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new AspNetUserClaimType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\AspNetUserClaimResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}