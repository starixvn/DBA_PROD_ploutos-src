<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PaymentGatewayBankJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BankCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankCode'
            ],
            'BankAbb' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankAbb'
            ],
            'BankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankName'
            ],
            'BankNameEn' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankNameEn'
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandCode'
            ],
            'PaymentGateway' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.PaymentGateway'
            ],
            'DepositMode' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.DepositMode'
            ],
            'BankTransactionType' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.BankTransactionType'
            ],
            'IsOnline' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsOnline'
            ],
            'WebSequence' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.WebSequence'
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