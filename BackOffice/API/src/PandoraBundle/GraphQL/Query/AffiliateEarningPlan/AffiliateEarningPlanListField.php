<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\AffiliateEarningPlan;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\AffiliateEarningPlanJoinery;
use PandoraBundle\Resolver\AffiliateEarningPlanResolver;
use PandoraBundle\GraphQL\Type\AffiliateEarningPlan\AffiliateEarningPlanType;

class AffiliateEarningPlanListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Earning Plan List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = AffiliateEarningPlanJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new AffiliateEarningPlanType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new AffiliateEarningPlanType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new AffiliateEarningPlanType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(AffiliateEarningPlanResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }

}