<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\BankTransactionTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class OnlineBanksJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'OnlineBankCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.OnlineBankCode'
            ],
            'OnlineBankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.OnlineBankName'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
            ],
            'OnlineBankTypeId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.OnlineBankTypeId'
            ],
            'TransactionType' => [
                'type' => new BankTransactionTypeEnum(),
                'joineryTerm' => 'a.TransactionType'
            ],
            // TODO: ADD SECOND VALIDATION TO Entity TO MAKE SURE THAT INPUT IS INDEED AN INTEGER
            'Sequence' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.Sequence'
            ],
            'Active' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.Active'
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
            
            // JOIN BRAND
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
            ],
            
            // JOIN ONLINEBANKTYPE
            'OnlineBankTypeName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.OnlineBankTypeName'
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