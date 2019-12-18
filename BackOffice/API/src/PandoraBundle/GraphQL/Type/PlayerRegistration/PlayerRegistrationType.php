<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\PlayerRegistration;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;

class PlayerRegistrationType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'Id' => new NonNullType(new IdType()),
            'UserAccountNo' => new StringType(),
            'UserId' => new StringType(),
            'UserName' => new StringType(),
            'MobileCountryCode' => new StringType(),
            'MobileNo' => new StringType(),
            'Email' => new StringType(),
            'CurrencyCode' => new StringType(),
            'RefferalCode' => new StringType(),
            'IPAddress' => new StringType(),
            'BrandCode' => new StringType(),
            'LanguageCode' => new StringType(),
            'PlayerRegisterStatus' => new IdType(),
            'VerificationCode' => new StringType(),
            'RollbaseId' => new IdType(),
            'IsVerified' => new BooleanType(),
            'BrandId' => new IdType(),
            'IsMobileVerified' => new BooleanType(),
            'IsEmailVerified' => new BooleanType(),
            'IsCreatedFromBackOffice' => new BooleanType(),
            'PlayerType' => new IntType(),
            'NeedChangePasword' => new BooleanType(),
            'NeedToSync' => new BooleanType(),
            'CreatedById' => new StringType(),
            'ModifiedById' => new StringType(),
            'DateCreated' => new DateTimeType(),
            'DateModified' => new DateTimeType(),
            'ActiveRecord' => new BooleanType(),
            'AffiliateId' => new IdType(),
            'SignupCode' => new StringType(),
            'LastLoginIPAddress' => new StringType(),
            'Platform' => new DateTimeType(),
            'LastLoginTime' => new IdType(),
            'SrcUrl' => new StringType(),
            'CurrencyId' => new IdType()
        ]);
    }
}