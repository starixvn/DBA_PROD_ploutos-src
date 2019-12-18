<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class MessagesTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Bonus',
            ],
            [
                'value' => 1,
                'name'  => 'Promotion',
            ],
            [
                'value' => 2,
                'name'  => 'Birthday',
            ],
            [
                'value' => 3,
                'name'  => 'Message',
            ]
        ];
    }
}