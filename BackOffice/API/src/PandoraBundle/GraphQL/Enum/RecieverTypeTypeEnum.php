<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class RecieverTypeTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Player',
            ],
            [
                'value' => 1,
                'name'  => 'Affiliate',
            ]
        ];
    }
}