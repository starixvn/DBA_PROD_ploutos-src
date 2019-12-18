<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class WalletAdjustmentMemoStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 2,
                'name'  => 'Approved',
            ],
            [
                'value' => 5,
                'name'  => 'Processing',
            ],
            [
                'value' => 100,
                'name'  => 'All',
            ]
        ];
    }
}