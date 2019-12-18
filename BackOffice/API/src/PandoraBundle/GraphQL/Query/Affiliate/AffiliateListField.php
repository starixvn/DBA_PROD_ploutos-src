<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Affiliate;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\AffiliateJoinery;
use PandoraBundle\Resolver\AffiliateResolver;
use PandoraBundle\GraphQL\Type\Affiliate\AffiliateType;

class AffiliateListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate List';
    }

    public function build(FieldConfig $config)
    {
        $playerProfileFields = AffiliateJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new AffiliateType(), array_keys($playerProfileFields)),
            'filter' => new FilterParamsType(new AffiliateType(), $playerProfileFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
        ]);
    }

    public function getType()
    {
        return new PaginatedResultType(new AffiliateType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(AffiliateResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        $affiliateDatas = $entityResolver->getQueryBuilderPagingResult();
        if(count($affiliateDatas['items']) > 0){
            $newSetOfData = [];
            foreach ($affiliateDatas['items'] as $value){
                if(isset($value['SecurityAnswer'])){
                    $value['SecurityAnswer'] = '********';
                    $newSetOfData[] = $value;
                }else{
                    $newSetOfData[] = $value;
                }
            }
            $affiliateDatas['items'] = $newSetOfData;
        }
        return $affiliateDatas;
    }

}