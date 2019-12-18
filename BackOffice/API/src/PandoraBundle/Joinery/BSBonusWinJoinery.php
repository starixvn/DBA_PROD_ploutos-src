<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BSBonusWinJoinery{
    
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
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'BonusId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BonusId'
            ],
            'Amount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Amount'
            ],
            'TransactionId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionId'
            ],
            'Hash' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Hash'
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