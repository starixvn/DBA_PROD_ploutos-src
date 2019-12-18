<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\SerializedType;

class EnumJoinery{
    
    public static function fields(){
        return [
            'AccessLogTypeEnum' => [
                'type' => new SerializedType()
            ],
            'ActiveStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'BankTransactionTypeEnum' => [
                'type' => new SerializedType()
            ],
            'CountryTypeEnum' => [
                'type' => new SerializedType()
            ],
            'FilterExpressionsType' => [
                'type' => new SerializedType()
            ],
            'GenderTypeEnum' => [
                'type' => new SerializedType()
            ],
            'NotificationTypeEnum' => [
                'type' => new SerializedType()
            ],
            'PlayerAccountStatusLocalTypeEnum' => [
                'type' => new SerializedType()
            ],
            'PlayerAccountStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'PlayerTypeEnum' => [
                'type' => new SerializedType()
            ],
            'TransactionsTypeEnum' => [
                'type' => new SerializedType()
            ],
            'WalletAdjustmentMemoTypeEnum' => [
                'type' => new SerializedType()
            ],
            'WalletTransactionStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'WalletAdjustmentMemoStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'UserRoleTypeEnum' => [
                'type' => new SerializedType()
            ],
            'WalletDepositStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'WalletDepositTypeTypeEnum' => [
                'type' => new SerializedType()
            ],
            'SystemModulesTypeEnum' => [
                'type' => new SerializedType()
            ],
            'BonusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'BonusFactorBasisTypeEnum' => [
                'type' => new SerializedType()
            ],
            'BonusValueTypeEnum' => [
                'type' => new SerializedType()
            ],
            'TicketStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'BrandMarketEmailNotificationTypeEnum' => [
                'type' => new SerializedType()
            ],
            'PlayerDocumentTypeEnum' => [
                'type' => new SerializedType()
            ],
            'WalletLedgerTypeEnum' => [
                'type' => new SerializedType()
            ],
            'GameClassTypeEnum' => [
                'type' => new SerializedType()
            ],
            'GameClassIntTypeEnum' => [
                'type' => new SerializedType()
            ],
            'OnlineBankTransactionTypeEnum' => [
                'type' => new SerializedType()
            ],
            'BankAccountTypeEnum' => [
                'type' => new SerializedType()
            ],
            
            //AFFILIATE
            'AffiliateTypeEnum' => [
                'type' => new SerializedType()
            ],
            'AffiliateStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'AffiliateCommissionStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'AffiliateTransactionStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'AffiliateTransactionUITypeEnum' => [
                'type' => new SerializedType()
            ],
            'AffiliateTransactionTypeEnum' => [
                'type' => new SerializedType()
            ],
            'SettlementPeriodTypeEnum' => [
                'type' => new SerializedType()
            ],
            'PlayerMessagesStatusTypeEnum' => [
                'type' => new SerializedType()
            ],
            'MessagesTypeEnum' => [
                'type' => new SerializedType()
            ],
        ];
    }
}