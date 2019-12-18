<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class WalletLedgerTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'NONE',
            ],
            [
                'value' => 1,
                'name'  => 'DEPOSIT',
            ],
            [
                'value' => 2,
                'name'  => 'WITHDRAW',
            ],
            [
                'value' => 3,
                'name'  => 'WITHDRAW_REJECT',
            ],
            [
                'value' => 4,
                'name'  => 'CM',
            ],
            [
                'value' => 5,
                'name'  => 'DM',
            ],
            [
                'value' => 6,
                'name'  => 'IN',
            ],
            [
                'value' => 7,
                'name'  => 'OUT',
            ],
            [
                'value' => 8,
                'name'  => 'BET',
            ],
            [
                'value' => 9,
                'name'  => 'WIN',
            ],
            [
                'value' => 10,
                'name'  => 'LOSS',
            ],
            [
                'value' => 11,
                'name'  => 'CANCEL',
            ],
            [
                'value' => 12,
                'name'  => 'DEPOSIT_BONUS',
            ],
            [
                'value' => 13,
                'name'  => 'DEPOSIT_ADJ_ADD',
            ],
            [
                'value' => 14,
                'name'  => 'DEPOSIT_ADJ_BONUS_ADD',
            ],
            [
                'value' => 15,
                'name'  => 'DEPOSIT_ADJ_LESS',
            ],
            [
                'value' => 16,
                'name'  => 'DEPOSIT_ADJ_BONUS_LESS',
            ],
            [
                'value' => 17,
                'name'  => 'AFFILIATE_FUND_TRANSFER',
            ],
            [
                'value' => 18,
                'name'  => 'BET_CANCEL',
            ],
            [
                'value' => 19,
                'name'  => 'BET_TIE',
            ],
            [
                'value' => 20,
                'name'  => 'WIN_CANCEL',
            ],
            [
                'value' => 21,
                'name'  => 'LOSE_CANCEL',
            ],
            [
                'value' => 22,
                'name'  => 'SYSTEM_ADJUTMENT',
            ]
        ];
    }
}