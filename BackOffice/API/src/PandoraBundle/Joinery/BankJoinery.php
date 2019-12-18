<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Enum\BankTransactionTypeEnum;

class BankJoinery{
    
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
            'BankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankName'
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
            'IsOnlineBank' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsOnlineBank'
            ],
            'BankTransactionType' => [
                'type' => new BankTransactionTypeEnum(),
                'joineryTerm' => 'a.BankTransactionType'
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
			],
			
            // JOIN CURRENCY
            'CurrencyCode'  => [
                'type' => new StringType(),
                'joineryTerm' => 'c.CurrencyCode'
            ],
            
            'CreatedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'x.UserName AS CreatedByUserName'
            ],
            'ModifiedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'y.UserName AS ModifiedByUserName'
            ]
        ];
    }
}