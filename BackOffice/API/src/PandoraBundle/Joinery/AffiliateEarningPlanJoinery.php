<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 5:57 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;

class AffiliateEarningPlanJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'EarningPlanCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.EarningPlanCode',
            ],
            'EarningPlanName' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.EarningPlanName',
            ],
            'EarningPlanDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.EarningPlanDesc',
            ],
            'RevenueShare' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.RevenueShare',
            ],
            'MinimumNGR' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MinimumNGR',
            ],
            'FixedCommisionAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.FixedCommisionAmount',
            ],
            'IsActive' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsActive',
            ],
//             'WhichEverisHigher' => [
//                 'type' => new BooleanType(),
//                 'joineryTerm' => 'a.WhichEverisHigher',
//             ],
//             'IsTakeHigher' => [
//                 'type' => new BooleanType(),
//                 'joineryTerm' => 'a.IsTakeHigher',
//             ],
            
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
            'MinActivePlayer' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.MinActivePlayer',
            ],
            'BrandId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.BrandId'
            ],
            'CurrencyId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.CurrencyId'
            ],
            
            // JOIN CURRENCY
            'CurrencyCode'  => [
                'type' => new StringType(),
                'joineryTerm' => 'b.CurrencyCode'
            ],
            
            
            // BRAND
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.BrandCode'
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