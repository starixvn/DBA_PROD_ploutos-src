<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AspNetUserLoginJoinery{
    
    public static function fields(){
        return [
            'LoginProvider' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LoginProvider'
            ],
            'ProviderKey' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ProviderKey'
            ],
            'UserId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UserId'
            ]
        ];
    }
}