<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\NotificationTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class NotificationJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'NotificationType' => [
                'type' => new NotificationTypeEnum(),
                'joineryTerm' => 'a.NotificationType'
            ],
            'NotificationName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.NotificationName'
            ],
            'NotificationDescription' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.NotificationDescription'
            ],
            'Title' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Title'
            ],
            'IsAllProducts' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsAllProducts'
            ],
            'IsSports' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsSports'
            ],
            'IsCasino' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsCasino'
            ],
            'IsGames' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsGames'
            ],
            'IsMobile' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsMobile'
            ],
            'IsPromo' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsPromo'
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