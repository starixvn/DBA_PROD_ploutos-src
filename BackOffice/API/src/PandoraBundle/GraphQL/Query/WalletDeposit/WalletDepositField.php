<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\WalletDeposit;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Type\WalletDeposit\WalletDepositType;
use PandoraBundle\Resolver\WalletDepositResolver;

class WalletDepositField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Deposit View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new WalletDepositType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(WalletDepositResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        $entityData = $entityResolver->getQueryBuilderSingleResult();
        if(count($entityData) > 0 && isset($entityData[0]['ApprovedDate'])){
            $entityData[0]['ApprovedDate'] = ($entityData[0]['ApprovedDate']->format('Y-m-d H:i:s') == '0001-01-01 00:00:00') ? null : $entityData[0]['ApprovedDate'];
        }
        return $entityData;
        
        
    }
    
}