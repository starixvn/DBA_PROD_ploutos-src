<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Enum\PlayerMessagesStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\MessagesTypeEnum;

class PlayerMessagesJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerProfileId'
            ],
            'UserAccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserAccountNo'
            ],
            'PlayerMessageNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerMessageNumber'
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'MessageId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.MessageId'
            ],
            'DateSeen' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateSeen'
            ],
            'Status' => [
                'type' => new PlayerMessagesStatusTypeEnum(),
                'joineryTerm' => 'a.Status'
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
            
            // RELATED RECORDS
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserName'
            ],
            'FullName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.FullName'
            ],
            
            // MESSSAGE RECORDS
            'MessageNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.MessageNumber'
            ],
            'CurrencyId'  => [
                'type' => new IdType(),
                'joineryTerm' => 'c.CurrencyId'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'c.BrandId'
            ],   
            'MessageType' => [
                'type' => new MessagesTypeEnum(),
                'joineryTerm' => 'c.MessageType',
            ],  
            'IsFromPlayer' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'c.IsFromPlayer'
            ],  
            'SendDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'c.SendDate'
            ],
            'SentToAll' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'c.SentToAll'
            ],
            'MessageContent' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.MessageContent'
            ],
            
            
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.BrandCode'
            ],
            
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.CurrencyCode'
            ],
            
            // 'BrandCode' => [
            //     'type' => new StringType(),
            //     'joineryTerm' => 'c.BrandCode'
            // ],
            // 'CurrencyCode' => [
            //     'type' => new StringType(),
            //     'joineryTerm' => 'c.CurrencyCode'
            // ],

            // // PLAYER MESSSAGE SEEN HISTORY RECORDS
            // 'DateSeen' => [
            //     'type' => new DateTimeType(),
            //     'joineryTerm' => 'd.DateSeen'
            // ],


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