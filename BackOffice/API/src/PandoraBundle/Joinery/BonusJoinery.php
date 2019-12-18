<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\BonusFactorBasisTypeEnum;
use PandoraBundle\GraphQL\Enum\BonusTypeEnum;
use PandoraBundle\GraphQL\Enum\BonusValueTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BonusJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BonusCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BonusCode'
            ],
            'BonusName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BonusName'
            ],
            'BonusDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BonusDesc'
            ],
            'BrandId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.BrandId'
            ],
            'VIPLevelId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.VIPLevelId'
            ],
            'ValidStartDate' => [
                'type' => new NonNullType(new DateTimeType()),
                'joineryTerm' => 'a.ValidStartDate'
            ],
            'ValidEndDate' => [
                'type' => new NonNullType(new DateTimeType()),
                'joineryTerm' => 'a.ValidEndDate'
            ],
            'IsActiveBonus' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsActiveBonus'
            ],
            'BonusType' => [
                'type' => new BonusTypeEnum(),
                'joineryTerm' => 'a.BonusType'
            ],
            'BonusTypeCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BonusTypeCode'
            ],
            'BonusTypeName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BonusTypeName'
            ],
            'BonusValueType' => [
                'type' => new NonNullType(new BonusValueTypeEnum()),
                'joineryTerm' => 'a.BonusValueType'
            ],
            'MinDepositAmount' => [
                'type' => new NonNullType(new DecimalType()),
                'joineryTerm' => 'a.MinDepositAmount'
            ],
            'BonusAmount' => [
                'type' => new NonNullType(new DecimalType()),
                'joineryTerm' => 'a.BonusAmount'
            ],
            'PercentAmount' => [
                'type' => new NonNullType(new DecimalType()),
                'joineryTerm' => 'a.PercentAmount'
            ],
            'LimitAmount' => [
                'type' => new NonNullType(new DecimalType()),
                'joineryTerm' => 'a.LimitAmount'
            ],
            'MaxNumberOfPlayer' => [
                'type' => new NonNullType(new IntType()),
                'joineryTerm' => 'a.MaxNumberOfPlayer'
            ],
            'MinDaysRegistered' => [
                'type' => new NonNullType(new IntType()),
                'joineryTerm' => 'a.MinDaysRegistered'
            ],
            'WageringFactor' => [
                'type' => new NonNullType(new DecimalType()),
                'joineryTerm' => 'a.WageringFactor'
            ],
            'BonusFactorBasis' => [
                'type' => new NonNullType(new BonusFactorBasisTypeEnum()),
                'joineryTerm' => 'a.BonusFactorBasis'
            ],
            'NumberOfPlayersAvailed' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.NumberOfPlayersAvailed'
            ],
            'IsOneTimeUsed' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsOneTimeUsed'
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
            'ShowToPlayer' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ShowToPlayer'
            ],
            'CurrencyId' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.CurrencyId'
            ],
            
            // BRAND
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.BrandCode'
            ],
            
            // CURRENCY
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.CurrencyCode'
            ],
            
            // VIP LEVEL
            'VipLevelCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'f.VipLevelCode'
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