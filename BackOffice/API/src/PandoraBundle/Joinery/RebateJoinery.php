<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 4:12 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\GameClassIntTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class RebateJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'RebateCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RebateCode',
            ],
            'RebateName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RebateName',
            ],
            'ProductId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ProductId',
            ],
            'VipLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.VipLevelId',
            ],
            'CreatedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CreatedById',
            ],
            'ModifiedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ModifiedById',
            ],
            'DateCreated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated',
            ],
            'DateModified' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified',
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord',
            ],
            'GameType' => [
                'type' => new GameClassIntTypeEnum(),
                'joineryTerm' => 'a.GameType',
			],
            
            // VIP LEVEL
            'VipLevelCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.VipLevelCode'
			],
			
            // GAME PLATFORM PRODUCT
            'ProductName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.GamePlatformProductName AS ProductName'
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