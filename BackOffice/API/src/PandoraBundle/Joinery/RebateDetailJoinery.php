<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 4:12 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class RebateDetailJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'RebateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RebateId',
            ],
            'RebateDetailName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RebateDetailName',
            ],
            'MinimumTotalBets' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MinimumTotalBets',
            ],
            'MaximumRebateAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MaximumRebateAmount',
            ],
            'RebateFactor' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.RebateFactor',
            ],
            'MaximumTotalBets' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MaximumTotalBets',
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId'
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
            
            // JOIN CURRENCY
            'CurrencyCode'  => [
                'type' => new StringType(),
                'joineryTerm' => 'b.CurrencyCode'
            ],
            
            // JOIN REBATE
            'RebateName'  => [
                'type' => new StringType(),
                'joineryTerm' => 'c.RebateName'
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