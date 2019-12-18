<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\SerializedType;

class PaymentMethodJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'PaymentMethodCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentMethodCode'
            ],
            'PaymentMethodName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentMethodName'
            ],
            'PaymentRiskLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PaymentRiskLevelId'
            ],
            'UniqueDepositAmountRuleId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UniqueDepositAmountRuleId'
            ],
            'IsOnlinePayment' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsOnlinePayment'
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId'
            ],
            'PaymentMethodDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentMethodDesc'
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
            'RecordName' => [
                'type' => new StringType(),
                'joineryTerm' => "ConcatWs(' - ', a.PaymentMethodCode, c.CurrencyCode, b.PaymentRiskLevelName) AS RecordName"
            ],
            'BrandId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.BrandId'
            ],
            
            // PAYMENT RISK LEVEL
            'PaymentRiskLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.PaymentRiskLevelName'
            ],
            'PaymentRiskLevelCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.PaymentRiskLevelCode'
            ],
            
            // CURRENCY
            'CurrencyName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.CurrencyName'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.CurrencyCode'
            ],
            
            // UNIQUE AMOUNT DEPOSIT RULE
            'RuleName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.RuleName'
            ],            
            
            // BRAND
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.BrandCode'
            ],
            
            'CreatedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'x.UserName AS CreatedByUserName'
            ],
            'ModifiedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'y.UserName AS ModifiedByUserName'
            ],

            // COUNTRY
            'CountryIds'  => [
                'type' => new SerializedType(),
                'joineryTerm' => 'a.Id'
            ],
        ];
    }
}