<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerfingerprinthitJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'FingerPrint' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FingerPrint'
            ],
            'FingerPrintHits' => [
                'type' => new IdType(),
                'joineryTerm' => '0 AS FingerPrintHits',
            ],
            'FingerPrintId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.FingerPrintId'
            ],
            'FingerPrintRBId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.FingerPrintRBId'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerRegistrationId'
            ],
            'PlayerRBId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerRBId'
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
            ]
        ];
    }
}