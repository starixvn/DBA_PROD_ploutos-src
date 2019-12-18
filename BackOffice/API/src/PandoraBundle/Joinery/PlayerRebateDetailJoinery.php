<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerRebateDetailJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'TotalBetAmount' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TotalBetAmount'
            ],
            'RebateAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.RebateAmount'
            ],
            'PlayerRebateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerRebateId'
            ],
            'RebateDetailId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RebateDetailId'
            ],
            'ProductId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ProductId'
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
            'RebateRate' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RebateRate'
            ]
        ];
    }
}