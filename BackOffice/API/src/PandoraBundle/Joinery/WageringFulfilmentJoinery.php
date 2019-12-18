<?php
namespace PandoraBundle\Joinery;

use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class WageringFulfilmentJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'WageringFulfilmentName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WageringFulfilmentName'
            ],
            'BetAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'a.BetAmount'
            ],
            'PlayerBetId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerBetId'
            ],
            'WalletDepositId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WalletDepositId'
            ],
            'IsBeingPushed' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsBeingPushed'
            ],
            'CreatedById' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new StringType(),
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
			
			// PLAYERBET
            'PlayerBetName' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BetName AS PlayerBetName'
			],	
			
			// WALLET DEPOSIT
            'WalletDepositBankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.BankName AS WalletDepositBankName'
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