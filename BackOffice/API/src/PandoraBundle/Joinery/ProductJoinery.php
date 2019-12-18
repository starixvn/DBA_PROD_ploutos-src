<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ProductJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'Name' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Name'
            ],
            'Price' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Price'
            ],
            'Description' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Description'
            ]
        ];
    }
}