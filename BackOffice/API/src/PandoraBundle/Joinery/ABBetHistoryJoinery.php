<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 4:12 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ABBetHistoryJoinery
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
            'Token' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Token',
            ],
            'BetTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.BetTime',
            ],
            'BetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmount',
            ],
            'Random' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Random',
            ],
            'TranId' => [
                'type' => new IdType(),
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
            'BetType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BetType',
            ],
            'GameType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameType',
            ],
            'GameRoundId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GameRoundId',
            ],
            'Sign' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Sign',
            ],
            'Commission' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Commission',
            ],
            'Ip' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Ip',
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
            'TranTypeName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TranTypeName',
            ],
            'RefTranId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RefTranId',
            ],
            'Status' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Status',
            ],
            'ABSettleId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ABSettleId',
            ]
        ];
    }
}