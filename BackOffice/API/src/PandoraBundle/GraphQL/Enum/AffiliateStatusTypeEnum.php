<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class AffiliateStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Pending',
            ],
            [
                'value' => 1,
                'name'  => 'Activated',
            ],
            [
                'value' => 2,
                'name'  => 'Suspended',
            ],
            [
                'value' => 3,
                'name'  => 'Closed',
            ]
        ];
    }
}