<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UniqueDepositAmountJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'WalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletId'
            ],
            'WalletDepositId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletDepositId'
            ],
            'UniqueDepositAmountRuleId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UniqueDepositAmountRuleId'
            ],
            'DepositAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.DepositAmount'
            ],
            'UDARuleValue' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.UDARuleValue'
            ],
            'GeneratedUDA' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.GeneratedUDA'
            ],
            'DateGenerated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateGenerated'
            ],
            'ValidityDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.ValidityDate'
            ],
            'InUse' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.InUse'
            ],
            'IsReserved' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsReserved'
            ],
            'UpdateTag' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UpdateTag'
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