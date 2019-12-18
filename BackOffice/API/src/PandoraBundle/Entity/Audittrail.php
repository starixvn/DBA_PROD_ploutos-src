<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Audittrail
 *
 * @ORM\Table(name="AuditTrail")
 * @ORM\Entity
 */
class Audittrail
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
     * @Assert\NotBlank()
     * @ORM\Column(name="SourceObject", type="bigint", nullable=false)
     */
    private $SourceObject;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="SourceObjectId", type="bigint", nullable=false)
     */
    private $SourceObjectId;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="AuditDescription", type="text", length=65535, nullable=false)
     */
    private $AuditDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $CreatedById;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="RevisionBy", type="string", length=70, nullable=false)
     */
    private $RevisionBy;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=50, nullable=true)
     */
    private $ModifiedById;

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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set SourceObject
     *
     * @param integer $SourceObject
     *
     * @return Audittrail
     */
    public function setSourceobject($SourceObject)
    {
        $this->SourceObject = $SourceObject;

        return $this;
    }

    /**
     * Get SourceObject
     *
     * @return integer
     */
    public function getSourceObject()
    {
        return $this->SourceObject;
    }

    /**
     * Set SourceObjectId
     *
     * @param integer $SourceObjectId
     *
     * @return Audittrail
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
     * Set AuditDescription
     *
     * @param string $AuditDescription
     *
     * @return Audittrail
     */
    public function setAuditDescription($AuditDescription)
    {
        $this->AuditDescription = $AuditDescription;

        return $this;
    }

    /**
     * Get AuditDescription
     *
     * @return string
     */
    public function getAuditDescription()
    {
        return $this->AuditDescription;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Audittrail
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
     * @return Audittrail
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
     * @return Audittrail
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
     * @return Audittrail
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
     * Set RevisionBy
     *
     * @param string $RevisionBy
     *
     * @return Audittrail
     */
    public function setRevisionBy($RevisionBy)
    {
        $this->RevisionBy = $RevisionBy;
        
        return $this;
    }
    
    /**
     * Get RevisionBy
     *
     * @return string
     */
    public function getRevisionBy()
    {
        return $this->RevisionBy;
    }
}
