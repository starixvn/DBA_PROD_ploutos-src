<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/7/17
 * Time: 11:02 AM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AGBetRecordJoinery
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
            'BillNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BillNo',
            ],
            'PlayerName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerName',
            ],
            'AgentCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AgentCode',
            ],
            'GameCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameCode',
            ],
            'NetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.NetAmount',
            ],
            'BetTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.BetTime',
            ],
            'GameType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameType',
            ],
            'BetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmount',
            ],
            'ValidBetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ValidBetAmount',
            ],
            'Flag' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Flag',
            ],
            'FlayType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FlayType',
            ],
            'Currency' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Currency',
            ],
            'TableCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TableCode',
            ],
            'LoginIp' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LoginIp',
            ],
            'RecalcuTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.RecalcuTime',
            ],
            'PlatformType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlatformType',
            ],
            'Remark' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Remark',
            ],
            'Round' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Round',
            ],
            'Result' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Result',
            ],
            'BeforeCredit' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BeforeCredit',
            ],
            'BetAmountBase' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmountBase',
            ],
            'BetAmountBonus' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmountBonus',
            ],
            'DeviceType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.DeviceType',
            ],
            'MainBillNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.MainBillNo',
            ],
            'NetAmountBase' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.NetAmountBase',
            ],
            'NetAmountBonus' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.NetAmountBonus',
            ],
            'SlotType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SlotType',
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
            'Cost' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Cost',
            ],
            'CreationTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.CreationTime',
            ],
            'CurrentAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.CurrentAmount',
            ],
            'HunterBetId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.HunterBetId',
            ],
            'Earn' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Earn',
            ],
            'ExchangeRate' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ExchangeRate',
            ],
            'PlayerIp' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerIp',
            ],
            'JackpotComm' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.JackpotComm',
            ],
            'PreviousAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.PreviousAmount',
            ],
            'RoomBet' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.RoomBet',
            ],
            'RoomId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RoomId',
            ],
            'SceneEndTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.SceneEndTime',
            ],
            'SceneStartTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.SceneStartTime',
            ],
            'TransferAmount' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransferAmount',
            ],
            'TradeNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TradeNo',
            ],
            'HunterPlayType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.HunterPlayType',
            ],
            'SceneId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SceneId',
            ]
        ];
    }
}