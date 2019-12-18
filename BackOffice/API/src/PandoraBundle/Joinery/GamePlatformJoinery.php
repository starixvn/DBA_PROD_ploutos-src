<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class GamePlatformJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'GamePlatformCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GamePlatformCode'
            ],
            'GamePlatformName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GamePlatformName'
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
            'SequenceNo' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.SequenceNo'
            ],
            'ServiceProviderCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ServiceProviderCode'
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId'
            ],
            'LanguageId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.LanguageId'
            ],
			
			// CURRENCY
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.CurrencyCode'
			],
			
			// LANGUAGE
            'LanguageName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.LanguageName'
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