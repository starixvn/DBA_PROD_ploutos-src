<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Playerdocuments
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="DocumentTypeTitle")
 * @ORM\Table(name="PlayerDocuments")
 * @ORM\Entity
 */
class Playerdocuments extends AbstractEntity
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
    private $PlayerProfileId;
    
    /**
     *
     * One Player Document have One Player Profile
     *
     * @Assert\NotBlank()
     * 
     * @ORM\ManyToOne(targetEntity="Playerprofiles", inversedBy="Playerdocuments")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfile;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="Type", type="integer", nullable=false)
     */
    private $Type;

    /**
     * @var string
     *
     * @ORM\Column(name="DocumentTypeTitle", type="string", length=50, nullable=true)
     */
    private $DocumentTypeTitle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ExpireOn", type="datetime", nullable=true)
     */
    private $ExpireOn;

    /**
     * @var string
     *
     * @ORM\Column(name="IdNumber", type="string", length=100, nullable=true)
     */
    private $IdNumber;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=200, minMessage = "Document Name must be at least {{ limit }} characters long", maxMessage = "Document Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="Document", type="string", length=200, nullable=true)
     */
    private $Document;

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
     * Set Id
     *
     * @param integer $Id
     *
     * @return Playerdocuments
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
    
    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playerdocuments
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
     * @return Playerdocuments
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
     * @return Playerdocuments
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
     * @return Playerdocuments
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
     * @return Playerdocuments
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
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return Playerdocuments
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
     * Set Type
     *
     * @param integer $type
     *
     * @return Playerdocuments
     */
    public function setType($Type)
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * Get Type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Set DocumentTypeTitle
     *
     * @param string $DocumentTypeTitle
     *
     * @return Playerdocuments
     */
    public function setDocumentTypeTitle($DocumentTypeTitle)
    {
        $this->DocumentTypeTitle = $DocumentTypeTitle;

        return $this;
    }

    /**
     * Get DocumentTypeTitle
     *
     * @return string
     */
    public function getDocumentTypeTitle()
    {
        return $this->DocumentTypeTitle;
    }

    /**
     * Set ExpireOn
     *
     * @param \DateTime $ExpireOn
     *
     * @return Playerdocuments
     */
    public function setExpireOn($ExpireOn)
    {
        $this->ExpireOn = $ExpireOn;

        return $this;
    }

    /**
     * Get ExpireOn
     *
     * @return \DateTime
     */
    public function getExpireOn()
    {
        return $this->ExpireOn;
    }

    /**
     * Set IdNumber
     *
     * @param string $IdNumber
     *
     * @return Playerdocuments
     */
    public function setIdNumber($IdNumber)
    {
        $this->IdNumber = $IdNumber;

        return $this;
    }

    /**
     * Get IdNumber
     *
     * @return string
     */
    public function getIdNumber()
    {
        return $this->IdNumber;
    }

    /**
     * Set Document
     *
     * @param string $Document
     *
     * @return Playerdocuments
     */
    public function setDocument($Document)
    {
        $this->Document = $Document;

        return $this;
    }

    /**
     * Get Document
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->Document;
    }
    
    
    /**
     * Set PlayerProfiles
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Playerdocuments
     */
    public function setPlayerProfile(\PandoraBundle\Entity\PlayerProfiles $PlayerProfiles = null)
    {
        $this->PlayerProfile = $PlayerProfiles;
        
        return $this;
    }
    
    /**
     * Get PlayerProfiles
     *
     * @return \PandoraBundle\Entity\PlayerProfiles
     */
    public function getPlayerProfile()
    {
        return $this->PlayerProfile;
    }
}
