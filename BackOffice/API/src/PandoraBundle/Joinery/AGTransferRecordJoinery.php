<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/7/17
 * Time: 2:47 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AGTransferRecordJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'Dataype' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Dataype',
            ],
            'AGId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AGId',
            ],
            'AgentCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AgentCode',
            ],
            'TransferId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.TransferId',
            ],
            'TradeNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TradeNo',
            ],
            'PlatformType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlatformType',
            ],
            'PlayerName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerName',
            ],
            'TransferType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransferType',
            ],
            'TransferAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TransferAmount',
            ],
            'PreviousAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.PreviousAmount',
            ],
            'CurrentAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.CurrentAmount',
            ],
            'Currency' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Currency',
            ],
            'ExchangeRate' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ExchangeRate',
            ],
            'IpAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.IpAddress',
            ],
            'Flag' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Flag',
            ],
            'CreationTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.CreationTime',
            ],
            'GameCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameCode',
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
            'HunterBetId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.HunterBetId',
            ],
            'Remark' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Remark',
            ]
        ];
    }
}