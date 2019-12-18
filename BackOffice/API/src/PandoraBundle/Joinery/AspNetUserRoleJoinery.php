<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\Scalar\IdType;

class AspNetUserRoleJoinery{
    
    public static function fields(){
        return [
            'UserId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UserId'
            ],
            'RoleId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RoleId'
            ]
        ];
    }
}