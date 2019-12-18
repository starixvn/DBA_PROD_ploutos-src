<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;

class PaymentRiskLevelJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'PaymentRiskLevelCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentRiskLevelCode'
            ],
            'PaymentRiskLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentRiskLevelName'
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
            'SequenceNo'  => [
                'type' => new IntType(),
                'joineryTerm' => 'a.SequenceNo'
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