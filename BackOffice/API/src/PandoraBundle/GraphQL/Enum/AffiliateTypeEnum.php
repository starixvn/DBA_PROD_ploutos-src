<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class AffiliateTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 'ADS',
                'name'  => 'Advertisement',
            ],
            [
                'value' => 'AFS',
                'name'  => 'Affiliate',
            ],
            [
                'value' => 'CMP',
                'name'  => 'Campaign',
            ]
        ];
    }
}