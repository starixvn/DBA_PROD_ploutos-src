<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Playernotecategory
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="PlayerNoteCategoryName")
 * @ORM\Table(name="PlayerNoteCategory")
 * @ORM\Entity
 */
class Playernotecategory extends AbstractEntity
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
     * @Assert\Length(min=3, max=100, minMessage = "Player Category Code must be at least {{ limit }} characters long", maxMessage = "Player Category Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PlayerNoteCategoryCode", type="string", length=100, nullable=true)
     */
    private $PlayerNoteCategoryCode;
    
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Player Category Name must be at least {{ limit }} characters long", maxMessage = "Player Category Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PlayerNoteCategoryName", type="string", length=100, nullable=true)
     */
    private $PlayerNoteCategoryName;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="TeamId", type="bigint", nullable=false)
     */
    private $TeamId = '0';
    
    /**
     *
     * One Player Note Category have one team
     *
     * @Assert\NotBlank()
     * @ORM\OneToOne(targetEntity="Teams")
     * @ORM\JoinColumn(name="TeamId", referencedColumnName="Id")
     */
    private $Team;
    
    
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
     * Set PlayerNoteCategoryCode
     *
     * @param string $PlayerNoteCategoryCode
     *
     * @return Playernotecategory
     */
    public function setPlayerNoteCategoryCode($PlayerNoteCategoryCode)
    {
        $this->PlayerNoteCategoryCode = $PlayerNoteCategoryCode;

        return $this;
    }

    /**
     * Get PlayerNoteCategoryCode
     *
     * @return string
     */
    public function getPlayerNoteCategoryCode()
    {
        return $this->PlayerNoteCategoryCode;
    }

    /**
     * Set PlayerNoteCategoryName
     *
     * @param string $PlayerNoteCategoryName
     *
     * @return Playernotecategory
     */
    public function setPlayerNoteCategoryName($PlayerNoteCategoryName)
    {
        $this->PlayerNoteCategoryName = $PlayerNoteCategoryName;

        return $this;
    }

    /**
     * Get PlayerNoteCategoryName
     *
     * @return string
     */
    public function getPlayerNoteCategoryName()
    {
        return $this->PlayerNoteCategoryName;
    }

    /**
     * Set TeamId
     *
     * @param integer $TeamId
     *
     * @return Playernotecategory
     */
    public function setTeamId($TeamId)
    {
        $this->TeamId = $TeamId;

        return $this;
    }

    /**
     * Get TeamId
     *
     * @return integer
     */
    public function getTeamId()
    {
        return $this->TeamId;
    }

    
    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playernotecategory
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
     * @return Playernotecategory
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
     * @return Playernotecategory
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
     * @return Playernotecategory
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
     * @return Playernotecategory
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
     * Set Team
     *
     * @param \PandoraBundle\Entity\Teams $Team
     *
     * @return Playernotecategory
     */
    public function setTeam(\PandoraBundle\Entity\Teams $Team = null)
    {
        $this->Team = $Team;
        
        return $this;
    }
    
    /**
     * Get Team
     *
     * @return \PandoraBundle\Entity\Teams
     */
    public function getTeam()
    {
        return $this->Team;
    }
}
