<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 11/7/17
 * Time: 9:36 AM
 */

namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\AffiliateTransactionStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\AffiliateTransactionTypeEnum;

class AffiliateTransactionJoinery
{
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'AffiliateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AffiliateId',
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate',
            ],
            'ApprovedDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.ApprovedDate',
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo',
            ],
            'TransactionAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TransactionAmount',
            ],
            'ApprovedAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.ApprovedAmount',
            ],
            'SourcePrevAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.SourcePrevAmount',
            ],
            'SourceNewAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.SourceNewAmount',
            ],
            'DestPrevAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(CASE WHEN a.DestPrevAmount < 0 THEN 0 ELSE a.DestPrevAmount END) AS DestPrevAmount',
            ],
            'DestNewAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(CASE WHEN a.DestNewAmount < 0 THEN 0 ELSE a.DestNewAmount END) AS DestNewAmount', 
            ],
            'RefTxnId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RefTxnId',
            ],
            'RollbaseId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.RollbaseId',
            ],
            'TxnType' => [
                'type' => new AffiliateTransactionTypeEnum(),
                'joineryTerm' => 'a.TxnType',
            ],
            'Status' => [
                'type' => new AffiliateTransactionStatusTypeEnum(),
                'joineryTerm' => 'a.Status',
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
            'NeedToSync' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.NeedToSync',
            ],
            'PlayerId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerId',
            ],
            
            // AFFILIATES
            'AffiliateCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.AffiliateCode',
            ],
            'AffiliateName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.AffiliateName',
            ],
            'AffiliateUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserName AS AffiliateUserName',
            ],
            
            
            // TRANSACTION GRAB
            'TransactionGrabId' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.Id AS TransactionGrabId'
            ],
            'Assignee' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.Assignee'
            ],
            'AssigneeUserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.UserId AS AssigneeUserId'
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