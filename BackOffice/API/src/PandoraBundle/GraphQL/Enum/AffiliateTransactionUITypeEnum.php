<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class AffiliateTransactionUITypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
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