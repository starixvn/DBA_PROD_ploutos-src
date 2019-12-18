<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\SystemMetaData;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Type\SystemMetaData\SystemMetaDataType;
use PandoraBundle\Joinery\PlayerProfileJoinery;
use PandoraBundle\Joinery\WalletDepositJoinery;
use PandoraBundle\Joinery\WalletWithdrawalJoinery;
use PandoraBundle\Utility\GraphQLFieldsToArray;
use PandoraBundle\Joinery\AffiliateJoinery;
use PandoraBundle\Joinery\WalletAdjustmentMemoJoinery;
use PandoraBundle\Joinery\AffiliateTransactionJoinery;
use PandoraBundle\Joinery\AffiliateCommisionJoinery;
use PandoraBundle\Joinery\WalletFundTransferJoinery;
use PandoraBundle\Joinery\PlayerBankAccountJoinery;
use PandoraBundle\Joinery\PlayerBetJoinery;
use PandoraBundle\Joinery\WalletWinJoinery;
use PandoraBundle\Joinery\WalletLossJoinery;

class SystemMetaDataListField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'System Meta Data';
    }

    public function build(FieldConfig $config){}
    
    public function getType()
    {
        return new ListType(new SystemMetaDataType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return [
            // PLAYER PROFILEs
            [
                'item' => [
                    'moduleName' => 'Player Profile',
                    'resolver' => 'PlayerProfile',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(PlayerProfileJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Player Bank Account',
                    'resolver' => 'PlayerBankAccount',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(PlayerBankAccountJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Wallet Deposit',
                    'resolver' => 'WalletDeposit',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(WalletDepositJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Wallet Withdrawal',
                    'resolver' => 'WalletWithdrawal',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(WalletWithdrawalJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Wallet Adjustment Memo',
                    'resolver' => 'WalletAdjustmentMemo',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(WalletAdjustmentMemoJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Wallet Fund Transfer',
                    'resolver' => 'WalletFundTransfer',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(WalletFundTransferJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Player Bet',
                    'resolver' => 'PlayerBet',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(PlayerBetJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Player Win',
                    'resolver' => 'WalletWin',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(WalletWinJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Player Loss',
                    'resolver' => 'WalletLoss',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(WalletLossJoinery::fields()),
                ]
            ],
            
            // AFFILIATEs
            [
                'item' => [
                    'moduleName' => 'Affiliate Profile',
                    'resolver' => 'Affiliate',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(AffiliateJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Affiliate Transaction',
                    'resolver' => 'AffiliateTransaction',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(AffiliateTransactionJoinery::fields()),
                ]
            ],
            [
                'item' => [
                    'moduleName' => 'Affiliate Commission',
                    'resolver' => 'AffiliateCommission',
                    'fields' => GraphQLFieldsToArray::objFieldsToArr(AffiliateCommisionJoinery::fields()),
                ]
            ],
            
        ];
    }
    
}