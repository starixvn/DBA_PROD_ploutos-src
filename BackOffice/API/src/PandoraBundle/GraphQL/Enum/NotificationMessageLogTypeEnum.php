<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class NotificationMessageLogTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'SMS',
            ],
            [
                'value' => 1,
                'name'  => 'EMAIL',
            ]
        ];
    }
}