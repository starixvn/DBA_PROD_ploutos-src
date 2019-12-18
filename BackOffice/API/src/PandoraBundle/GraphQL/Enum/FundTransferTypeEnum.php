<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class FundTransferTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Transfer_In',
            ],
            [
                'value' => 1,
                'name'  => 'Transfer_Out',
            ]
        ];
    }
}