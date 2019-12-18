<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/7/17
 * Time: 12:01 PM
 */

namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AGFundTransferJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserId',
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName',
            ],
            'UserAccountNumber' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserAccountNumber',
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo',
            ],
            'Amount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.Amount',
            ],
            'WalletPrevBal' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WalletPrevBal',
            ],
            'WalletNewBal' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.WalletNewBal',
            ],
            'AGWalletPrevBal' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.AGWalletPrevBal',
            ],
            'AGWalletNewBal' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.AGWalletNewBal',
            ],
            'TransferType' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransferType',
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
            ]
        ];
    }
}