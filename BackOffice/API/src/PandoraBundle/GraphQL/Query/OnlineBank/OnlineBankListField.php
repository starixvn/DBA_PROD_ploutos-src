<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\OnlineBank;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\OnlineBank\OnlineBankType;
use PandoraBundle\Joinery\OnlineBanksJoinery;
use PandoraBundle\Resolver\OnlineBankResolver;

class OnlineBankListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Online Bank List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = OnlineBanksJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new OnlineBankType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new OnlineBankType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new OnlineBankType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(OnlineBankResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}