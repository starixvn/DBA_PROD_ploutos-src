<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class TicketCategoryJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'TicketCategoryName' => [
                'type' => new StringType(),//NonNullType(new StringType()),
                'joineryTerm' => 'a.TicketCategoryName'
            ],
            'TicketCategoryDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TicketCategoryDesc'
            ],
            'TicketCategoryCode' => [
                'type' => new StringType(),//NonNullType(new StringType()),
                'joineryTerm' => 'a.TicketCategoryCode'
            ],
            'BrandId' => [
                'type' => new IdType(),//NonNullType(new IdType()),
                'joineryTerm' => 'a.BrandId'
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
            
            'Brand' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode AS Brand'
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