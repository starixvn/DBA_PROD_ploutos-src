<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Ticketcategory
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TicketCategoryName")
 * @ORM\Table(name="TicketCategory")
 * @ORM\Entity
 */
class Ticketcategory extends AbstractEntity
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=200, minMessage = "Ticket Category Name must be at least {{ limit }} characters long", maxMessage = "Ticket Category Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="TicketCategoryName", type="string", length=200, nullable=true)
     */
    private $TicketCategoryName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=200, minMessage = "Ticket Category Desc must be at least {{ limit }} characters long", maxMessage = "Ticket Category Desc cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="TicketCategoryDesc", type="string", length=200, nullable=true)
     */
    private $TicketCategoryDesc;

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
     * Many Ticket Category to One Brand
     *
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;
    
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
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=50, minMessage = "Ticket Category Code must be at least {{ limit }} characters long", maxMessage = "Ticket Category Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="TicketCategoryCode", type="string", length=50, nullable=true)
     */
    private $TicketCategoryCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;



    /**
     * Set TicketCategoryName
     *
     * @param string $TicketCategoryName
     *
     * @return Ticketcategory
     */
    public function setTicketCategoryName($TicketCategoryName)
    {
        $this->TicketCategoryName = $TicketCategoryName;

        return $this;
    }

    /**
     * Get TicketCategoryName
     *
     * @return string
     */
    public function getTicketCategoryName()
    {
        return $this->TicketCategoryName;
    }

    /**
     * Set TicketCategoryDesc
     *
     * @param string $TicketCategoryDesc
     *
     * @return Ticketcategory
     */
    public function setTicketCategoryDesc($TicketCategoryDesc)
    {
        $this->TicketCategoryDesc = $TicketCategoryDesc;

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
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Ticketcategory
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Ticketcategory
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
     * @return Ticketcategory
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
     * @return Ticketcategory
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
     * @return Ticketcategory
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
     * @return Ticketcategory
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
     * Set TicketCategoryCode
     *
     * @param string $TicketCategoryCode
     *
     * @return Ticketcategory
     */
    public function setTicketCategoryCode($TicketCategoryCode)
    {
        $this->TicketCategoryCode = $TicketCategoryCode;

        return $this;
    }

    /**
     * Get TicketCategoryCode
     *
     * @return string
     */
    public function getTicketCategoryCode()
    {
        return $this->TicketCategoryCode;
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
     * @return integer
     */
    public function setId($Id)
    {
        return $this->Id = $Id;
    }
    
    
    /**
     * Set Brand
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Ticketcategory
     */
    public function setBrand(\PandoraBundle\Entity\Brands $Brand = null)
    {
        $this->Brand = $Brand;
        
        return $this;
    }
    
    /**
     * Get Brand
     *
     * @return \PandoraBundle\Entity\Brands
     */
    public function getBrand()
    {
        return $this->Brand;
    }
}
