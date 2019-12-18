<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Bonus;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\GraphQL\Type\Bonus\BonusType;
use PandoraBundle\Joinery\BonusJoinery;
use PandoraBundle\Resolver\BonusResolver;

class BonusListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Bonus List';
    }

    public function build(FieldConfig $config)
    {
        $objectFields = BonusJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new BonusType(), array_keys($objectFields)),
            'filter' => new FilterParamsType(new BonusType(), $objectFields),
            'paging' => new PagingParamsType(),
            // 'deposit_id' => new IdType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new BonusType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(BonusResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}