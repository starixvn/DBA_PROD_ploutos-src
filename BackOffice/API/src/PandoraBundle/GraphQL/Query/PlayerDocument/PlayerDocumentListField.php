<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerDocument;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\PlayerDocument\PlayerDocumentType;
use PandoraBundle\Joinery\PlayerDocumentJoinery;
use PandoraBundle\Resolver\PlayerDocumentResolver;

class PlayerDocumentListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Document List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = PlayerDocumentJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PlayerDocumentType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new PlayerDocumentType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new PlayerDocumentType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerDocumentResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}