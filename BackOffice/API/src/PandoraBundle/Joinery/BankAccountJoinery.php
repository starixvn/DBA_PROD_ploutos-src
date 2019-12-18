<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Config\ColumnTypes\SerializedType;
use PandoraBundle\GraphQL\Enum\BankAccountTypeEnum;

class BankAccountJoinery{
    
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
            'AccountName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AccountName'
            ],
            'AccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AccountNo'
            ],
            'AccountType' => [
                'type' => new BankAccountTypeEnum(),
                'joineryTerm' => 'a.AccountType'
            ],
            'BankId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankId'
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId'
            ],
            'IsDefault' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsDefault'
            ],
            'CreatedById'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ModifiedById'
            ],
            'DateCreated'  => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated'
            ],
            'DateModified'  => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified'
            ],
            'ActiveRecord'  => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
            ],
            'InternetBankingUrl'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.InternetBankingUrl'
            ],
            'BalanceCeiling'  => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BalanceCeiling'
            ],
            'PaymentMethodIds'  => [
                'type' => new SerializedType(),
                'joineryTerm' => 'a.Id'
            ],
            
            // JOIN CURRENCY
            'CurrencyCode'  => [
                'type' => new StringType(),
                'joineryTerm' => 'b.CurrencyCode'
            ],
            
            // JOIN BANK 
            'IsOnlineBank'  => [
                'type' => new BooleanType(),
                'joineryTerm' => 'c.IsOnlineBank'
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