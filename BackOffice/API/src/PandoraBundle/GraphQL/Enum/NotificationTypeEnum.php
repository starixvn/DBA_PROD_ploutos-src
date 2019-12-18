<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class NotificationTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 1,
                'name'  => 'Newsletter',
            ],
            [
                'value' => 2,
                'name'  => 'Phone',
            ],
            [
                'value' => 3,
                'name'  => 'Post',
            ],
            [
                'value' => 4,
                'name'  => 'SMS',
            ],
            [
                'value' => 5,
                'name'  => 'Special_Offers',
            ]
        ];
    }
}