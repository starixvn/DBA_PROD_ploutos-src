<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class BankAccountTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'No_Deposit_Account',
            ],
            [
                'value' => 1,
                'name'  => 'Deposit_Account',
            ],
            [
                'value' => 2,
                'name'  => 'Holding_Account',
            ],
            [
                'value' => 3,
                'name'  => 'Withdrawal_Account',
            ]
        ];
    }
}