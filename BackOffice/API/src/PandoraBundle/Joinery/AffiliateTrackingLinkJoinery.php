<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 6:09 PM
 */

namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AffiliateTrackingLinkJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'AffiliateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AffiliateId'
            ],
            'LanguageId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.LanguageId'
            ],
            'AffiliateTrackingLinkCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AffiliateTrackingLinkCode',
            ],
            'WebsiteUrl' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WebsiteUrl',
            ],
            
            'AffiliateCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.AffiliateCode',
            ],
            'AffiliateName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.FullName AS AffiliateName',
            ],
            
            'LanguageCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.LanguageCode',
            ],
            'LanguageName' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.LanguageName',
            ],
            
            
            'CreatedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CreatedById',
            ],
            'ModifiedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ModifiedById',
            ],
            'DateCreated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated',
            ],
            'DateModified' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified',
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord',
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