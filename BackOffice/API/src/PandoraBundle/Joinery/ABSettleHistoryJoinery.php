<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 4:34 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ABSettleHistoryJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'PropertyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PropertyId',
            ],
            'Random' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Random',
            ],
            'TranId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TranId',
            ],
            'TranType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TranType',
            ],
            'BetNum' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BetNum',
            ],
            'Client' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Client',
            ],
            'BetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmount',
            ],
            'BetType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BetType',
            ],
            'BetTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.BetTime',
            ],
            'GameType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameType',
            ],
            'GameRoundId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameRoundId',
            ],
            'State' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.State',
            ],
            'GameResult' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameResult',
            ],
            'GameResult2' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameResult2',
            ],
            'ValidAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ValidAmount',
            ],
            'WinOrLoss' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WinOrLoss',
            ],
            'Currency' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Currency',
            ],
            'ExchangeRate' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ExchangeRate',
            ],
            'GameRoundStartTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.GameRoundStartTime',
            ],
            'GameRoundEndTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.GameRoundEndTime',
            ],
            'Commission' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Commission',
            ],
            'Sign' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Sign',
            ],
            'TableName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TableName',
            ],
            'CreatedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CreatedById',
            ],
            'ModifiedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ModifiedById',
            ],
            'DateCreated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated',
            ],
            'DateModified' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified',
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord',
            ],
            'Ip' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Ip',
            ],
            'Token' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Token',
            ],
            'ABBetHistoryId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ABBetHistoryId',
            ],
            'TranTypeName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TranTypeName',
            ],
            'RefTranId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RefTranId',
            ]
        ];
    }
}