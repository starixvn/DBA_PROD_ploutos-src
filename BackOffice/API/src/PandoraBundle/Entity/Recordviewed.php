<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Recordviewed
 *
 * @ORM\Table(name="RecordViewed")
 * @UniqueEntity(fields={"SourceObject", "SourceObjectId"}, message="Record has been tagged already.", repositoryMethod="findUniqueViolation")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\RecordViewedRepository")
 */
class Recordviewed
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="SourceObject", type="string", length=100, nullable=true)
     */
    private $SourceObject;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(name="SourceObjectId", type="bigint", nullable=false)
     */
    private $SourceObjectId = '0';

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="ViewedBy", type="string", length=100, nullable=true)
     */
    private $ViewedBy;

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
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;



    /**
     * Set SourceObject
     *
     * @param string $SourceObject
     *
     * @return Recordviewed
     */
    public function setSourceObject($SourceObject)
    {
        $this->SourceObject = $SourceObject;

        return $this;
    }

    /**
     * Get SourceObject
     *
     * @return string
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
     * @return Recordviewed
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
     * Set ViewedBy
     *
     * @param string $ViewedBy
     *
     * @return Recordviewed
     */
    public function setViewedBy($ViewedBy)
    {
        $this->ViewedBy = $ViewedBy;

        return $this;
    }

    /**
     * Get ViewedBy
     *
     * @return string
     */
    public function getViewedBy()
    {
        return $this->ViewedBy;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Recordviewed
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
     * @return Recordviewed
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
     * @return Recordviewed
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
     * @return Recordviewed
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
     * @return Recordviewed
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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }
}
