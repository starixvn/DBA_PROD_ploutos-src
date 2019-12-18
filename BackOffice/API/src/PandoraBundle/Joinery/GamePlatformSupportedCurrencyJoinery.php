<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class GamePlatformSupportedCurrencyJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'PlatformSupportedCurrency' => [
                'type' => new StringType(),
                'joineryTerm' => "ConcatWs('-', a.GamePlatformCode, a.CurrencyCode) AS PlatformSupportedCurrency"
            ],
            'GamePlatformCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GamePlatformCode'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CurrencyCode'
            ],
            'GamePlatformId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GamePlatformId'
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId'
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