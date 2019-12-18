<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Notificationmessagelogs
 *
 * @ORM\Table(name="NotificationMessageLogs")
 * @ORM\Entity
 */
class Notificationmessagelogs extends AbstractEntity
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
     * @ORM\Column(name="ProviderMessageId", type="string", length=300, nullable=true)
     */
    private $ProviderMessageId;

    /**
     * @var string
     *
     * @ORM\Column(name="ReceiverInfo", type="string", length=200, nullable=true)
     */
    private $ReceiverInfo;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="RecieverTypeTypeEnum")
     * @ORM\Column(name="ReceiverType", type="integer", nullable=true)
     */
    private $ReceiverType;

    /**
     * @var string
     *
     * @ORM\Column(name="StatusCode", type="string", length=100, nullable=true)
     */
    private $StatusCode;

    /**
     * @var string
     *
     * @ORM\Column(name="StatusDesc", type="string", length=250, nullable=true)
     */
    private $StatusDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="MessageSent", type="string", length=500, nullable=true)
     */
    private $MessageSent;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="NotificationProviderTypeEnum")
     * @ORM\Column(name="NotificationProvider", type="integer", nullable=true)
     */
    private $NotificationProvider;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="NotificationMessageLogTypeEnum")
     * @ORM\Column(name="NotifyType", type="integer", nullable=true)
     */
    private $NotifyType;

    /**
     * @var integer
     *
     * @ORM\Column(name="ReceiverRollbaseId", type="bigint", nullable=false)
     */
    private $ReceiverRollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

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
     * Set Id
     *
     * @param integer $Id
     *
     * @return integer
     */
    public function setId($Id)
    {
        return $this->Id = $Id;
    }

    /**
     * Set ProviderMessageId
     *
     * @param string $ProviderMessageId
     *
     * @return Notificationmessagelogs
     */
    public function setProviderMessageId($ProviderMessageId)
    {
        $this->ProviderMessageId = $ProviderMessageId;

        return $this;
    }

    /**
     * Get ProviderMessageId
     *
     * @return string
     */
    public function getProviderMessageId()
    {
        return $this->ProviderMessageId;
    }

    /**
     * Set ReceiverInfo
     *
     * @param string $ReceiverInfo
     *
     * @return Notificationmessagelogs
     */
    public function setReceiverInfo($ReceiverInfo)
    {
        $this->ReceiverInfo = $ReceiverInfo;

        return $this;
    }

    /**
     * Get ReceiverInfo
     *
     * @return string
     */
    public function getReceiverInfo()
    {
        return $this->ReceiverInfo;
    }

    /**
     * Set ReceiverType
     *
     * @param integer $ReceiverType
     *
     * @return Notificationmessagelogs
     */
    public function setReceiverType($ReceiverType)
    {
        $this->ReceiverType = $ReceiverType;

        return $this;
    }

    /**
     * Get ReceiverType
     *
     * @return integer
     */
    public function getReceiverType()
    {
        return $this->ReceiverType;
    }

    /**
     * Set StatusCode
     *
     * @param string $StatusCode
     *
     * @return Notificationmessagelogs
     */
    public function setStatusCode($StatusCode)
    {
        $this->StatusCode = $StatusCode;

        return $this;
    }

    /**
     * Get StatusCode
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->StatusCode;
    }

    /**
     * Set StatusDesc
     *
     * @param string $StatusDesc
     *
     * @return Notificationmessagelogs
     */
    public function setStatusDesc($StatusDesc)
    {
        $this->StatusDesc = $StatusDesc;

        return $this;
    }

    /**
     * Get StatusDesc
     *
     * @return string
     */
    public function getStatusDesc()
    {
        return $this->StatusDesc;
    }

    /**
     * Set MessageSent
     *
     * @param string $MessageSent
     *
     * @return Notificationmessagelogs
     */
    public function setMessageSent($MessageSent)
    {
        $this->MessageSent = $MessageSent;

        return $this;
    }

    /**
     * Get MessageSent
     *
     * @return string
     */
    public function getMessageSent()
    {
        return $this->MessageSent;
    }

    /**
     * Set NotificationProvider
     *
     * @param integer $NotificationProvider
     *
     * @return Notificationmessagelogs
     */
    public function setNotificationProvider($NotificationProvider)
    {
        $this->NotificationProvider = $NotificationProvider;

        return $this;
    }

    /**
     * Get NotificationProvider
     *
     * @return integer
     */
    public function getNotificationProvider()
    {
        return $this->NotificationProvider;
    }

    /**
     * Set NotifyType
     *
     * @param integer $NotifyType
     *
     * @return Notificationmessagelogs
     */
    public function setNotifyType($NotifyType)
    {
        $this->NotifyType = $NotifyType;

        return $this;
    }

    /**
     * Get NotifyType
     *
     * @return integer
     */
    public function getNotifyType()
    {
        return $this->NotifyType;
    }

    /**
     * Set ReceiverRollbaseId
     *
     * @param integer $ReceiverRollbaseId
     *
     * @return Notificationmessagelogs
     */
    public function setReceiverRollbaseId($ReceiverRollbaseId)
    {
        $this->ReceiverRollbaseId = $ReceiverRollbaseId;

        return $this;
    }

    /**
     * Get ReceiverRollbaseId
     *
     * @return integer
     */
    public function getReceiverRollbaseId()
    {
        return $this->ReceiverRollbaseId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Notificationmessagelogs
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Notificationmessagelogs
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
     * @return Notificationmessagelogs
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
     * @return Notificationmessagelogs
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
     * @return Notificationmessagelogs
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
     * @return Notificationmessagelogs
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
