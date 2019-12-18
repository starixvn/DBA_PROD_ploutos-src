<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class AffiliateTransactionTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 1,
                'name'  => 'Commission',
            ],
            [
                'value' => 2,
                'name'  => 'Fund_Transfer',
            ],
            [
                'value' => 3,
                'name'  => 'Withdrawal',
            ],
            [
                'value' => 4,
                'name'  => 'Credit_Memo',
            ],
            [
                'value' => 5,
                'name'  => 'Debit_Memo',
            ]
        ];
    }
}