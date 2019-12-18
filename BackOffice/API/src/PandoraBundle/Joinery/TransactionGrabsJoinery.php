<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;

class TransactionGrabsJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'TransactionType' => [
                'type' => new SystemModulesIntTypeEnum(),
                'joineryTerm' => 'a.TransactionType'
            ],
            'SourceObjectId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SourceObjectId'
            ],
            'SourceObjectName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SourceObjectName'
            ],
            'Note' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Note'
            ],
            'Assignee' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Assignee'
            ],
            'IsGrabbed' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsGrabbed'
            ],
            'UserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserId'
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