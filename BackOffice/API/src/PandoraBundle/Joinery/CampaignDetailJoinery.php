<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;

class CampaignDetailJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BonusId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BonusId'
            ],
            'CampaignLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CampaignLevelId'
            ],
            'BonusAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BonusAmount'
            ],
            'WageringAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WageringAmount'
            ],
            'CampaignDetailLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CampaignDetailLevelId'
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
            ]
        ];
    }
}