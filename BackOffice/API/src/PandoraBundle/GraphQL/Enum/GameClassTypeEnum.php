<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class GameClassTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => '0',
                'name'  => 'CA',
            ],
            [
                'value' => '1',
                'name'  => 'RNG',
            ],
            [
                'value' => '2',
                'name'  => 'SB',
            ],
            [
                'value' => '3',
                'name'  => 'POKER',
            ]
        ];
    }
}