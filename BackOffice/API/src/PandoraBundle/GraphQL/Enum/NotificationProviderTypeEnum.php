<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class NotificationProviderTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Nexmo',
            ],
            [
                'value' => 1,
                'name'  => 'SendInBlue',
            ]
        ];
    }
}