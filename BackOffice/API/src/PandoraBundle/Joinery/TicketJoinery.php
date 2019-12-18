<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\TicketStatusTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class TicketJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'TicketNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TicketNo'
            ],
            'TicketDetails' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TicketDetails'
            ],
            'TicketCategoryId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.TicketCategoryId'
            ],
            'TicketSubject' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TicketSubject'
            ],
            'AssignedTo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AssignedTo'
            ],
            'PlayerName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerName'
            ],
            'TeamId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.TeamId'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
            ],
            'Status' => [
                'type' => new TicketStatusTypeEnum(),
                'joineryTerm' => 'a.Status'
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
            ],
            
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
            ],
            'TicketCategoryName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.TicketCategoryName'
            ],
            'TeamName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.TeamName'
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