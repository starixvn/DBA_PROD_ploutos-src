<?php
namespace PandoraBundle\Joinery;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class EmailTemplateJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'TemplateCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TemplateCode'
            ],
            'TemplateName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TemplateName'
            ],
            'Subject' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Subject'
            ],
            'MsgBody' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.MsgBody'
            ],
            'JsonBody' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.JsonBody'
            ],
            'FromEmail' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FromEmail'
            ],
            'FromName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FromName'
            ],
            'Language' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Language'
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