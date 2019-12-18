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

class UniqueDepositAmountRuleJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'RuleCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RuleCode',
            ],
            'RuleName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RuleName',
            ],
            'StartValue' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.StartValue',
            ],
            'EndValue' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.EndValue',
            ],
            'IncrementValue' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.IncrementValue',
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord',
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