<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class TicketStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Open',
            ],
            [
                'value' => 1,
                'name'  => 'Acknowledged',
            ],
            [
                'value' => 2,
                'name'  => 'Closed',
            ]
        ];
    }
}