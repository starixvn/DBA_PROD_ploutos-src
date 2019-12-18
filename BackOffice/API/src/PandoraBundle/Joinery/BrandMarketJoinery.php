<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BrandMarketJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BrandId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.BrandId'
            ],
            'CountryId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.CountryId'
            ],
            'CurrencyId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.CurrencyId'
            ],
            
            'IsEnabled' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsEnabled'
            ],
            'IsDefault' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsDefault'
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
            
            
            'BrandMarketCode' => [
                'type' => new StringType(),
                'joineryTerm' => "ConcatWs('-', b.BrandCode, d.CurrencyCode) AS BrandMarketCode"
            ],
            
            
            // BRAND
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
            ],
            
            // COUNTRY
            'CountryName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.CountryName'
            ],
            
            // CURRENCY
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.CurrencyCode'
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