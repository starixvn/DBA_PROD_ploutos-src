<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BackgroundTaskScheduleJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'BackgroundTaskType' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.BackgroundTaskType'
            ],
            'BackgroundTaskTypeName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.BackgroundTaskTypeName'
            ],
            'CronSchedule' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CronSchedule'
            ],
            'NotifyEmailAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.NotifyEmailAddress'
            ],
            'RepeatType' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.RepeatType'
            ],
            'DayOfMonth' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.DayOfMonth'
            ],
            'TimeOfDay' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.TimeOfDay'
            ],
            'Hour' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.Hour'
            ],
            'Minute' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.Minute'
            ],
            'Second' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.Second'
            ],
            'DailyRepeatition' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.DailyRepeatition'
            ],
            'RepeatHour' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.RepeatHour'
            ],
            'RepeatMinute' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.RepeatMinute'
            ],
            'ProcessName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ProcessName'
            ],
            'ProcessDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ProcessDesc'
            ],
            'TaskName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TaskName'
            ],
            'TaskDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TaskDesc'
            ],
            'TriggerName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.TriggerName'
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
            ]
        ];
    }
}