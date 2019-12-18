<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Enum\MessagesTypeEnum;
use PandoraBundle\GraphQL\Enum\PlayerMessagesStatusTypeEnum;

class MessagesJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'MessageNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.MessageNumber'
            ],
            'SentToAll' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.SentToAll'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
            ],
            'CurrencyId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CurrencyId'
            ],
            'MessageType' => [
               'type' => new MessagesTypeEnum(),
               'joineryTerm' => 'a.MessageType',
            ],
            'IsFromPlayer' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsFromPlayer'
            ],
            'MessageContent' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.MessageContent'
            ],
            'SendDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.SendDate'
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
            
            
            // JOIN BRAND
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
            ],            
            
            // JOIN CURRENCY
            'CurrencyCode'  => [
                'type' => new StringType(),
                'joineryTerm' => 'c.CurrencyCode'
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