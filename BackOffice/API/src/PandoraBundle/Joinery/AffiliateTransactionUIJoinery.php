<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/7/17
 * Time: 9:36 AM
 */

namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\AffiliateTransactionUITypeEnum;

class AffiliateTransactionUIJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'AffiliateUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.AffiliateUserName',
            ],
            'TransactionAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TransactionAmount',
            ],
            'TxnType' => [
                'type' => new AffiliateTransactionUITypeEnum(),
                'joineryTerm' => 'a.TxnType',
            ],
        ];
    }
}