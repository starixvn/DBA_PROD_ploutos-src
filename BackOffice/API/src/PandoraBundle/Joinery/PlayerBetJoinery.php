<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerBetJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BetName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BetName'
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo'
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate'
            ],
            'BetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmount'
            ],
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerProfileId'
            ],
            'WalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletId'
            ],
            'GamePlatformforId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GamePlatformforId'
            ],
            'GamePlatformProductId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GamePlatformProductId'
            ],
            'IsBeingPushed' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsBeingPushed'
            ],
            'IsDoneWagering' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsDoneWagering'
            ],
            'IsWageBeingProcess' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsWageBeingProcess'
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
            
            /* GAME PLATFORM */
            'GamePlatformCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.GamePlatformCode'
            ],
            'GamePlatformName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.GamePlatformName'
            ],
            
            /* GAME PLATFORM PRODUCTS */
            'GamePlatformProductName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.GamePlatformProductName'
            ],
            
            /* PLAYER PROFILE */
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.UserName'
            ],
            
            /* PLAYER PROFILE */
            'WalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.WalletCode'
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