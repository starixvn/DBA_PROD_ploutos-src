<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class BonusFactorBasisTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Transaction',
            ],
            [
                'value' => 1,
                'name'  => 'Bonus',
            ],
            [
                'value' => 2,
                'name'  => 'Transaction_and_Bonus',
            ],
        ];
    }
}