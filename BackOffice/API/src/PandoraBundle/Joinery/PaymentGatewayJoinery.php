<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PaymentGatewayJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'PaymentGatewayCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentGatewayCode'
            ],
            'PaymentGatewayName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentGatewayName'
            ],
            'PaymentGatewayDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PaymentGatewayDesc'
            ],
            'IsActive' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsActive'
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
            
            // JOIN
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
            ],
            'BrandName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandName'
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