<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/7/17
 * Time: 11:30 AM
 */

namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AgentSubAgentUserJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserId',
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName',
            ],
            'AgentSubAgentUserCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AgentSubAgentUserCode',
            ],
            'FullName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FullName',
            ],
            'AgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AgentId',
            ],
            'SubAgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SubAgentId',
            ],
            'CanCreatePlayer' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.CanCreatePlayer',
            ],
            'CanTransactPlayer' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.CanTransactPlayer',
            ],
            'CanViewPlayerReport' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.CanViewPlayerReport',
            ],
            'IsSubAgentUser' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsSubAgentUser',
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
            ]
        ];
    }
}