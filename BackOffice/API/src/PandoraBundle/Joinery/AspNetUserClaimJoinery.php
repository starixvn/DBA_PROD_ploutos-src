<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AspNetUserClaimJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UserId'
            ],
            'ClaimType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ClaimType'
            ],
            'ClaimValue' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ClaimValue'
            ]
        ];
    }
}