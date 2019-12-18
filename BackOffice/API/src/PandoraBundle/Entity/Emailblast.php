<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Emailblast
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="EmailAddress")
 * @ORM\Table(name="EmailBlasts")
 * @ORM\Entity
 */
class Emailblast extends AbstractEntity
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
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="EmailAddress", type="text", nullable=true)
     */
    private $EmailAddress;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="EmailTemplateId", type="bigint", nullable=false)
     */
    private $EmailTemplateId = '0';
    
    /**
     *
     * One Emailblast has One Emailtemplate
     *
     * @ORM\ManyToOne(targetEntity="Emailtemplate")
     * @ORM\JoinColumn(name="EmailTemplateId", referencedColumnName="Id")
     */
    private $EmailTemplate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", nullable=true)
     */
    private $Description;

    /**
     * @var string
     *
     * @ORM\Column(name="BatchId", type="string", length=300, nullable=true)
     */
    private $BatchId;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=true)
     */
    private $Status;

    /**
     * @var integer
     *
     * @ORM\Column(name="EmailRecipientCount", type="bigint", nullable=false)
     */
    private $EmailRecipientCount = '0';

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
     * @ORM\Column(name="Counter", type="bigint", nullable=false)
     */
    private $Counter = '0';



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
     * Set EmailAddress
     *
     * @param string $EmailAddress
     *
     * @return Emailblast
     */
    public function setEmailaddress($EmailAddress)
    {
        $this->EmailAddress = $EmailAddress;

        return $this;
    }

    /**
     * Get EmailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->EmailAddress;
    }

    /**
     * Set EmailTemplateId
     *
     * @param integer $EmailTemplateId
     *
     * @return Emailblast
     */
    public function setEmailTemplateId($EmailTemplateId)
    {
        $this->EmailTemplateId = $EmailTemplateId;

        return $this;
    }

    /**
     * Get EmailTemplateId
     *
     * @return integer
     */
    public function getEmailTemplateId()
    {
        return $this->EmailTemplateId;
    }

    /**
     * Set Description
     *
     * @param string $Description
     *
     * @return Emailblast
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set BatchId
     *
     * @param string $BatchId
     *
     * @return Emailblast
     */
    public function setBatchId($BatchId)
    {
        $this->BatchId = $BatchId;

        return $this;
    }

    /**
     * Get BatchId
     *
     * @return string
     */
    public function getBatchId()
    {
        return $this->BatchId;
    }

    /**
     * Set Status
     *
     * @param string $Status
     *
     * @return Emailblast
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Set EmailRecipientCount
     *
     * @param integer $EmailRecipientCount
     *
     * @return Emailblast
     */
    public function setEmailRecipientCount($EmailRecipientCount)
    {
        $this->EmailRecipientCount = $EmailRecipientCount;

        return $this;
    }

    /**
     * Get EmailRecipientCount
     *
     * @return integer
     */
    public function getEmailRecipientCount()
    {
        return $this->EmailRecipientCount;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Emailblast
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
     * @return Emailblast
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
     * @return Emailblast
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
     * @return Emailblast
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
     * @return Emailblast
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
     * Set Counter
     *
     * @param integer $Counter
     *
     * @return Emailblast
     */
    public function setCounter($Counter)
    {
        $this->Counter = $Counter;

        return $this;
    }

    /**
     * Get Counter
     *
     * @return integer
     */
    public function getCounter()
    {
        return $this->Counter;
    }
    
    
    /**
     * Set Emailtemplate
     *
     * @param \PandoraBundle\Entity\Emailtemplate $EmailTemplate
     *
     * @return Emailblast
     */
    public function setEmailTemplate(\PandoraBundle\Entity\Emailtemplate $EmailTemplate = null)
    {
        $this->EmailTemplate = $EmailTemplate;
        
        return $this;
    }
    
    /**
     * Get Emailtemplate
     *
     * @return \PandoraBundle\Entity\Emailtemplate
     */
    public function getEmailTemplate()
    {
        return $this->EmailTemplate;
    }
}
