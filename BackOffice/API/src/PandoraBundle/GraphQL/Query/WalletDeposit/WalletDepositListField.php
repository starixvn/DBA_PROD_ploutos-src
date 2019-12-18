<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\WalletDeposit;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLExtension\Type\PaginatedResultType;
use Youshido\GraphQLExtension\Type\PagingParamsType;
use Youshido\GraphQLExtension\Type\Sorting\SortingParamsType;
use PandoraBundle\GraphQL\Config\Filter\FilterParamsType;
use PandoraBundle\Joinery\WalletDepositJoinery;
use PandoraBundle\GraphQL\Type\WalletDeposit\WalletDepositType;
use PandoraBundle\Resolver\WalletDepositResolver;

class WalletDepositListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Deposit List';
    }

    public function build(FieldConfig $config)
    {
        $entityFields = WalletDepositJoinery::fields();
        $this->addArguments([
            'sort' => new SortingParamsType(new WalletDepositType(), array_keys($entityFields)),
            'filter' => new FilterParamsType(new WalletDepositType(), $entityFields),
            'paging' => new PagingParamsType(),
            'count' => new NonNullType(new BooleanType()),
            'export' => new BooleanType(),
            'start_deposit_date' => new DateTimeType('m/d/Y'),
            'end_deposit_date' => new DateTimeType('m/d/Y')
        ]);
    }
    
    public function getType()
    {
        return new PaginatedResultType(new WalletDepositType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(WalletDepositResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList()[1]->getFields());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        $entityDatas = $entityResolver->getQueryBuilderPagingResult();
        if(count($entityDatas['items']) > 0){
            $newSetOfData = [];
            foreach ($entityDatas['items'] as $value){
                if(isset($value['ApprovedDate'])){
                    $value['ApprovedDate'] = ($value['ApprovedDate']->format('Y-m-d H:i:s') == '0001-01-01 00:00:00') ? null : $value['ApprovedDate'];
                    $newSetOfData[] = $value;
                }else{
                    $newSetOfData[] = $value;
                }
            }
            $entityDatas['items'] = $newSetOfData;
        }
        return $entityDatas;
        
        
    }
    
}