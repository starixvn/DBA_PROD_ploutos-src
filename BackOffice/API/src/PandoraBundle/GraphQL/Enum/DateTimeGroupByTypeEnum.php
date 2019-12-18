<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class DateTimeGroupByTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'name'  => 'DAY',
                'value' => 'DAY',
            ],
            [
                'name'  => 'MONTH_DAY',
                'value' => 'MONTH_DAY',
            ],
            [
                'name'  => 'WEEK',
                'value' => 'WEEK',
            ],
            [
                'name'  => 'WEEK_DAY',
                'value' => 'WEEKDAY',
            ],
            [
                'name'  => 'MONTH',
                'value' => 'MONTH',
            ],
            [
                'name'  => 'YEAR_MONTH',
                'value' => 'YEAR_MONTH',
            ],
            [
                'name'  => 'QUARTER',
                'value' => 'QUARTER',
            ],
            [
                'name'  => 'YEAR',
                'value' => 'YEAR',
            ]
            // [
            //     'value' => 'YEAR_QUARTER',
            //     'name'  => 'YEAR_QUARTER',
            // ],
        ];
    }
}