<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\AffiliateTrackingLink;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\AffiliateTrackingLinkJoinery;
use PandoraBundle\Resolver\AffiliateTrackingLinkResolver;
use PandoraBundle\GraphQL\Type\AffiliateTrackingLink\AffiliateTrackingLinkType;
// use PandoraBundle\GraphQL\Type\BankAccount\BankAccountType;
// use PandoraBundle\Joinery\BankAccountJoinery;

class AffiliateTrackingLinkListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Tracking Link List';
    }
    
    public function build(FieldConfig $config)
    {
        $objectFields = AffiliateTrackingLinkJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new AffiliateTrackingLinkType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new AffiliateTrackingLinkType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new AffiliateTrackingLinkType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(AffiliateTrackingLinkResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}