<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\SerializedType;

class FileManagedJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'FileIds' => [
                'type' => new SerializedType(),
                'joineryTerm' => 'a.Id AS FileIds',
            ],
            'JsArrayLoc' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.JsArrayLoc'
            ],
            'SourceObject' => [
                'type' => new SystemModulesIntTypeEnum(),
                'joineryTerm' => 'a.SourceObject'
            ],
            'SourceObjectId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SourceObjectId'
            ],
            'PayLoad' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.Id AS PayLoad'
            ],
            'Uri' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Uri'
            ],
            'FileName' => [
                'type' => new NonNullType(new StringType()),
                'joineryTerm' => 'a.FileName'
            ],
            'FileMime' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FileMime'
            ],
            'Extension' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Extension'
            ],
            'FileSize' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.FileSize'
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
            ]
        ];
    }
}