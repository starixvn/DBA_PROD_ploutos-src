<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Transactiongrabs
 *
 * @ORM\Table(name="TransactionGrabs")
 * @UniqueEntity(fields={"TransactionType", "SourceObjectId"}, message="Record has been grabbed already.", repositoryMethod="findUniqueViolation")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\TransactionGrabRepository")
 */
class Transactiongrabs
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
     * @ORM\Column(name="SourceObjectId", type="bigint", nullable=false)
     */
    private $SourceObjectId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="SourceObjectName", type="string", length=50, nullable=true)
     */
    private $SourceObjectName;

    /**
     * @var integer
     *
     * @ORM\Column(name="TransactionType", type="integer", nullable=false)
     */
    private $TransactionType = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="string", length=2000, nullable=true)
     */
    private $Note;

    /**
     * @var string
     *
     * @ORM\Column(name="Assignee", type="string", length=200, nullable=true)
     */
    private $Assignee;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsGrabbed", type="boolean", nullable=false)
     */
    private $IsGrabbed = false;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $UserId;

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
     * Set SourceObjectId
     *
     * @param integer $SourceObjectId
     *
     * @return Transactiongrabs
     */
    public function setSourceObjectId($SourceObjectId)
    {
        $this->SourceObjectId = $SourceObjectId;

        return $this;
    }

    /**
     * Get SourceObjectId
     *
     * @return integer
     */
    public function getSourceObjectId()
    {
        return $this->SourceObjectId;
    }

    /**
     * Set SourceObjectName
     *
     * @param string $SourceObjectName
     *
     * @return Transactiongrabs
     */
    public function setSourceObjectName($SourceObjectName)
    {
        $this->SourceObjectName = $SourceObjectName;

        return $this;
    }

    /**
     * Get SourceObjectName
     *
     * @return string
     */
    public function getSourceObjectName()
    {
        return $this->SourceObjectName;
    }

    /**
     * Set TransactionType
     *
     * @param integer $TransactionType
     *
     * @return Transactiongrabs
     */
    public function setTransactionType($TransactionType)
    {
        $this->TransactionType = $TransactionType;

        return $this;
    }

    /**
     * Get TransactionType
     *
     * @return integer
     */
    public function getTransactionType()
    {
        return $this->TransactionType;
    }

    /**
     * Set Note
     *
     * @param string $Note
     *
     * @return Transactiongrabs
     */
    public function setNote($Note)
    {
        $this->Note = $Note;

        return $this;
    }

    /**
     * Get Note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->Note;
    }

    /**
     * Set Assignee
     *
     * @param string $Assignee
     *
     * @return Transactiongrabs
     */
    public function setAssignee($Assignee)
    {
        $this->Assignee = $Assignee;

        return $this;
    }

    /**
     * Get Assignee
     *
     * @return string
     */
    public function getAssignee()
    {
        return $this->Assignee;
    }

    /**
     * Set IsGrabbed
     *
     * @param boolean $IsGrabbed
     *
     * @return Transactiongrabs
     */
    public function setIsGrabbed($IsGrabbed)
    {
        $this->IsGrabbed = $IsGrabbed;

        return $this;
    }

    /**
     * Get IsGrabbed
     *
     * @return boolean
     */
    public function getIsGrabbed()
    {
        return $this->IsGrabbed;
    }

    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Transactiongrabs
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Transactiongrabs
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
     * @return Transactiongrabs
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
     * @return Transactiongrabs
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
     * @return Transactiongrabs
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
     * @return Transactiongrabs
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
     * @return Transactiongrabs
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        
        return $this;
    }
}
