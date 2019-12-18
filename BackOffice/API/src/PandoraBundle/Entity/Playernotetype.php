<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Playernotetype
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="PlayerNoteTypeName")
 * @ORM\Table(name="PlayerNoteType")
 * @ORM\Entity
 */
class Playernotetype extends AbstractEntity
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
     * @Assert\Length(min=3, max=100, minMessage = "Code must be at least {{ limit }} characters long", maxMessage = "Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PlayerNoteTypeCode", type="string", length=100, nullable=true)
     */
    private $PlayerNoteTypeCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Name must be at least {{ limit }} characters long", maxMessage = "Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PlayerNoteTypeName", type="string", length=100, nullable=true)
     */
    private $PlayerNoteTypeName;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="PlayerNoteCategoryId", type="bigint", nullable=false)
     */
    private $PlayerNoteCategoryId = '0';
    
    /**
     *
     * One Player Notes have one team
     *
     * @Assert\NotBlank()
     * @ORM\OneToOne(targetEntity="Playernotecategory")
     * @ORM\JoinColumn(name="PlayerNoteCategoryId", referencedColumnName="Id")
     */
    private $PlayerNoteCategory;
    
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
     * Set PlayerNoteTypeCode
     *
     * @param string $PlayerNoteTypeCode
     *
     * @return Playernotetype
     */
    public function setPlayerNoteTypeCode($PlayerNoteTypeCode)
    {
        $this->PlayerNoteTypeCode = $PlayerNoteTypeCode;

        return $this;
    }

    /**
     * Get PlayerNoteTypeCode
     *
     * @return string
     */
    public function getPlayerNoteTypeCode()
    {
        return $this->PlayerNoteTypeCode;
    }

    /**
     * Set PlayerNoteTypeName
     *
     * @param string $PlayerNoteTypeName
     *
     * @return Playernotetype
     */
    public function setPlayerNoteTypeName($PlayerNoteTypeName)
    {
        $this->PlayerNoteTypeName = $PlayerNoteTypeName;

        return $this;
    }

    /**
     * Get PlayerNoteTypeName
     *
     * @return string
     */
    public function getPlayerNoteTypeName()
    {
        return $this->PlayerNoteTypeName;
    }

    /**
     * Set PlayerNoteCategoryId
     *
     * @param integer $PlayerNoteCategoryId
     *
     * @return Playernotetype
     */
    public function setPlayerNoteCategoryId($PlayerNoteCategoryId)
    {
        $this->PlayerNoteCategoryId = $PlayerNoteCategoryId;

        return $this;
    }

    /**
     * Get PlayerNoteCategoryId
     *
     * @return integer
     */
    public function getPlayerNoteCategoryId()
    {
        return $this->PlayerNoteCategoryId;
    }
    
    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playernotetype
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
     * @return Playernotetype
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
     * @return Playernotetype
     */
    public function setDatecreated($DateCreated)
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
     * @return Playernotetype
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
     * @return Playernotetype
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
     * Get PlayerNoteCategory
     *
     * @return \PandoraBundle\Entity\Playernotecategory
     */
    public function getPlayerNoteCategory()
    {
        return $this->PlayerNoteCategory;
    }
    
    /**
     * Set PlayerNoteType
     *
     * @param \PandoraBundle\Entity\Playernotecategory $PlayerNoteType
     *
     * @return Playernotetype
     */
    public function setPlayerNoteCategory(\PandoraBundle\Entity\Playernotecategory $PlayerNoteCategory = null)
    {
        $this->PlayerNoteCategory = $PlayerNoteCategory;
        
        return $this;
    }
    
}
