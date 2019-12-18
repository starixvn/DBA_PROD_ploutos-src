<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class OnlineBankTransactionTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'No_Transaction_Type',
            ],
            [
                'value' => 1,
                'name'  => 'Deposit_Only',
            ],
            [
                'value' => 2,
                'name'  => 'Withdrawal_Only',
            ],
            [
                'value' => 3,
                'name'  => 'Both_Deposit_Withdrawal',
            ],
            [
                'value' => 4,
                'name'  => 'Online',
            ]
        ];
    }
}