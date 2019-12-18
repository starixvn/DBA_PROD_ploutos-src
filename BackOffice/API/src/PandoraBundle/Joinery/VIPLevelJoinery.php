<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class VIPLevelJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'VipLevelCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.VipLevelCode'
            ],
            'VipLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.VipLevelName'
            ],
            'MinDeposit' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MinDeposit'
            ],
            'MaxDeposit' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MaxDeposit'
            ],
            'MaxAggDeposit' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MaxAggDeposit'
            ],
            'MinWithdrawal' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MinWithdrawal'
            ],
            'MaxWithdrawal' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MaxWithdrawal'
            ],
            'MaxAggWithdrawal' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MaxAggWithdrawal'
            ],
            'FraudCheck' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.FraudCheck'
            ],
            'IsDefault' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsDefault'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
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
			
			// BRANDS
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
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