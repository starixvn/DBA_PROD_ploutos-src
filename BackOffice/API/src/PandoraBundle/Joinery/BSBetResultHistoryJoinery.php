<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BSBetResultHistoryJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UserId'
            ],
            'ExtTransactionId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ExtTransactionId'
            ],
            'TransactionTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionTime'
            ],
            'BetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmount'
            ],
            'BetId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BetId'
            ],
            'WinAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WinAmount'
            ],
            'WinTransactionId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WinTransactionId'
            ],
            'RoundId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RoundId'
            ],
            'GameId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GameId'
            ],
            'IsRoundFinished' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsRoundFinished'
            ],
            'Hash' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Hash'
            ],
            'GameSessionId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GameSessionId'
            ],
            'NegativeBet' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.NegativeBet'
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
            ]
        ];
    }
}