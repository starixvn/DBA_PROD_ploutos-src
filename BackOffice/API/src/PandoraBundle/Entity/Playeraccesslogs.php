<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Playeraccesslogs
 *
 * @ORM\Table(name="PlayerAccessLogs", indexes={@ORM\Index(name="idx_PlayerAccessLogs_PlayerRegistrationId", columns={"PlayerRegistrationId"})})
 * @ORM\Entity
 */
class Playeraccesslogs extends AbstractEntity
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
     * @var string
     *
     * @ORM\Column(name="AccessLog", type="string", length=100, nullable=true)
     */
    private $AccessLog;

    /**
     * @var string
     *
     * @ORM\Column(name="IPAddress", type="string", length=60, nullable=true)
     */
    private $IPAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="FingerPrint", type="string", length=200, nullable=true)
     */
    private $FingerPrint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LogDateTime", type="datetime", nullable=true)
     */
    private $LogDateTime;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="AccessLogTypeEnum")
     * @ORM\Column(name="AccessLogType", type="integer", nullable=true)
     */
    private $AccessLogType;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRegistrationId", type="bigint", nullable=false)
     */
    private $PlayerRegistrationId = '0';
    
    /**
     *
     * Many Player Access Logs have One Player Profile
     *
     * @ORM\ManyToOne(targetEntity="Playerprofiles")
     * @ORM\JoinColumn(name="PlayerRegistrationId", referencedColumnName="PlayerRegistrationId")
     */
    private $PlayerProfiles;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingSync", type="boolean", nullable=false)
     */
    private $IsBeingSync = true;

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
     * @var integer
     *
     * @ORM\Column(name="PlayerFingerPrintId", type="bigint", nullable=false)
     */
    private $PlayerFingerPrintId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FingerPrintRollbaseId", type="bigint", nullable=false)
     */
    private $FingerPrintRollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FingerPrintHitRollbaseId", type="bigint", nullable=false)
     */
    private $FingerPrintHitRollbaseId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsAttached", type="boolean", nullable=false)
     */
    private $IsAttached = true;

    /**
     * @var string
     *
     * @ORM\Column(name="UserAgent", type="string", length=1000, nullable=true)
     */
    private $UserAgent;



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
     * Set AccessLog
     *
     * @param string $AccessLog
     *
     * @return Playeraccesslogs
     */
    public function setAccessLog($AccessLog)
    {
        $this->AccessLog = $AccessLog;

        return $this;
    }

    /**
     * Get AccessLog
     *
     * @return string
     */
    public function getAccessLog()
    {
        return $this->AccessLog;
    }

    /**
     * Set IPAddress
     *
     * @param string $IPAddress
     *
     * @return Playeraccesslogs
     */
    public function setIPAddress($IPAddress)
    {
        $this->IPAddress = $IPAddress;

        return $this;
    }

    /**
     * Get IPAddress
     *
     * @return string
     */
    public function getIPAddress()
    {
        return $this->IPAddress;
    }

    /**
     * Set FingerPrint
     *
     * @param string $FingerPrint
     *
     * @return Playeraccesslogs
     */
    public function setFingerPrint($FingerPrint)
    {
        $this->FingerPrint = $FingerPrint;

        return $this;
    }

    /**
     * Get FingerPrint
     *
     * @return string
     */
    public function getFingerPrint()
    {
        return $this->FingerPrint;
    }

    /**
     * Set LogDateTime
     *
     * @param \DateTime $LogDateTime
     *
     * @return Playeraccesslogs
     */
    public function setLogDateTime($LogDateTime)
    {
        $this->logdatetime = $LogDateTime;

        return $this;
    }

    /**
     * Get LogDateTime
     *
     * @return \DateTime
     */
    public function getLogDateTime()
    {
        return $this->LogDateTime;
    }

    /**
     * Set AccessLogType
     *
     * @param integer $AccessLogType
     *
     * @return Playeraccesslogs
     */
    public function setAccessLogType($AccessLogType)
    {
        $this->AccessLogType = $AccessLogType;

        return $this;
    }

    /**
     * Get AccessLogType
     *
     * @return integer
     */
    public function getAccessLogType()
    {
        return $this->AccessLogType;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Playeraccesslogs
     */
    public function setRollbaseId($RollbaseId)
    {
        $this->RollbaseId = $RollbaseId;

        return $this;
    }

    /**
     * Get RollbaseId
     *
     * @return integer
     */
    public function getRollbaseId()
    {
        return $this->RollbaseId;
    }

    /**
     * Set PlayerRegistrationId
     *
     * @param integer $PlayerRegistrationId
     *
     * @return Playeraccesslogs
     */
    public function setPlayerRegistrationId($PlayerRegistrationId)
    {
        $this->PlayerRegistrationId = $PlayerRegistrationId;

        return $this;
    }

    /**
     * Get PlayerRegistrationId
     *
     * @return integer
     */
    public function getPlayerRegistrationId()
    {
        return $this->PlayerRegistrationId;
    }

    /**
     * Set IsBeingSync
     *
     * @param boolean $IsBeingSync
     *
     * @return Playeraccesslogs
     */
    public function setIsBeingSync($IsBeingSync)
    {
        $this->IsBeingSync = $IsBeingSync;

        return $this;
    }

    /**
     * Get IsBeingSync
     *
     * @return boolean
     */
    public function getIsBeingSync()
    {
        return $this->IsBeingSync;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playeraccesslogs
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
     * @return Playeraccesslogs
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
     * @return Playeraccesslogs
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
     * @return Playeraccesslogs
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
     * @return Playeraccesslogs
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

    /**
     * Set PlayerFingerPrintId
     *
     * @param integer $PlayerFingerPrintId
     *
     * @return Playeraccesslogs
     */
    public function setPlayerFingerPrintId($PlayerFingerPrintId)
    {
        $this->PlayerFingerPrintId = $PlayerFingerPrintId;

        return $this;
    }

    /**
     * Get PlayerFingerPrintId
     *
     * @return integer
     */
    public function getPlayerFingerPrintId()
    {
        return $this->PlayerFingerPrintId;
    }

    /**
     * Set FingerPrintRollbaseId
     *
     * @param integer $FingerPrintRollbaseId
     *
     * @return Playeraccesslogs
     */
    public function setFingerPrintRollbaseId($FingerPrintRollbaseId)
    {
        $this->FingerPrintRollbaseId = $FingerPrintRollbaseId;

        return $this;
    }

    /**
     * Get FingerPrintRollbaseId
     *
     * @return integer
     */
    public function getFingerPrintRollbaseId()
    {
        return $this->FingerPrintRollbaseId;
    }

    /**
     * Set FingerPrintHitRollbaseId
     *
     * @param integer $FingerPrintHitRollbaseId
     *
     * @return Playeraccesslogs
     */
    public function setFingerPrintHitRollbaseId($FingerPrintHitRollbaseId)
    {
        $this->FingerPrintHitRollbaseId = $FingerPrintHitRollbaseId;

        return $this;
    }

    /**
     * Get FingerPrintHitRollbaseId
     *
     * @return integer
     */
    public function getFingerPrintHitRollbaseId()
    {
        return $this->FingerPrintHitRollbaseId;
    }

    /**
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return Playeraccesslogs
     */
    public function setNeedToSync($NeedToSync)
    {
        $this->NeedToSync = $NeedToSync;

        return $this;
    }

    /**
     * Get NeedToSync
     *
     * @return boolean
     */
    public function getNeedToSync()
    {
        return $this->NeedToSync;
    }

    /**
     * Set IsAttached
     *
     * @param boolean $IsAttached
     *
     * @return Playeraccesslogs
     */
    public function setIsAttached($IsAttached)
    {
        $this->IsAttached = $IsAttached;

        return $this;
    }

    /**
     * Get IsAttached
     *
     * @return boolean
     */
    public function getIsAttached()
    {
        return $this->IsAttached;
    }

    /**
     * Set UserAgent
     *
     * @param string $UserAgent
     *
     * @return Playeraccesslogs
     */
    public function setUserAgent($UserAgent)
    {
        $this->UserAgent = $UserAgent;

        return $this;
    }

    /**
     * Get UserAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->UserAgent;
    }
    
    /**
     * Set PlayerProfiles
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Wallets
     */
    public function setPlayerProfiles(\PandoraBundle\Entity\PlayerProfiles $PlayerProfiles = null)
    {
        $this->PlayerProfiles = $PlayerProfiles;
        
        return $this;
    }
    
    /**
     * Get PlayerProfiles
     *
     * @return \PandoraBundle\Entity\PlayerProfiles
     */
    public function getPlayerProfiles()
    {
        return $this->PlayerProfiles;
    }
}
