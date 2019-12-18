<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/6/17
 * Time: 6:09 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Enum\SettlementPeriodTypeEnum;
use PandoraBundle\GraphQL\Enum\AffiliateStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\AffiliateTypeEnum;

class AffiliateJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'AffiliateCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AffiliateCode',
            ],
            'AffiliateName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AffiliateName',
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
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName',
            ],
            'Password' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Password',
            ],
            'ConfirmPassword' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ConfirmPassword',
            ],
            'UserId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.UserId',
            ],
            'FullName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FullName',
            ],
            'PrimaryEmail' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PrimaryEmail',
            ],
            'SecondaryEmail' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecondaryEmail',
            ],
            'PhoneCountryCodeNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PhoneCountryCodeNo',
            ],
            'PhoneNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PhoneNo',
            ],
            'WebsiteURL' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WebsiteURL',
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CurrencyCode',
            ],
            'IM1' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.IM1',
            ],
            'IM1UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.IM1UserName',
            ],
            'IM2' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.IM2',
            ],
            'IM2UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.IM2UserName',
            ],
            'SecurityQuestionId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SecurityQuestionId',
            ],
            'SecurityAnswer' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecurityAnswer',
            ],
            'AgreedToCondition' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.AgreedToCondition',
            ],
            'IsLegalAge' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsLegalAge',
            ],
            'WalletBalance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WalletBalance',
            ],
            'CountryCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CountryCode',
            ],
            'BankAccountName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankAccountName',
            ],
            'BankAccountNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankAccountNumber',
            ],
            'BankAccountBranch' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankAccountBranch',
            ],
            'BankAccountCity' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankAccountCity',
            ],
            'BankAccountProvince' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BankAccountProvince',
            ],
            'BankId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankId',
            ],
//             'EarningPlanId' => [
//                 'type' => new IdType(),
//                 'joineryTerm' => 'a.EarningPlanId',
//             ],
            'LastLoginDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.LastLoginDate',
            ],
            'BonusCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BonusCode',
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BrandId'
            ],
            'AffiliateTypeCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AffiliateType',
            ],
            'AffiliateType' => [
                'type' => new AffiliateTypeEnum(),
                'joineryTerm' => 'a.AffiliateType',
            ],
            'SettlementPeriod' => [
                'type' => new SettlementPeriodTypeEnum(),
                'joineryTerm' => 'a.SettlementPeriod',
            ],
            'AffiliateStatus' => [
                'type' => new AffiliateStatusTypeEnum(),
                'joineryTerm' => 'a.AffiliateStatus',
            ],
            'MarketingCost' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.MarketingCost',
			],
            
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
			],			
            
            'IMPlatformName1' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.IMPlatformName AS IMPlatformName1'
			],
            
            'IMPlatformName2' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.IMPlatformName AS IMPlatformName2'
			],
            'BankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.BankName'
			],
            
            'EarningPlanName' => [
                'type' => new StringType(),
                'joineryTerm' => 'f.EarningPlanName'
			],
            
            'SecurityQuestionDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'g.SecurityQuestionDesc'
            ],
            
            'CountryName' => [
                'type' => new StringType(),
                'joineryTerm' => 'h.CountryName',
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