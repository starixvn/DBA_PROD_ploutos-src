<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class GamePlatformSupportedLanguageJoinery{
    
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
            'LanguageCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LanguageCode'
            ],
            'GamePlatformLanguageCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GamePlatformLanguageCode'
            ],
            'GamePlatformId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GamePlatformId'
            ],
            'LanguageId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.LanguageId'
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
            ]
        ];
    }
}