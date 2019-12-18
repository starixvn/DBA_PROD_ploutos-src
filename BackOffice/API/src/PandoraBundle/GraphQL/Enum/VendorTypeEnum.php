<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class VendorTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'System',
            ],
            [
                'value' => 1,
                'name'  => 'OneWorks',
            ],
            [
                'value' => 2,
                'name'  => 'AsianGaming',
            ],
            [
                'value' => 3,
                'name'  => 'Goldeluxe',
            ],
            [
                'value' => 4,
                'name'  => 'BetSoft',
            ],
            [
                'value' => 5,
                'name'  => 'BoomingGames',
            ],
            [
                'value' => 6,
                'name'  => 'TTG',
            ],
            [
                'value' => 7,
                'name'  => 'SubBet',
            ],
            [
                'value' => 8,
                'name'  => 'PlayTech',
            ],
            [
                'value' => 9,
                'name'  => 'TGP',
            ],
            [
                'value' => 10,
                'name'  => 'HoGaming',
            ],
            [
                'value' => 11,
                'name'  => 'SBTech',
            ]
        ];
    }
}