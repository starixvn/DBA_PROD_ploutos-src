<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 5:45 PM
 */

namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;

class AffiliateCommisionDetailJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId',
            ],
            'AffiliateCommissionId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AffiliateCommissionId',
            ],
            'TotalLoss' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TotalLoss',
            ],
            'TotalWin' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TotalWin',
            ],
            'CompanyWin' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.CompanyWin',
            ],
            'Bonuses' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Bonuses',
            ],
            'Rebates' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Rebates',
            ],
            'NetWinLoss' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.NetWinLoss',
            ],
            'ConversionRate' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ConversionRate',
            ],
            'ActivePlayerCountAsOf' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ActivePlayerCountAsOf',
            ],
            'AsOfDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.AsOfDate',
            ],
            'PeriodStartDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.PeriodStartDate',
            ],
            'PeriodEndDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.PeriodEndDate',
            ],
            'ConvertedAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ConvertedAmount',
            ],
            'AffiliateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AffiliateId',
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
            
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.CurrencyCode',
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