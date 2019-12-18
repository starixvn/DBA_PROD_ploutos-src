<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class BonusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'First_Depost_Bonus',
            ],
            [
                'value' => 1,
                'name'  => 'Reload_Bonus',
            ],
            [
                'value' => 2,
                'name'  => 'Test_Bonus',
            ],
            [
                'value' => 3,
                'name'  => 'SignUp_Bonus',
            ],
            [
                'value' => 4,
                'name'  => 'Deposit_Bonus',
            ],
            [
                'value' => 5,
                'name'  => 'After_Wagering_Bonus',
            ]
        ];
    }
}