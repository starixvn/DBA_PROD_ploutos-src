<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\WalletFundTransfer;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Type\WalletFundTransfer\WalletFundTransferType;

class WalletFundTransferField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Wallet Fund Transfer view';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }

    public function getType()
    {
        return new ListType(new WalletFundTransferType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\WalletFundTransferResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();

        return $entityResolver->getQueryBuilderSingleResult();
    }

}