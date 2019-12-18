<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AspNetUserJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'Email' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Email'
            ],
            'EmailConfirmed' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.EmailConfirmed'
            ],
            'PasswordHash' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PasswordHash'
            ],
            'SecurityStamp' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecurityStamp'
            ],
            'PhoneNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PhoneNumber'
            ],
            'PhoneNumberConfirmed' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.PhoneNumberConfirmed'
            ],
            'TwoFactorEnabled' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.TwoFactorEnabled'
            ],
            'LockoutEndDateUtc' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.LockoutEndDateUtc'
            ],
            'LockoutEnabled' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.LockoutEnabled'
            ],
            'AccessFailedCount' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.AccessFailedCount'
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ]
        ];
    }
}