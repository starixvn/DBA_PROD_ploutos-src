<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class WalletLossJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo'
            ],
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerProfileId'
            ],
            'WalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletId'
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate'
            ],
            'BetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmount'
            ],
            'LossAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.LossAmount'
            ],
            'Remarks' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Remarks'
            ],
            'GameId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GameId'
            ],
            'ProducId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ProducId'
            ],
            'GamePlatformId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GamePlatformId'
            ],
            'GamePlatformProductId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GamePlatformProductId'
            ],
            'IsBeingPushed' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsBeingPushed'
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
            'GameDescription' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameDescription'
            ],
            
            /* PLAYER PROFILE */
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserName'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.CurrencyCode'
            ],
            
            /* PLAYER PROFILE */
            'WalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.WalletCode'
            ],
            
            /* GAME PLATFORM */
            'GamePlatformCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.GamePlatformCode'
            ],
            'GamePlatformName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.GamePlatformName'
            ],
            
            /* GAME PLATFORM PRODUCTS */
            'GamePlatformProductName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.GamePlatformProductName'
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