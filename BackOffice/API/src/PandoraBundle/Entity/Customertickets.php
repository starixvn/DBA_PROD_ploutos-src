<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Customertickets
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="CustomerFullName")
 * @ORM\Table(name="CustomerTickets")
 * @ORM\Entity
 */
class Customertickets
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
     * @ORM\Column(name="CustomerFullName", type="string", length=100, nullable=true)
     */
    private $CustomerFullName;

    /**
     * @var string
     *
     * @ORM\Column(name="ContactId", type="string", length=100, nullable=true)
     */
    private $ContactId;

    /**
     * @var string
     *
     * @ORM\Column(name="MessageSubject", type="string", length=100, nullable=true)
     */
    private $MessageSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="MessageInfo", type="string", length=500, nullable=true)
     */
    private $MessageInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="MessageReply", type="string", length=500, nullable=true)
     */
    private $MessageReply;

    /**
     * @var string
     *
     * @ORM\Column(name="AnswerByName", type="string", length=100, nullable=true)
     */
    private $AnswerByName;

    /**
     * @var string
     *
     * @ORM\Column(name="AnswerById", type="string", length=100, nullable=true)
     */
    private $AnswerById;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsResolved", type="boolean", nullable=false)
     */
    private $IsResolved = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateReported", type="datetime", nullable=true)
     */
    private $DateReported;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateResolved", type="datetime", nullable=true)
     */
    private $DateResolved;

    /**
     * @var integer
     *
     * @ORM\Column(name="ContactIdType", type="integer", nullable=true)
     */
    private $ContactIdType = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="Severity", type="integer", nullable=true)
     */
    private $Severity = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="SystemClientType", type="integer", nullable=true)
     */
    private $SystemClientType = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ReportByUserName", type="string", length=100, nullable=true)
     */
    private $ReportByUserName;

    /**
     * @var string
     *
     * @ORM\Column(name="ReportByUserId", type="string", length=100, nullable=true)
     */
    private $ReportByUserId;

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
     * Set CustomerFullName
     *
     * @param string $CustomerFullName
     *
     * @return Customertickets
     */
    public function setCustomerFullName($CustomerFullName)
    {
        $this->CustomerFullName = $CustomerFullName;

        return $this;
    }

    /**
     * Get CustomerFullName
     *
     * @return string
     */
    public function getCustomerFullName()
    {
        return $this->CustomerFullName;
    }

    /**
     * Set ContactId
     *
     * @param string $ContactId
     *
     * @return Customertickets
     */
    public function setContactId($ContactId)
    {
        $this->ContactId = $ContactId;

        return $this;
    }

    /**
     * Get ContactId
     *
     * @return string
     */
    public function getContactId()
    {
        return $this->ContactId;
    }

    /**
     * Set MessageSubject
     *
     * @param string $MessageSubject
     *
     * @return Customertickets
     */
    public function setMessageSubject($MessageSubject)
    {
        $this->MessageSubject = $MessageSubject;

        return $this;
    }

    /**
     * Get MessageSubject
     *
     * @return string
     */
    public function getMessageSubject()
    {
        return $this->MessageSubject;
    }

    /**
     * Set MessageInfo
     *
     * @param string $MessageInfo
     *
     * @return Customertickets
     */
    public function setMessageInfo($MessageInfo)
    {
        $this->MessageInfo = $MessageInfo;

        return $this;
    }

    /**
     * Get MessageInfo
     *
     * @return string
     */
    public function getMessageInfo()
    {
        return $this->MessageInfo;
    }

    /**
     * Set MessageReply
     *
     * @param string $MessageReply
     *
     * @return Customertickets
     */
    public function setMessageReply($MessageReply)
    {
        $this->MessageReply = $MessageReply;

        return $this;
    }

    /**
     * Get MessageReply
     *
     * @return string
     */
    public function getMessageReply()
    {
        return $this->MessageReply;
    }

    /**
     * Set AnswerByName
     *
     * @param string $AnswerByName
     *
     * @return Customertickets
     */
    public function setAnswerByName($AnswerByName)
    {
        $this->AnswerByName = $AnswerByName;

        return $this;
    }

    /**
     * Get AnswerByName
     *
     * @return string
     */
    public function getAnswerByName()
    {
        return $this->AnswerByName;
    }

    /**
     * Set AnswerById
     *
     * @param string $AnswerById
     *
     * @return Customertickets
     */
    public function setAnswerById($AnswerById)
    {
        $this->AnswerById = $AnswerById;

        return $this;
    }

    /**
     * Get AnswerById
     *
     * @return string
     */
    public function getAnswerById()
    {
        return $this->AnswerById;
    }

    /**
     * Set IsResolved
     *
     * @param boolean $IsResolved
     *
     * @return Customertickets
     */
    public function setIsResolved($IsResolved)
    {
        $this->IsResolved = $IsResolved;

        return $this;
    }

    /**
     * Get IsResolved
     *
     * @return boolean
     */
    public function getIsResolved()
    {
        return $this->IsResolved;
    }

    /**
     * Set DateReported
     *
     * @param \DateTime $DateReported
     *
     * @return Customertickets
     */
    public function setDateReported($DateReported)
    {
        $this->DateReported = $DateReported;

        return $this;
    }

    /**
     * Get DateReported
     *
     * @return \DateTime
     */
    public function getDateReported()
    {
        return $this->DateReported;
    }

    /**
     * Set DateResolved
     *
     * @param \DateTime $DateResolved
     *
     * @return Customertickets
     */
    public function setDateResolved($DateResolved)
    {
        $this->DateResolved = $DateResolved;

        return $this;
    }

    /**
     * Get DateResolved
     *
     * @return \DateTime
     */
    public function getDateResolved()
    {
        return $this->DateResolved;
    }

    /**
     * Set ContactIdType
     *
     * @param integer $ContactIdType
     *
     * @return Customertickets
     */
    public function setContactIdType($ContactIdType)
    {
        $this->ContactIdType = $ContactIdType;

        return $this;
    }

    /**
     * Get ContactIdType
     *
     * @return integer
     */
    public function getContactIdType()
    {
        return $this->ContactIdType;
    }

    /**
     * Set Severity
     *
     * @param integer $Severity
     *
     * @return Customertickets
     */
    public function setSeverity($Severity)
    {
        $this->Severity = $Severity;

        return $this;
    }

    /**
     * Get Severity
     *
     * @return integer
     */
    public function getSeverity()
    {
        return $this->Severity;
    }

    /**
     * Set SystemClientType
     *
     * @param integer $SystemClientType
     *
     * @return Customertickets
     */
    public function setSystemClientType($SystemClientType)
    {
        $this->SystemClientType = $SystemClientType;

        return $this;
    }

    /**
     * Get SystemClientType
     *
     * @return integer
     */
    public function getSystemClientType()
    {
        return $this->SystemClientType;
    }

    /**
     * Set ReportByUserName
     *
     * @param string $ReportByUserName
     *
     * @return Customertickets
     */
    public function setReportByUserName($ReportByUserName)
    {
        $this->ReportByUserName = $ReportByUserName;

        return $this;
    }

    /**
     * Get ReportByUserName
     *
     * @return string
     */
    public function getReportByUserName()
    {
        return $this->ReportByUserName;
    }

    /**
     * Set ReportByUserId
     *
     * @param string $ReportByUserId
     *
     * @return Customertickets
     */
    public function setReportByUserId($ReportByUserId)
    {
        $this->ReportByUserId = $ReportByUserId;

        return $this;
    }

    /**
     * Get ReportByUserId
     *
     * @return string
     */
    public function getReportByUserId()
    {
        return $this->ReportByUserId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Customertickets
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
     * @return Customertickets
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
     * @return Customertickets
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
     * @return Customertickets
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
     * @return Customertickets
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
     * @return Customertickets
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
