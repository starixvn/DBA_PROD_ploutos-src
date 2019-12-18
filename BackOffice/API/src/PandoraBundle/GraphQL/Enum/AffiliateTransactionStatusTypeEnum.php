<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class AffiliateTransactionStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 1,
                'name'  => 'Pending',
            ],
            [
                'value' => 2,
                'name'  => 'Approved',
            ],
            [
                'value' => 3,
                'name'  => 'Other_Process',
            ],
            [
                'value' => 4,
                'name'  => 'Reject',
            ]
        ];
    }
}