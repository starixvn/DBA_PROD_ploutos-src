<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Playerfingerprinthit;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\Playerfingerprinthit\PlayerfingerprinthitType;
use PandoraBundle\Joinery\PlayerfingerprinthitJoinery;
use PandoraBundle\Resolver\PlayerfingerprinthitResolver;

class PlayerfingerprinthitListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Player Finger Print Hit List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = PlayerfingerprinthitJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new PlayerfingerprinthitType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new PlayerfingerprinthitType(), $objectFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new PlayerfingerprinthitType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerfingerprinthitResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}