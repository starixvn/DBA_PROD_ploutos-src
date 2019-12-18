<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerNotesJoinery{
    
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
            'TeamId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.TeamId'
            ],
            'PlayerNoteCategoryId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerNoteCategoryId'
            ],
            'PlayerNoteTypeId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerNoteTypeId'
            ],
            'PlayerNoteSubject'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerNoteSubject'
            ],
            'PlayerNoteDesc'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerNoteDesc'
            ],
            
            'CreatedById'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById'  => [
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
            
            
            // RELATED RECORDS
            'TeamName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.TeamName'
            ],
            'TeamCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.TeamCode'
            ],
            'PlayerNoteCategoryName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.PlayerNoteCategoryName'
            ],
            'PlayerNoteCategoryCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.PlayerNoteCategoryCode'
            ],
            'PlayerNoteTypeName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.PlayerNoteTypeName'
            ],
            'PlayerNoteTypeCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.PlayerNoteTypeCode'
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.UserName'
            ],
            'FullName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.FullName'
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