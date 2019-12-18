<?php
namespace PandoraBundle\Joinery;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;

class EmailBlastJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'EmailAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.EmailAddress'
            ],
            'EmailTemplateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.EmailTemplateId'
            ],
            'BatchId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BatchId'
            ],
            'EmailRecipientCount' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.EmailRecipientCount'
            ],
            'Counter' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.Counter'
            ],
            'EmailRecipientCount' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.EmailRecipientCount'
            ],
            'Status' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Status'
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
            
            
            'TemplateName'  => [
                'type' => new StringType(),
                'joineryTerm' => 'b.TemplateName'
            ],
            'TemplateCode'  => [
                'type' => new StringType(),
                'joineryTerm' => 'b.TemplateCode'
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