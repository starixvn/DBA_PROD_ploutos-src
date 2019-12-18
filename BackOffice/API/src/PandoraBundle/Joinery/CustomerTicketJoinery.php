<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CustomerTicketJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'CustomerFullName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CustomerFullName'
            ],
            'ContactId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ContactId'
            ],
            'MessageSubject' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.MessageSubject'
            ],
            'MessageInfo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.MessageInfo'
            ],
            'MessageReply' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.'
            ],
            'AnswerByName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AnswerByName'
            ],
            'AnswerById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AnswerById'
            ],
            'IsResolved' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsResolved'
            ],
            'DateReported' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateReported'
            ],
            'DateResolved' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateResolved'
            ],
            'ContactIdType' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.ContactIdType'
            ],
            'Severity' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.Severity'
            ],
            'SystemClientType' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.SystemClientType'
            ],
            'ReportByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ReportByUserName'
            ],
            'ReportByUserId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ReportByUserId'
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