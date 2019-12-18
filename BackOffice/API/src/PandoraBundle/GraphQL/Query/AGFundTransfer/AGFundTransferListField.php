<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\AGFundTransfer;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\AGFundTransfer\AGFundTransferType;
use PandoraBundle\Joinery\AGFundTransferJoinery;

class AGFundTransferListField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $objectFields = AGFundTransferJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new AGFundTransferType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new AGFundTransferType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType())
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new AGFundTransferType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\AGFundTransferResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}