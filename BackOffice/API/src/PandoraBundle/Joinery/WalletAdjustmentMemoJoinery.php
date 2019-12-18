<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\WalletAdjustmentMemoStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\WalletAdjustmentMemoTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class WalletAdjustmentMemoJoinery{
    
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
            'CreditAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.CreditAmount'
            ],
            'DebitAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.DebitAmount'
            ],
            'Remarks' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Remarks'
            ],
            'AdjustmentType' => [
                'type' => new WalletAdjustmentMemoTypeEnum(),
                'joineryTerm' => 'a.AdjustmentType'
            ],
            'Status' => [
                'type' => new WalletAdjustmentMemoStatusTypeEnum(),
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
            'NeedToSync' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.NeedToSync'
            ],
            'AdjustmentSource' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AdjustmentSource'
            ],
            'isViewed' => [
                'type' => new IdType(),
                'joineryTerm' => '(SELECT rv.Id FROM PandoraBundle:Recordviewed AS rv WHERE rv.SourceObject = 2 AND rv.SourceObjectId = a.Id) AS isViewed'
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
            
            // PLAYER REGISTRATION
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.BrandCode'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.CurrencyCode'
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