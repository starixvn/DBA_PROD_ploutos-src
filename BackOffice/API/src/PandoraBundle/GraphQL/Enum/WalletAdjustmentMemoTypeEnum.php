<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class WalletAdjustmentMemoTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Credit_Memo',
            ],
            [
                'value' => 1,
                'name'  => 'Debit_Memo',
            ],
            [
                'value' => 2,
                'name'  => 'Fund_Transfer',
            ]
        ];
    }
}