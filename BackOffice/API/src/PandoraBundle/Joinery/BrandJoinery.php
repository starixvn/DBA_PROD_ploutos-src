<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BrandJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandCode'
            ],
            'BrandName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandName'
            ],
            'BrandUrl' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandUrl'
            ],
            'BrandGamePrefix' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BrandGamePrefix'
            ],
            'GameForwardEndpoint' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.GameForwardEndpoint'
            ],
            'DepositEndpoint' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.DepositEndpoint'
            ],
            'WithdrawalEndpoint' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WithdrawalEndpoint'
            ],
            'IsActive' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsActive'
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
            'IsAutoVerified' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsAutoVerified'
            ],
            'IsAffiliateRequired' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsAffiliateRequired'
            ],
            
            // MERCHANTs
            'MerchantId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.MerchantId'
            ],
            'MerchantName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.MerchantName'
            ],
            'AuthorizationKey' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.AuthorizationKey'
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