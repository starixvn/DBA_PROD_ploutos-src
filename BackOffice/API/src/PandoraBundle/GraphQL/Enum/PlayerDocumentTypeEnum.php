<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class PlayerDocumentTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Drivers_License',
            ],
            [
                'value' => 1,
                'name'  => 'Passport',
            ],
            [
                'value' => 2,
                'name'  => 'Company_ID',
            ],
            [
                'value' => 3,
                'name'  => 'Profession_ID',
            ],
            [
                'value' => 20,
                'name'  => 'Other',
            ],
        ];
    }
}