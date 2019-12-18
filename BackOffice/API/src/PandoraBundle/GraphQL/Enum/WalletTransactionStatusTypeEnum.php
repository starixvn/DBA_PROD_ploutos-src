<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class WalletTransactionStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Requested',
            ],
            [
                'value' => 1,
                'name'  => 'Confirmed',
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
                'value' => 4,
                'name'  => 'Declined',
            ],
            [
                'value' => 5,
                'name'  => 'Processing',
            ],
            [
                'value' => 6,
                'name'  => 'Cleared',
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
                'value' => 9,
                'name'  => 'Waiting_For_Docs',
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
                'value' => 12,
                'name'  => 'Uncleared',
            ],
            [
                'value' => 13,
                'name'  => 'Fraud_Processing',
            ],
            [
                'value' => 100,
                'name'  => 'All',
            ]
        ];
    }
}