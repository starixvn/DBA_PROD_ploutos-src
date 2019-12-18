<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\CampaignDetailLevel;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\CampaignDetailLevel\CampaignDetailLevelType;
use PandoraBundle\Joinery\CampaignDetailLevelJoinery;

class CampaignDetailLevelListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Bonus Detail Level List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = CampaignDetailLevelJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new CampaignDetailLevelType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new CampaignDetailLevelType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new CampaignDetailLevelType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\CampaignDetailLevelResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}