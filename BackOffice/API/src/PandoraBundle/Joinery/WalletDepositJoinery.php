<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\WalletDepositStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\WalletDepositTypeTypeEnum;

class WalletDepositJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'WalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'walletList',
                    'label' => 'WalletCode',
                    'value' => 'Id'
                ]
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo'
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate'
            ],
            'DepositDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DepositDate'
            ],
            'ActualDepositAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ActualDepositAmount'
            ],
            'DepositAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.DepositAmount'
            ],
            'UniqueDepositAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.UniqueDepositAmount'
            ],
            'CreditAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.CreditAmount'
            ],
            'WageringAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WageringAmount'
            ],
            'WageringFulfillmentAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WageringFulfillmentAmount'
            ],
            'BonusAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BonusAmount'
            ],
            'BonusWageringAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BonusWageringAmount'
            ],
            'TotalWageringAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TotalWageringAmount'
            ],
            'WageringBalanceAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WageringBalanceAmount'
            ],
            'IsWageringFulfilled' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsWageringFulfilled'
            ],
            'BonusId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BonusId'
            ],
            'LockAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.LockAmount'
            ],
            'BonusCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BonusCode'
            ],
            'NeedToSync' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.NeedToSync'
            ],
            'ApprovedDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.ApprovedDate'
            ],
            'PaymentRiskLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PaymentRiskLevelId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'paymentRiskLevelList',
                    'label' => 'PaymentRiskLevelName',
                    'value' => 'Id'
                ]
            ],
            'PaymentMethodId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PaymentMethodId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'paymentMethodList',
                    'label' => 'RecordName',
                    'value' => 'Id'
                ]
            ],
            'BankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankAccountId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'bankAccountList',
                    'label' => 'BankName',
                    'value' => 'Id'
                ]
            ],
            'DepositUntil' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DepositUntil'
            ],
            'Status' => [
                'type' => new WalletDepositStatusTypeEnum(),
                'joineryTerm' => 'a.Status'
            ],
            'DepositType' => [
                'type' => new WalletDepositTypeTypeEnum(),
                'joineryTerm' => 'a.DepositType'
            ],
            'DaddyPayDepositId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.DaddyPayDepositId'
            ],
            'CreatedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ModifiedById'
            ],
            'DateCreated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated'
            ],
            'DateModified' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified'
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
            ],
            'RefTransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RefTransactionNo'
            ],
            'RefDepositRemarks' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RefDepositRemarks'
            ],
            'RequiredDepositForBonus' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RequiredDepositForBonus'
            ],
            'Platform' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Platform'
            ],
            'DepositPageUsed' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.DepositPageUsed'
            ],
            'PlayerWechatAccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerWechatAccountNo'
            ],
            'IsBeingPush' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsBeingPush'
            ],
            'Remarks' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Remarks'
            ],
            'isViewed' => [
                'type' => new IdType(),
                'joineryTerm' => '(SELECT rv.Id FROM PandoraBundle:Recordviewed AS rv WHERE rv.SourceObject = 0 AND rv.SourceObjectId = a.Id) AS isViewed'
            ],
            
            // WALLET OBJECT
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'b.PlayerProfileId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'playerProfileList',
                    'label' => 'UserName',
                    'value' => 'Id'
                ]
            ],
            'WalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.WalletCode'
            ],
            
            
            // BANK ACCOUNT
            'BankCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.BankCode'
            ],
            'BankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.BankName'
            ],
            'AccountName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.AccountName'
            ],
            'AccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.AccountNo'
            ],
            
            // PLAYER PROFILE
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.UserName'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'e.PlayerRegistrationId'
            ],
            
            // PLAYER REGISTRATION
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'f.BrandCode'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'f.CurrencyCode'
            ],
            
            // PAYMENT RISK LEVEL
            'PaymentRiskLevelCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'g.PaymentRiskLevelCode'
            ],
            
            // PAYMENT METHOD
            'PaymentMethodName' => [
                'type' => new StringType(),
                'joineryTerm' => 'h.PaymentMethodName'
            ],
            
            
            // TRANSACTIOn GRAB
            'TransactionGrabId' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.Id AS TransactionGrabId'
            ],
            'Assignee' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.Assignee'
            ],
            'AssigneeUserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.UserId AS AssigneeUserId'
            ],
            
            'CreatedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'x.UserName AS CreatedByUserName'
            ],
            'ModifiedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'y.UserName AS ModifiedByUserName'
            ]
        ];
    }
}