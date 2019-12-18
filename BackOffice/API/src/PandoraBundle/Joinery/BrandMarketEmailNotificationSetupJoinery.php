<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\BrandMarketEmailNotificationTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BrandMarketEmailNotificationSetupJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BrandMarketId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.BrandMarketId'
            ],
            'EmailNotificationType' => [
                'type' => new NonNullType(new BrandMarketEmailNotificationTypeEnum()),
                'joineryTerm' => 'a.EmailNotificationType'
            ],
            'EmailTemplateCode' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.EmailTemplateCode'
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
            
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.BrandCode'
            ],
            'BrandName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.BrandName'
            ],
            'BrandUrl' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.BrandUrl'
            ],
            
            'CountryCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.CountryCode'
            ],
            'CountryName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.CountryName'
            ],
            'CountryCallCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.CountryCallCode'
            ],
            
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.CurrencyCode'
            ],
            'CurrencyName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.CurrencyName'
            ],
            
//             // BRAND
//             'BrandCode' => [
//                 'type' => new StringType(),
//                 'joineryTerm' => 'b.BrandCode'
//             ],
//             // COUNTRY
//             'CountryName' => [
//                 'type' => new StringType(),
//                 'joineryTerm' => 'c.CountryName'
//             ],
//             // CURRENCY
//             'CurrencyCode' => [
//                 'type' => new StringType(),
//                 'joineryTerm' => 'd.CurrencyCode'
//             ],
            
            
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