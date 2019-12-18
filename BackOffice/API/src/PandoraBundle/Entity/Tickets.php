<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Tickets
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TicketDetails")
 * @ORM\Table(name="Tickets")
 * @ORM\Entity
 */
class Tickets extends AbstractEntity
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=1000, minMessage = "Details Code must be at least {{ limit }} characters long", maxMessage = "Details cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="TicketDetails", type="string", length=10000, nullable=true)
     */
    private $TicketDetails;

    /**
     * @var integer
     * 
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="TicketCategoryId", type="bigint", nullable=false)
     */
    private $TicketCategoryId = '0';
    
    /**
     *
     * Many Tickets to One Ticket Category
     * 
     * @Assert\NotBlank()
     *
     * @ORM\ManyToOne(targetEntity="Ticketcategory")
     * @ORM\JoinColumn(name="TicketCategoryId", referencedColumnName="Id")
     */
    private $TicketCategory;
    
    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $CreatedById = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="TicketNo", type="string", length=50, nullable=true)
     */
    private $TicketNo;
    
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
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=200, minMessage = "Subject must be at least {{ limit }} characters long", maxMessage = "Subject cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="TicketSubject", type="string", length=200, nullable=true)
     */
    private $TicketSubject;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=200, minMessage = "Assigned To must be at least {{ limit }} characters long", maxMessage = "Assigned To cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="AssignedTo", type="string", length=200, nullable=true)
     */
    private $AssignedTo;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=200, minMessage = "Player Name To must be at least {{ limit }} characters long", maxMessage = "Player Name To cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PlayerName", type="string", length=100, nullable=true)
     */
    private $PlayerName;

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
     * Many Tickets to One Team
     *
     * @Assert\NotBlank()
     * 
     * @ORM\ManyToOne(targetEntity="Teams")
     * @ORM\JoinColumn(name="TeamId", referencedColumnName="Id")
     */
    private $Team;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';

    /**
     *
     * Many Tickets to One Brand
     *
     * @Assert\NotBlank()
     * 
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;
    
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
     * @EnumFieldAnnotation(eNumClass="TicketStatusTypeEnum")
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $Status = '0';
    
    /**
     * Set TicketDetails
     *
     * @param string $TicketDetails
     *
     * @return Tickets
     */
    public function setTicketDetails($TicketDetails)
    {
        $this->TicketDetails = $TicketDetails;

        return $this;
    }

    /**
     * Get TicketCategoryDesc
     *
     * @return string
     */
    public function getTicketCategoryDesc()
    {
        return $this->TicketCategoryDesc;
    }

    /**
     * Set TicketCategoryId
     *
     * @param integer $TicketCategoryId
     *
     * @return Tickets
     */
    public function setTicketCategoryId($TicketCategoryId)
    {
        $this->TicketCategoryId = $TicketCategoryId;

        return $this;
    }

    /**
     * Get TicketCategoryId
     *
     * @return integer
     */
    public function getTicketCategoryId()
    {
        return $this->TicketCategoryId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Tickets
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
     * @return Tickets
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
     * @return Tickets
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
     * @return Tickets
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
     * @return Tickets
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
     * Set TicketSubject
     *
     * @param string $TicketSubject
     *
     * @return Tickets
     */
    public function setTicketSubject($TicketSubject)
    {
        $this->TicketSubject = $TicketSubject;

        return $this;
    }

    /**
     * Get TicketSubject
     *
     * @return string
     */
    public function getTicketSubject()
    {
        return $this->TicketSubject;
    }

    /**
     * Set AssignedTo
     *
     * @param string $AssignedTo
     *
     * @return Tickets
     */
    public function setAssignedTo($AssignedTo)
    {
        $this->AssignedTo = $AssignedTo;

        return $this;
    }

    /**
     * Get AssignedTo
     *
     * @return string
     */
    public function getAssignedTo()
    {
        return $this->AssignedTo;
    }

    /**
     * Set PlayerName
     *
     * @param string $PlayerName
     *
     * @return Tickets
     */
    public function setPlayerName($PlayerName)
    {
        $this->PlayerName = $PlayerName;

        return $this;
    }

    /**
     * Get PlayerName
     *
     * @return string
     */
    public function getPlayerName()
    {
        return $this->PlayerName;
    }

    /**
     * Set TeamId
     *
     * @param integer $TeamId
     *
     * @return Tickets
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
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Tickets
     */
    public function setBrandId($BrandId)
    {
        $this->BrandId = $BrandId;

        return $this;
    }

    /**
     * Get BrandId
     *
     * @return integer
     */
    public function getBrandId()
    {
        return $this->BrandId;
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
     * @param int $Id
     *
     * @return Teams
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        
        return $this;
    }
    
    /**
     * Set Status
     *
     * @param integer $Status
     *
     * @return Teams
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
        
        return $this;
    }
    
    /**
     * Get Status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->Status;
    }
    
    /**
     * Set TicketCategory
     *
     * @param \PandoraBundle\Entity\Ticketcategory $TicketCategory
     *
     * @return Tickets
     */
    public function setTicketCategory(\PandoraBundle\Entity\Ticketcategory $TicketCategory = null)
    {
        $this->TicketCategory = $TicketCategory;
        
        return $this;
    }
    
    /**
     * Get TicketCategory
     *
     * @return \PandoraBundle\Entity\Ticketcategory
     */
    public function getTicketCategory()
    {
        return $this->TicketCategory;
    }
    
    /**
     * Set Teams
     *
     * @param \PandoraBundle\Entity\Teams $Team
     *
     * @return Tickets
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
     * Set Teams
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Tickets
     */
    public function setBrand(\PandoraBundle\Entity\Brands $Brand = null)
    {
        $this->Brand = $Brand;
        
        return $this;
    }
    
    /**
     * Get Team
     *
     * @return \PandoraBundle\Entity\Brands
     */
    public function getBrand()
    {
        return $this->Brand;
    }
    
    /**
     * Set TicketNo
     *
     * @param integer $TicketNo
     *
     * @return Tickets
     */
    public function setTicketNo($TicketNo)
    {
        $this->TicketNo = $TicketNo;
        
        return $this;
    }
    
    /**
     * Get TicketNo
     *
     * @return String
     */
    public function getTicketNo()
    {
        return $this->TicketNo;
    }
}
