<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\GameClassIntTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\StringType;

class GameBetLimitSettingJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BetLimitSettingCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BetLimitSettingCode'
            ],
            'BetLimitSettingDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BetLimitSettingDesc'
            ],
            'MinBet' => [
                'type' => new FloatType(),
                'joineryTerm' => 'a.MinBet'
            ],
            'MaxBet' => [
                'type' => new FloatType(),
                'joineryTerm' => 'a.MaxBet'
            ],
            'GamePlatformCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GamePlatformCode'
            ],
            'GameType' => [
                'type' => new GameClassIntTypeEnum(),
                'joineryTerm' => 'a.GameType'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CurrencyCode'
            ],
            'BetLimitLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BetLimitLevelId'
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
            
            'BetLimitLevelDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BetLimitLevelDesc'
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