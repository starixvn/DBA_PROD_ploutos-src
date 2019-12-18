<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Backgroundtaskschedules
 *
 * @ORM\Table(name="BackgroundTaskSchedules")
 * @ORM\Entity
 */
class Backgroundtaskschedules
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="BackgroundTaskType", type="integer", nullable=true)
     */
    private $BackgroundTaskType;

    /**
     * @var string
     *
     * @ORM\Column(name="BackgroundTaskTypeName", type="string", length=50, nullable=true)
     */
    private $BackgroundTaskTypeName;

    /**
     * @var string
     *
     * @ORM\Column(name="CronSchedule", type="string", length=50, nullable=true)
     */
    private $CronSchedule;

    /**
     * @var string
     *
     * @ORM\Column(name="NotifyEmailAddress", type="string", length=1000, nullable=true)
     */
    private $NotifyEmailAddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="RepeatType", type="integer", nullable=true)
     */
    private $RepeatType;

    /**
     * @var integer
     *
     * @ORM\Column(name="DayOfMonth", type="integer", nullable=true)
     */
    private $DayOfMonth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeOfDay", type="datetime", nullable=true)
     */
    private $TimeOfDay;

    /**
     * @var integer
     *
     * @ORM\Column(name="Hour", type="integer", nullable=true)
     */
    private $Hour;

    /**
     * @var integer
     *
     * @ORM\Column(name="Minute", type="integer", nullable=true)
     */
    private $Minute;

    /**
     * @var integer
     *
     * @ORM\Column(name="Second", type="integer", nullable=true)
     */
    private $Second;

    /**
     * @var string
     *
     * @ORM\Column(name="DailyRepeatition", type="string", length=100, nullable=true)
     */
    private $DailyRepeatition;

    /**
     * @var integer
     *
     * @ORM\Column(name="RepeatHour", type="integer", nullable=true)
     */
    private $RepeatHour;

    /**
     * @var integer
     *
     * @ORM\Column(name="RepeatMinute", type="integer", nullable=true)
     */
    private $RepeatMinute;

    /**
     * @var string
     *
     * @ORM\Column(name="ProcessName", type="string", length=100, nullable=true)
     */
    private $ProcessName;

    /**
     * @var string
     *
     * @ORM\Column(name="ProcessDesc", type="string", length=100, nullable=true)
     */
    private $ProcessDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="TaskName", type="string", length=100, nullable=true)
     */
    private $TaskName;

    /**
     * @var string
     *
     * @ORM\Column(name="TaskDesc", type="string", length=100, nullable=true)
     */
    private $TaskDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="TriggerName", type="string", length=100, nullable=true)
     */
    private $TriggerName;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $CreatedById = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=50, nullable=true)
     */
    private $ModifiedById = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime", nullable=true)
     */
    private $DateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $DateModified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=false)
     */
    private $ActiveRecord = true;



    /**
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set BackgroundTaskType
     *
     * @param integer $BackgroundTaskType
     *
     * @return Backgroundtaskschedules
     */
    public function setBackgroundTaskType($BackgroundTaskType)
    {
        $this->BackgroundTaskType = $BackgroundTaskType;

        return $this;
    }

    /**
     * Get BackgroundTaskType
     *
     * @return integer
     */
    public function getBackgroundTaskType()
    {
        return $this->BackgroundTaskType;
    }

    /**
     * Set BackgroundTaskTypeName
     *
     * @param string $BackgroundTaskTypeName
     *
     * @return Backgroundtaskschedules
     */
    public function setBackgroundTaskTypeName($BackgroundTaskTypeName)
    {
        $this->BackgroundTaskTypeName = $BackgroundTaskTypeName;

        return $this;
    }

    /**
     * Get BackgroundTaskTypeName
     *
     * @return string
     */
    public function getBackgroundTaskTypeName()
    {
        return $this->BackgroundTaskTypeName;
    }

    /**
     * Set CronSchedule
     *
     * @param string $CronSchedule
     *
     * @return Backgroundtaskschedules
     */
    public function setCronSchedule($CronSchedule)
    {
        $this->CronSchedule = $CronSchedule;

        return $this;
    }

    /**
     * Get CronSchedule
     *
     * @return string
     */
    public function getCronSchedule()
    {
        return $this->CronSchedule;
    }

    /**
     * Set NotifyEmailAddress
     *
     * @param string $NotifyEmailAddress
     *
     * @return Backgroundtaskschedules
     */
    public function setNotifyEmailAddress($NotifyEmailAddress)
    {
        $this->NotifyEmailAddress = $NotifyEmailAddress;

        return $this;
    }

    /**
     * Get NotifyEmailAddress
     *
     * @return string
     */
    public function getNotifyEmailAddress()
    {
        return $this->NotifyEmailAddress;
    }

    /**
     * Set RepeatType
     *
     * @param integer $RepeatType
     *
     * @return Backgroundtaskschedules
     */
    public function setRepeatType($RepeatType)
    {
        $this->RepeatType = $RepeatType;

        return $this;
    }

    /**
     * Get RepeatType
     *
     * @return integer
     */
    public function getRepeatType()
    {
        return $this->RepeatType;
    }

    /**
     * Set DayOfMonth
     *
     * @param integer $DayOfMonth
     *
     * @return Backgroundtaskschedules
     */
    public function setDayOfMonth($DayOfMonth)
    {
        $this->DayOfMonth = $DayOfMonth;

        return $this;
    }

    /**
     * Get DayOfMonth
     *
     * @return integer
     */
    public function getDayOfMonth()
    {
        return $this->DayOfMonth;
    }

    /**
     * Set TimeOfDay
     *
     * @param \DateTime $TimeOfDay
     *
     * @return Backgroundtaskschedules
     */
    public function setTimeOfDay($TimeOfDay)
    {
        $this->TimeOfDay = $TimeOfDay;

        return $this;
    }

    /**
     * Get TimeOfDay
     *
     * @return \DateTime
     */
    public function getTimeOfDay()
    {
        return $this->TimeOfDay;
    }

    /**
     * Set Hour
     *
     * @param integer $Hour
     *
     * @return Backgroundtaskschedules
     */
    public function setHour($Hour)
    {
        $this->Hour = $Hour;

        return $this;
    }

    /**
     * Get Hour
     *
     * @return integer
     */
    public function getHour()
    {
        return $this->Hour;
    }

    /**
     * Set Minute
     *
     * @param integer $Minute
     *
     * @return Backgroundtaskschedules
     */
    public function setMinute($Minute)
    {
        $this->Minute = $Minute;

        return $this;
    }

    /**
     * Get Minute
     *
     * @return integer
     */
    public function getMinute()
    {
        return $this->Minute;
    }

    /**
     * Set Second
     *
     * @param integer $Second
     *
     * @return Backgroundtaskschedules
     */
    public function setSecond($Second)
    {
        $this->Second = $Second;

        return $this;
    }

    /**
     * Get Second
     *
     * @return integer
     */
    public function getSecond()
    {
        return $this->Second;
    }

    /**
     * Set DailyRepeatition
     *
     * @param string $DailyRepeatition
     *
     * @return Backgroundtaskschedules
     */
    public function setDailyRepeatition($DailyRepeatition)
    {
        $this->DailyRepeatition = $DailyRepeatition;

        return $this;
    }

    /**
     * Get DailyRepeatition
     *
     * @return string
     */
    public function getDailyRepeatition()
    {
        return $this->DailyRepeatition;
    }

    /**
     * Set RepeatHour
     *
     * @param integer $RepeatHour
     *
     * @return Backgroundtaskschedules
     */
    public function setRepeatHour($RepeatHour)
    {
        $this->RepeatHour = $RepeatHour;

        return $this;
    }

    /**
     * Get RepeatHour
     *
     * @return integer
     */
    public function getRepeatHour()
    {
        return $this->RepeatHour;
    }

    /**
     * Set RepeatMinute
     *
     * @param integer $RepeatMinute
     *
     * @return Backgroundtaskschedules
     */
    public function setRepeatMinute($RepeatMinute)
    {
        $this->RepeatMinute = $RepeatMinute;

        return $this;
    }

    /**
     * Get RepeatMinute
     *
     * @return integer
     */
    public function getRepeatMinute()
    {
        return $this->RepeatMinute;
    }

    /**
     * Set ProcessName
     *
     * @param string $ProcessName
     *
     * @return Backgroundtaskschedules
     */
    public function setProcessName($ProcessName)
    {
        $this->ProcessName = $ProcessName;

        return $this;
    }

    /**
     * Get ProcessName
     *
     * @return string
     */
    public function getProcessName()
    {
        return $this->ProcessName;
    }

    /**
     * Set ProcessDesc
     *
     * @param string $ProcessDesc
     *
     * @return Backgroundtaskschedules
     */
    public function setProcessDesc($ProcessDesc)
    {
        $this->ProcessDesc = $ProcessDesc;

        return $this;
    }

    /**
     * Get ProcessDesc
     *
     * @return string
     */
    public function getProcessDesc()
    {
        return $this->ProcessDesc;
    }

    /**
     * Set TaskName
     *
     * @param string $TaskName
     *
     * @return Backgroundtaskschedules
     */
    public function setTaskName($TaskName)
    {
        $this->TaskName = $TaskName;

        return $this;
    }

    /**
     * Get TaskName
     *
     * @return string
     */
    public function getTaskName()
    {
        return $this->TaskName;
    }

    /**
     * Set TaskDesc
     *
     * @param string $TaskDesc
     *
     * @return Backgroundtaskschedules
     */
    public function setTaskDesc($TaskDesc)
    {
        $this->TaskDesc = $TaskDesc;

        return $this;
    }

    /**
     * Get TaskDesc
     *
     * @return string
     */
    public function getTaskDesc()
    {
        return $this->TaskDesc;
    }

    /**
     * Set TriggerName
     *
     * @param string $TriggerName
     *
     * @return Backgroundtaskschedules
     */
    public function setTriggerName($TriggerName)
    {
        $this->TriggerName = $TriggerName;

        return $this;
    }

    /**
     * Get TriggerName
     *
     * @return string
     */
    public function getTriggerName()
    {
        return $this->TriggerName;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Backgroundtaskschedules
     */
    public function setCreatedById($CreatedById)
    {
        $this->CreatedById = $CreatedById;

        return $this;
    }

    /**
     * Get CreatedById
     *
     * @return string
     */
    public function getCreatedById()
    {
        return $this->CreatedById;
    }

    /**
     * Set ModifiedById
     *
     * @param string $ModifiedById
     *
     * @return Backgroundtaskschedules
     */
    public function setModifiedById($ModifiedById)
    {
        $this->ModifiedById = $ModifiedById;

        return $this;
    }

    /**
     * Get ModifiedById
     *
     * @return string
     */
    public function getModifiedById()
    {
        return $this->ModifiedById;
    }

    /**
     * Set DateCreated
     *
     * @param \DateTime $DateCreated
     *
     * @return Backgroundtaskschedules
     */
    public function setDateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;

        return $this;
    }

    /**
     * Get DateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->DateCreated;
    }

    /**
     * Set DateModified
     *
     * @param \DateTime $DateModified
     *
     * @return Backgroundtaskschedules
     */
    public function setDateModified($DateModified)
    {
        $this->DateModified = $DateModified;

        return $this;
    }

    /**
     * Get DateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->DateModified;
    }

    /**
     * Set ActiveRecord
     *
     * @param boolean $ActiveRecord
     *
     * @return Backgroundtaskschedules
     */
    public function setActiveRecord($ActiveRecord)
    {
        $this->ActiveRecord = $ActiveRecord;

        return $this;
    }

    /**
     * Get ActiveRecord
     *
     * @return boolean
     */
    public function getActiveRecord()
    {
        return $this->ActiveRecord;
    }
}
