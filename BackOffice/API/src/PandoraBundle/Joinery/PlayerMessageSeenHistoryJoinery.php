<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerMessageSeenHistoryJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'MessageId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.MessageId'
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerProfileId'
            ],
            'DateSeen' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateSeen'
            ],
            
            
            
            'MessageNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.MessageNumber'
            ],
            
            
            'ActiveRecord'  => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
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