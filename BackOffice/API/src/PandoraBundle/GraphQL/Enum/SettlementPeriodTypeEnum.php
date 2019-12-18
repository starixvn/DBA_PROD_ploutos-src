<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class SettlementPeriodTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 'MNT',
                'name'  => 'Monthly',
            ],
            [
                'value' => 'SEM',
                'name'  => 'Semi_Monthly',
            ],
            [
                'value' => 'WKL',
                'name'  => 'Weekly',
            ]
        ];
    }
}