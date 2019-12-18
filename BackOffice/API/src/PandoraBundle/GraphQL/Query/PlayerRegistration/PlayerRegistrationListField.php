<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerRegistration;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use PandoraBundle\GraphQL\Type\PlayerRegistration\PlayerRegistrationType;

class PlayerRegistrationListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Registration List';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments(
            [
                'sort' => new SortingParamsType(new PlayerRegistrationType(), [
                    'Id', 'UserName', 'UserAccountNo'
                ]),
                'paging' => new PagingParamsType(),
                'count' => new NonNullType(new BooleanType())
            ]
        );
    }
    
    public function getType()
    {
        return new PaginatedResultType(new PlayerRegistrationType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\PlayerRegistrationResolver');
        $prefix = 'pr';
        $entityResolver->init($args, $prefix, $info->getFieldASTList()[1]->getFields());
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderPagingResult();
    }
    
}