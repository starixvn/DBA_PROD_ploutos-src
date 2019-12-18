<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BGGameEventJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'SessionId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SessionId'
            ],
            'PlayerId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerId'
            ],
            'RoundId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RoundId'
            ],
            'Type' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Type'
            ],
            'Bet' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Bet'
            ],
            'Win' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Win'
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
            'Status' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Status'
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo'
            ],
            'GameId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GameId'
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate'
            ]
        ];
    }
}