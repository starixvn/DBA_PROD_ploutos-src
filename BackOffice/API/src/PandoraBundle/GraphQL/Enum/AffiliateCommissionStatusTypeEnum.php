<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class AffiliateCommissionStatusTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Pending', // can also be used to tag grabbed AS ungrabbed
            ],
            [
                'value' => 1,
                'name'  => 'Approved',
            ],
            [
                'value' => 2,
                'name'  => 'ForApproval',
            ],
            [
                'value' => 3,
                'name'  => 'Disapproved',
            ]
        ];
    }
}