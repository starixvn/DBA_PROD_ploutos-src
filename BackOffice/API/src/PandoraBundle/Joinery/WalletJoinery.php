<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class WalletJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'WalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WalletCode'
            ],
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerProfileId'
            ],
            'Balance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Balance'
            ],
            'OutstandingBalance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.OutstandingBalance'
            ],
            'WageringRequirement' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WageringRequirement'
            ],
            'WithdrawableAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WithdrawableAmount'
            ],
            'WithdrawableAsOf' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.WithdrawableAsOf'
            ],
            'UpdatedBalance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.UpdatedBalance'
            ],
            'WalletLastUpdated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.WalletLastUpdated'
            ],
            'WageringBalance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WageringBalance'
            ],
            'NeedToSync' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.NeedToSync'
            ],
            'WalletStatus' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.WalletStatus'
            ],
            'DepositAlertEmail' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.DepositAlertEmail'
            ],
            'DepositAlertSms' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.DepositAlertSms'
            ],
            'WithdrawAlertEmail' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.WithdrawAlertEmail'
            ],
            'WithdrawAlertSms' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.WithdrawAlertSms'
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
            
            /* PLAYER PROFILE FIELDS */
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserName'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'b.PlayerRegistrationId'
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