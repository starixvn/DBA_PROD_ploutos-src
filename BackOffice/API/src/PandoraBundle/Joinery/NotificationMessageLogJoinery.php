<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Enum\NotificationProviderTypeEnum;
use PandoraBundle\GraphQL\Enum\RecieverTypeTypeEnum;
use PandoraBundle\GraphQL\Enum\NotificationMessageLogTypeEnum;

class NotificationMessageLogJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'ProviderMessageId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ProviderMessageId'
            ],
            'ReceiverInfo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ReceiverInfo'
            ],
            'ReceiverType' => [
                'type' => new RecieverTypeTypeEnum(),
                'joineryTerm' => 'a.ReceiverType'
            ],
            'StatusCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.StatusCode'
            ],
            'StatusDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.StatusDesc'
            ],
            'MessageSent' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.MessageSent'
            ],
            'NotificationProvider' => [
                'type' => new NotificationProviderTypeEnum(),
                'joineryTerm' => 'a.NotificationProvider'
            ],
            'NotifyType' => [
                'type' => new NotificationMessageLogTypeEnum(),
                'joineryTerm' => 'a.NotifyType'
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