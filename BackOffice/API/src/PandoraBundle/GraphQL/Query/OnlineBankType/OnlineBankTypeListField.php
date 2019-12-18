<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\OnlineBankType;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\OnlineBankType\OnlineBankTypeType;
use PandoraBundle\Joinery\OnlineBankTypesJoinery;
use PandoraBundle\Resolver\OnlineBankTypeResolver;

class OnlineBankTypeListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Online Bank Type List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = OnlineBankTypesJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new OnlineBankTypeType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new OnlineBankTypeType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new OnlineBankTypeType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(OnlineBankTypeResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}