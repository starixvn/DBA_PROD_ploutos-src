<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\BooleanType;

class TabularReportJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.Id',
            ],
            'ReportName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ReportName'
            ],
            'ReportConfig' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ReportConfig'
            ],
            'Roles' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Roles'
            ],
            'CreatedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.ModifiedById'
            ],
            'DateCreated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated'
            ],
            'DateModified' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified'
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
            ],
        ];
    }
}