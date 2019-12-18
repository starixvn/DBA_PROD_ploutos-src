<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\WalletFundTransfer;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\WalletFundTransferJoinery;
use PandoraBundle\Resolver\WalletFundTransferResolver;
use PandoraBundle\Entity\Walletfundtransfers;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\WalletFundTransfer\WalletFundTransferType;

class WalletFundTransferMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Wallet Fund Transfer Create/Edit';
    }


    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new WalletFundTransferType(), WalletFundTransferJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new WalletFundTransferType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(WalletFundTransferResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Walletfundtransfers::class);
        $entityResolver->validateEntity();
        
        if($entityResolver->mergeEntity()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}