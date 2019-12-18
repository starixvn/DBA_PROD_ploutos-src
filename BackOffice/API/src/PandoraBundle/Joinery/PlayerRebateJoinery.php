<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/7/17
 * Time: 4:57 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerRebateJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'RebateTransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RebateTransactionNo'
            ],
            'RebateDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.RebateDate'
            ],
            'BetDateProcessed' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.BetDateProcessed'
            ],
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerProfileId'
            ],
            'RebateStatus' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RebateStatus'
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
            'TotalRebateAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TotalRebateAmount'
            ],
            'WalletAdjustmentMemoId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletAdjustmentMemoId'
            ],
            
            /* PLAYER PROFILE FIELDS */
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserName'
            ],
            
            /* WALLET ADJUSTMENT MEMO */
            'Remarks' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.Remarks'
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