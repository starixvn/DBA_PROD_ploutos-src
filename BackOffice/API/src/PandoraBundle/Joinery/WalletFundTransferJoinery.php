<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
// use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\FundTransferTypeEnum;

class WalletFundTransferJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'SourceWalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SourceWalletId'
            ],
            'DestinationWalletId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.DestinationWalletId'
            ],
            'AgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AgentId'
            ],
            'SubAgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SubAgentId'
            ],
            'PlayertId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayertId'
            ],
            'TransactionNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TransactionNo'
            ],
            'TransactionDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TransactionDate'
            ],
            'TransferAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.TransferAmount'
            ],
            'CreditAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.CreditAmount'
            ],
            'DebitAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.DebitAmount'
            ],
            'Remarks' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Remarks'
            ],
            'FundTransferType' => [
                'type' => new FundTransferTypeEnum(),
                'joineryTerm' => 'a.FundTransferType'
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
            'isViewed' => [
                'type' => new IdType(),
                'joineryTerm' => '(SELECT rv.Id FROM PandoraBundle:Recordviewed AS rv WHERE rv.SourceObject = 3 AND rv.SourceObjectId = a.Id) AS isViewed'
            ],
            
            // SOURCE WALLET
            'SourceWalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.WalletCode AS SourceWalletCode'
            ],
            
            // DESTINATION WALLET
            'DestinationWalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.WalletCode AS DestinationWalletCode'
            ],
            
            // AGENT
            'AgentCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.AgentCode'
            ],
            'AgentUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.UserName AS AgentUserName'
            ],
            
            // SUB-AGENT
            'SubAgentCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.AgentCode AS SubAgentCode'
            ],
            'SubAgentUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.UserName AS SubAgentUserName'
            ],
            
            // PLAYER
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'f.UserName'
            ],
        ];
    }
}