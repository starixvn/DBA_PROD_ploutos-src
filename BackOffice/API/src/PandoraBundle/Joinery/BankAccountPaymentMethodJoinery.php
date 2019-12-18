<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BankAccountPaymentMethodJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankAccountId'
            ],
            'PaymentMethodId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PaymentMethodId'
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
            
            // PAYMENT METHOD
            'PaymentMethodActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'b.ActiveRecord AS PaymentMethodActiveRecord'
            ],
            'PaymentMethodCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.PaymentMethodCode'
            ],
            'PaymentMethodName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.PaymentMethodName'
            ],
            
            // PAYMENT METHOD -> PAYMENT RISK LEVEL
            'PaymentRiskLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'c.Id AS PaymentRiskLevelId'
            ],
            'PaymentRiskLevelCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.PaymentRiskLevelCode'
            ],
            'PaymentRiskLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.PaymentRiskLevelName'
            ],
            
            // BANK ACCOUNT
            'BankAccountActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'd.ActiveRecord AS BankAccountActiveRecord'
            ],
            'BankCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.BankCode'
            ],
            'BankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.BankName'
            ],
            'AccountName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.AccountName'
            ],
            'AccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.AccountNo'
            ],
            'AccountNameAndNo' => [
                'type' => new StringType(),
                'joineryTerm' => "CONCAT(d.AccountName, ' - ', d.AccountNo) AS AccountNameAndNo"
            ],
            'AccountType' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.AccountType'
            ],
            
        ];
    }
}