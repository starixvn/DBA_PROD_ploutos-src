<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class BonusValueTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Amount',
            ],
            [
                'value' => 1,
                'name'  => 'Percentage',
            ]
        ];
    }
}