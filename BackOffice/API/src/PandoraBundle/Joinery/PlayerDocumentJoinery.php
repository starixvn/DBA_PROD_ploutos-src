<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\SerializedType;
use PandoraBundle\GraphQL\Enum\PlayerDocumentTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerDocumentJoinery{
    
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
            'Type' => [
                'type' => new PlayerDocumentTypeEnum(),
                'joineryTerm' => 'a.Type'
            ],
            'DocumentTypeTitle' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.DocumentTypeTitle'
            ],
            'ExpireOn' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.ExpireOn'
            ],
            'IdNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.IdNumber'
            ],
            'Document' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Document'
            ],
            'CreatedById'  => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new StringType(),
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
            'FileIds' => [
                'type' => new SerializedType(),
                'joineryTerm' => 'a.Id'
            ],
            'FileInfos' => [
                'type' => new SerializedType(),
                'joineryTerm' => 'a.Id'
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