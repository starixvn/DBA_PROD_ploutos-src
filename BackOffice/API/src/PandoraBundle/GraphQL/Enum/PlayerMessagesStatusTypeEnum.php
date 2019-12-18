<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class PlayerMessagesStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Created',
            ],
            [
                'value' => 1,
                'name'  => 'Sent',
            ],
            [
                'value' => 2,
                'name'  => 'Seen',
            ],
            [
                'value' => 3,
                'name'  => 'Archived',
            ]
        ];
    }
}