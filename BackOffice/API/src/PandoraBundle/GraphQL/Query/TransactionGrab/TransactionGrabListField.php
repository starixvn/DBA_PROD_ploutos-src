<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\TransactionGrab;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\TransactionGrabsJoinery;
use PandoraBundle\Resolver\TransactionGrabsResolver;
use PandoraBundle\GraphQL\Type\TransactionGrabs\TransactionGrabsType;

class TransactionGrabListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Transaction Grab / UnGrab List';
    }

    public function build(FieldConfig $config)
    {
        $fields = TransactionGrabsJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new TransactionGrabsType(), array_keys($fields)),
            'filter' => new FilterParamsType(new TransactionGrabsType(), $fields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new TransactionGrabsType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(TransactionGrabsResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}