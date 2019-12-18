<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class AccessLogTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Register',
            ],
            [
                'value' => 1,
                'name'  => 'Login',
            ],
            [
                'value' => 2,
                'name'  => 'Logout',
            ],
            [
                'value' => 3,
                'name'  => 'Invalid_Login_Attempt',
            ],
            [
                'value' => 4,
                'name'  => 'Change_Password',
            ]
        ];
    }
}