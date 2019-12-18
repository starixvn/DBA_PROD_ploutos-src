<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class QueryFormulaTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 'AVG',
                'name'  => 'AVERAGE',
            ],
            [
                'value' => 'COUNT',
                'name'  => 'COUNT',
            ],
            [
                'value' => 'SUM',
                'name'  => 'TOTAL',
            ]
            // [
            //     'value' => 'PERCENTAGE',
            //     'name'  => 'PERCENTAGE',
            // ],
        ];
    }
}