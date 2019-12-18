<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\AccessLogTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerAccessLogJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'AccessLog' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AccessLog'
            ],
            'IPAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.IPAddress'
            ],
            'FingerPrint' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FingerPrint'
            ],
            'FingerPrintHits' => [
                'type' => new IdType(),
                'joineryTerm' => '0 AS FingerPrintHits',
            ],
            'LogDateTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.LogDateTime'
            ],
            'AccessLogType' => [
                'type' => new AccessLogTypeEnum(),
                'joineryTerm' => 'a.AccessLogType'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerRegistrationId'
            ],
            'IsBeingSync' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsBeingSync'
            ],
            'CreatedById' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ModifiedById'
            ],
            'DateCreated'  => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated'
            ],
            'DateModified'  => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified'
            ],
            'ActiveRecord'  => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
            ],
            'PlayerFingerPrintId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerFingerPrintId'
            ],
            'NeedToSync' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.NeedToSync'
            ],
            'FingerPrintHits' => [
                'type' => new StringType(),
                'joineryTerm' => '(SELECT COUNT(1) FROM PandoraBundle:Playerfingerprinthits AS pf WHERE pf.FingerPrint = a.FingerPrint) AS FingerPrintHits'
            ],
            
            // WALLET OBJECT
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'b.Id AS PlayerProfileId'
            ],
            // WALLET OBJECT
            'UserName' => [
                'type' => new IdType(),
                'joineryTerm' => 'b.UserName'
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