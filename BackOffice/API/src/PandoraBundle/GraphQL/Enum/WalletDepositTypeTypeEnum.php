<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class WalletDepositTypeTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Online',
            ],
            [
                'value' => 1,
                'name'  => 'Offline',
            ]
        ];
    }
}