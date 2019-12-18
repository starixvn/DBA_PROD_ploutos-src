<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AgentJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserId'
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'AgentCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AgentCode'
            ],
            'BusinessName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BusinessName'
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandCode'
            ],
            'Currency' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Currency'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
            ],
            'WalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletId'
            ],
            'DefaultPassword' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.DefaultPassword'
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
            ]
        ];
    }
}