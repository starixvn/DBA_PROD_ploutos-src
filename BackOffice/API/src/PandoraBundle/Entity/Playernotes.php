<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Playernotes
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="PlayerNoteSubject")
 * @ORM\Table(name="PlayerNotes")
 * @ORM\Entity
 */
class Playernotes extends AbstractEntity
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
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';
    
    /**
     *
     * One Player Note have one Player
     *
     * @ORM\OneToOne(targetEntity="Playerprofiles")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfile;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="TeamId", type="bigint", nullable=false)
     */
    private $TeamId = '0';
    
    /**
     *
     * One Player Note have one team
     *
     * @ORM\OneToOne(targetEntity="Teams")
     * @ORM\JoinColumn(name="TeamId", referencedColumnName="Id")
     */
    private $Team;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="PlayerNoteCategoryId", type="bigint", nullable=false)
     */
    private $PlayerNoteCategoryId = '0';
    
    /**
     *
     * One Player Notes have one team
     *
     * @ORM\OneToOne(targetEntity="Playernotecategory")
     * @ORM\JoinColumn(name="PlayerNoteCategoryId", referencedColumnName="Id")
     */
    private $PlayerNoteCategory;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="PlayerNoteTypeId", type="bigint", nullable=false)
     */
    private $PlayerNoteTypeId = '0';
    
    /**
     *
     * One Player Notes have one team
     *
     * @ORM\OneToOne(targetEntity="Playernotetype")
     * @ORM\JoinColumn(name="PlayerNoteTypeId", referencedColumnName="Id")
     */
    private $PlayerNoteType;
    
    /**
     * @var string
     *
     * @Assert\NotBlank(message="Note should not be blank")
     * @Assert\Length(min=3, max=100, minMessage = "Player Note Subject must be at least {{ limit }} characters long", maxMessage = "Player Note Subject cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PlayerNoteSubject", type="string", length=100, nullable=true)
     */
    private $PlayerNoteSubject;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Description should not be blank")
     * @Assert\Length(min=3, max=2000, minMessage = "Description must be at least {{ limit }} characters long", maxMessage = "Description cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PlayerNoteDesc", type="string", length=2000, nullable=true)
     */
    private $PlayerNoteDesc;

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
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return Playernotes
     */
    public function setPlayerProfileId($PlayerProfileId)
    {
        $this->PlayerProfileId = $PlayerProfileId;

        return $this;
    }

    /**
     * Get PlayerProfileId
     *
     * @return integer
     */
    public function getPlayerProfileId()
    {
        return $this->PlayerProfileId;
    }

    /**
     * Set TeamId
     *
     * @param integer $TeamId
     *
     * @return Playernotes
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
     * Set PlayerNoteCategoryId
     *
     * @param integer $PlayerNoteCategoryId
     *
     * @return Playernotes
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
     * Set PlayerNoteTypeId
     *
     * @param integer $PlayerNoteTypeId
     *
     * @return Playernotes
     */
    public function setPlayerNoteTypeId($PlayerNoteTypeId)
    {
        $this->PlayerNoteTypeId = $PlayerNoteTypeId;

        return $this;
    }

    /**
     * Get PlayerNoteTypeId
     *
     * @return integer
     */
    public function getPlayerNoteTypeId()
    {
        return $this->PlayerNoteTypeId;
    }

    /**
     * Set PlayerNoteSubject
     *
     * @param string $PlayerNoteSubject
     *
     * @return Playernotes
     */
    public function setPlayerNoteSubject($PlayerNoteSubject)
    {
        $this->PlayerNoteSubject = $PlayerNoteSubject;

        return $this;
    }

    /**
     * Get PlayerNoteSubject
     *
     * @return string
     */
    public function getPlayerNoteSubject()
    {
        return $this->PlayerNoteSubject;
    }

    /**
     * Set PlayerNoteDesc
     *
     * @param string $PlayerNoteDesc
     *
     * @return Playernotes
     */
    public function setPlayerNoteDesc($PlayerNoteDesc)
    {
        $this->PlayerNoteDesc = $PlayerNoteDesc;

        return $this;
    }

    /**
     * Get PlayerNoteDesc
     *
     * @return string
     */
    public function getPlayerNoteDesc()
    {
        return $this->PlayerNoteDesc;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playernotes
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
     * @return Playernotes
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
     * @return Playernotes
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
     * @return Playernotes
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
     * @return Playernotes
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
     * @return Playernotes
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
    
    
    /**
     * Set PlayerProfile
     *
     * @param \PandoraBundle\Entity\Playerprofiles $PlayerProfile
     *
     * @return Playernotes
     */
    public function setPlayerProfile(\PandoraBundle\Entity\Playerprofiles $PlayerProfile = null)
    {
        $this->PlayerProfile = $PlayerProfile;
        
        return $this;
    }
    
    /**
     * Get PlayerProfile
     *
     * @return \PandoraBundle\Entity\Playerprofiles
     */
    public function getPlayerProfile()
    {
        return $this->PlayerProfile;
    }
    
    /**
     * Set PlayerNoteCategory
     *
     * @param \PandoraBundle\Entity\Playernotecategory $PlayerNoteCategory
     *
     * @return Playernotes
     */
    public function setPlayerNoteCategory(\PandoraBundle\Entity\Playernotecategory $PlayerNoteCategory = null)
    {
        $this->PlayerNoteCategory = $PlayerNoteCategory;
        
        return $this;
    }
    
    /**
     * Get PlayerNoteCategory
     *
     * @return \PandoraBundle\Entity\Playernotecategory
     */
    public function getTeamPlayerNoteCategory()
    {
        return $this->PlayerNoteCategory;
    }
    
    /**
     * Set PlayerNoteType
     *
     * @param \PandoraBundle\Entity\Playernotetype $PlayerNoteType
     *
     * @return Playernotes
     */
    public function setPlayerNoteType(\PandoraBundle\Entity\Playernotetype $PlayerNoteType = null)
    {
        $this->PlayerNoteType = $PlayerNoteType;
        
        return $this;
    }
    
    /**
     * Get PlayerNoteType
     *
     * @return \PandoraBundle\Entity\Playernotetype
     */
    public function getPlayerNoteType()
    {
        return $this->PlayerNoteType;
    }
}
