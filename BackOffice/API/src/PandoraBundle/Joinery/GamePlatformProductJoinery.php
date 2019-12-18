<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\GameClassTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class GamePlatformProductJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'GamePlatformProductCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GamePlatformProductCode'
            ],
            'GamePlatformProductName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GamePlatformProductName'
            ],
            'GamePlatformId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GamePlatformId'
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
            'GameType' => [
                'type' => new GameClassTypeEnum(),
                'joineryTerm' => 'a.GameType'
            ],
            'Base64Image' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Base64Image'
            ],
            'SequenceNo' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.SequenceNo'
            ],
            'GameLogCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameLogCode'
            ],
            'Version' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Version'
            ],
            'ImageUrl' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ImageUrl'
            ],
            'ImageFileName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ImageFileName'
            ],
            'GameType1' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameType1'
            ],
            'LaunchGameName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LaunchGameName'
            ],
            'RebateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RebateId'
            ],
            'ProductType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ProductType'
			],
			
			// GAME PLATFORM
            'GamePlatformCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.GamePlatformCode'
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