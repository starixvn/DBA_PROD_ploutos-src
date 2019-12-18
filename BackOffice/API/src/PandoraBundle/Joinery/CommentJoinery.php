<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\SystemModulesTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CommentJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'SourceObject' => [
                'type' => new SystemModulesTypeEnum(),
                'joineryTerm' => 'a.SourceObject'
            ],
            'SourceObjectId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SourceObjectId'
            ],
            'SourceObjectName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SourceObjectName'
            ],
            'CommentedBy' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CommentedBy'
            ],
            'Note' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Note'
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