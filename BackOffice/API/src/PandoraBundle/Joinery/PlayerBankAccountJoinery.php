<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Enum\ActiveStatusTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PlayerBankAccountJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BankAccountName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankAccountName'
            ],
            'AccountName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AccountName'
            ],
            'AccountNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AccountNumber'
            ],
            'BranchName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BranchName'
            ],
            'City' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.City'
            ],
            'Province' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Province'
            ],
            'SwiftCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SwiftCode'
            ],
            'PlayerProfileId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerProfileId'
            ],
            'BankId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankId'
            ],
            'BankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankAccountId'
            ],
            'RollbaseId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RollbaseId'
            ],
            'IsActiveAccount' => [
                'type' => new ActiveStatusTypeEnum(),
                'joineryTerm' => 'a.IsActiveAccount'
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
            
            'BankCode'  => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BankCode'
            ],
            'BankName'  => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BankName'
            ],
            
            /* PLAYER PROFILE FIELDS */
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.UserName'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'c.PlayerRegistrationId'
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