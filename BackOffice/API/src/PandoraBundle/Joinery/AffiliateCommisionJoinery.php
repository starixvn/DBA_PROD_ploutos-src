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
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\AffiliateCommissionStatusTypeEnum;

class AffiliateCommisionJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'CommissionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.CommissionDate',
            ],
            'TotalSignUps' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.TotalSignUps',
            ],
            'TotalActivePlayer' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.TotalActivePlayer',
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
            // 'TotalNgr' => [
            //     'type' => new DecimalType(),
            //     'joineryTerm' => 'a.TotalNgr',
            // ],
            'NegativeBalance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.NegativeBalance',
            ],
            'Income' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Income',
            ],
            'RollbaseId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RollbaseId',
            ],
            'AffiliateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AffiliateId',
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandCode',
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
            'PeriodStart' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.PeriodStart',
            ],
            'PeriodEnd' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.PeriodEnd',
            ],
            'NumberOfClicks' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.NumberOfClicks',
            ],
            'FTDCount' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.FTDCount',
            ],
            'AcumWinLoss' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.AcumWinLoss',
            ],
            'PrevEarning' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.PrevEarning',
            ],
            'TotalEarning' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TotalEarning',
            ],
            'Status' => [
                'type' => new AffiliateCommissionStatusTypeEnum(),
                'joineryTerm' => 'a.Status',
            ],
            'RunningIncome' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.RunningIncome',
            ],
            'TransactionNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNumber',
            ],
            // 'AssignedTo' => [
            //     'type' => new StringType(),
            //     'joineryTerm' => 'a.AssignedTo',
            // ],
            
            // AFFILIATES
            'AffiliateCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.AffiliateCode',
            ],
            'AffiliateName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.AffiliateName',
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserName'
            ],
            'AffiliateType' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.AffiliateType'
            ],
            
            // TRANSACTIOn GRAB
            'TransactionGrabId' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.Id AS TransactionGrabId'
            ],
            'Assignee' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.Assignee'
            ],
            'AssigneeUserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.UserId AS AssigneeUserId'
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