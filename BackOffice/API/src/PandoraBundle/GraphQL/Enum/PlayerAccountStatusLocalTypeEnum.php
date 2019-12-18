<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class PlayerAccountStatusLocalTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 'P',
                'name'  => 'Pending',
            ],
            [
                'value' => 'VP',
                'name'  => 'Verified_by_Player',
            ],
            [
                'value' => 'VBCS',
                'name'  => 'Verified_by_CS',
            ],
            [
                'value' => 'C',
                'name'  => 'Created',
            ],
            [
                'value' => 'L',
                'name'  => 'Locked'
            ],
            [
                'value' => 'U',
                'name'  => 'UnLocked',
            ],
            [
                'value' => 'F',
                'name'  => 'Failed_Login',
            ],
            [
                'value' => 'D',
                'name'  => 'De_Activated',
            ],
            [
                'value' => 'R',
                'name'  => 'Re_Activated',
            ],
            [
                'value' => 'PR',
                'name'  => 'Code_Reset',
            ],
            [
                'value' => 'EN',
                'name'  => 'Enabled',
            ],
            [
                'value' => 'AD',
                'name'  => 'Archived',
            ],
            [
                'value' => 'X',
                'name'  => 'Activated',
            ]
        ];
    }
}