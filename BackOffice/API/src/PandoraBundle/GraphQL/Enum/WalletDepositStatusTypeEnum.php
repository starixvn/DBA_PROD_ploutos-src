<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class WalletDepositStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Requested',
            ],
            [
                'value' => 2,
                'name'  => 'Approved',
            ],
            [
                'value' => 3,
                'name'  => 'Cancelled',
            ],
            [
                'value' => 5,
                'name'  => 'Processing',
            ],
            [
                'value' => 7,
                'name'  => 'Rejected',
            ],
            [
                'value' => 8,
                'name'  => 'OLD_Processing',
            ],
            [
                'value' => 10,
                'name'  => 'Online_Deposit_Cancel',
            ],
            [
                'value' => 11,
                'name'  => 'Cancelled_By_Player',
            ],
            [
                'value' => 100,
                'name'  => 'All',
            ]
        ];
    }
}