<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\VendorTypeEnum;
use PandoraBundle\GraphQL\Enum\WalletLedgerTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class WalletLedgerJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'UserId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UserId'
            ],
            'AccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AccountNo'
            ],
            'WalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WalletCode'
            ],
            'VendorType' => [
                'type' => new VendorTypeEnum(),
                'joineryTerm' => 'a.VendorType'
            ],
            'WalletLedgerType' => [
                'type' => new WalletLedgerTypeEnum(),
                'joineryTerm' => 'a.WalletLedgerType'
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate'
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo'
            ],
            'TransactionAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TransactionAmount'
            ],
            'VendorPrevBalanceAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.VendorPrevBalanceAmount'
            ],
            'VendorNewBalanceAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.VendorNewBalanceAmount'
            ],
            'WalletPrevBalanceAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WalletPrevBalanceAmount'
            ],
            'WalletNewBalanceAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WalletNewBalanceAmount'
            ],
            'IsBeingPush' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsBeingPush'
            ],
            'CreatedById'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ModifiedById'
            ],
            'DateCreated'  => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated'
            ],
            'DateModified'  => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified'
            ],
            'ActiveRecord'  => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
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