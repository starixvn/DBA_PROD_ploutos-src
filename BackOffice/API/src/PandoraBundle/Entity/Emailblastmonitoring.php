<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Emailblastmonitoring
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="Id")
 * @ORM\Table(name="EmailBlastMonitorings")
 * @ORM\Entity
 */
class Emailblastmonitoring extends AbstractEntity
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
     * @ORM\Column(name="EmailAddress", type="string", length=100, nullable=true)
     */
    private $EmailAddress;

    /**
     * @var string
     * @ORM\Column(name="EmailBlastId", type="bigint", nullable=false)
     */
    private $EmailBlastId;
    
    /**
     *
     * One Emailblastmonitoring has One EmailBlast
     *
     * @ORM\ManyToOne(targetEntity="Emailblast")
     * @ORM\JoinColumn(name="EmailBlastId", referencedColumnName="Id")
     */
    private $EmailBlast;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=true)
     */
    private $Status;

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
     * Set EmailAddress
     *
     * @param string $EmailAddress
     *
     * @return Emailblastmonitoring
     */
    public function setEmailAddress($EmailAddress)
    {
        $this->EmailAddress = $EmailAddress;

        return $this;
    }

    /**
     * Get EmailAddress
     *
     * @return string
     */
    public function getEmailaddress()
    {
        return $this->EmailAddress;
    }

    /**
     * Set EmailBlastId
     *
     * @param string $EmailBlastId
     *
     * @return Emailblastmonitoring
     */
    public function setEmailBlastId($EmailBlastId)
    {
        $this->EmailBlastId = $EmailBlastId;

        return $this;
    }

    /**
     * Get EmailBlastId
     *
     * @return string
     */
    public function getEmailBlastId()
    {
        return $this->EmailBlastId;
    }

    /**
     * Set Status
     *
     * @param string $Status
     *
     * @return Emailblastmonitoring
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * Set EmailBlast
     *
     * @param \PandoraBundle\Entity\Emailblast $EmailBlast
     *
     * @return Emailblast
     */
    public function setEmailBlast(\PandoraBundle\Entity\Emailblast $EmailBlast = null)
    {
        $this->EmailBlast = $EmailBlast;
        
        return $this;
    }
    
    /**
     * Get EmailBlast
     *
     * @return \PandoraBundle\Entity\Emailblast
     */
    public function getEmailBlast()
    {
        return $this->EmailBlast;
    }
}
