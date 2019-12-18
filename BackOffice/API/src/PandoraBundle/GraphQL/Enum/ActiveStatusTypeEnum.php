<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class ActiveStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => true,
                'name'  => 'Active',
            ],
            [
                'value' => false,
                'name'  => 'InActive',
            ]
        ];
    }
}