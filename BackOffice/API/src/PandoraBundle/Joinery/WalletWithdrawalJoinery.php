<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\WalletTransactionStatusTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class WalletWithdrawalJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'WalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletId'
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo'
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate'
            ],
            'WithdrawDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.WithdrawDate'
            ],
            'WithdrawAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WithdrawAmount'
            ],
            'Remarks' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Remarks'
            ],
            'PlayerBankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerBankAccountId'
            ],
            'WithdrawalBankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WithdrawalBankAccountId'
            ],
            'Status' => [
                'type' => new WalletTransactionStatusTypeEnum(),
                'joineryTerm' => 'a.Status'
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
            'Platform' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Platform'
            ],
            'isViewed' => [
                'type' => new IdType(),
                'joineryTerm' => '(SELECT rv.Id FROM PandoraBundle:Recordviewed AS rv WHERE rv.SourceObject = 1 AND rv.SourceObjectId = a.Id) AS isViewed'
            ],
            
            
            // WALLET OBJECT
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'b.PlayerProfileId'
            ],
            
            
            // PLAYER PROFILE
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.UserName'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'c.PlayerRegistrationId'
            ],
            
            
            // PLAYER BANK ACCOUNT OBJECT
            'PlayerBankAccountName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.BankAccountName AS PlayerBankAccountName'
            ],
            'IsActiveAccount' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.IsActiveAccount'
            ],
            
            
            // BANK ACCOUNT OBJECT
            'BankCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.BankCode'
            ],
            'BankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.BankName'
            ],
            'AccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.AccountNo'
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