<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Onlinebanktypes
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="OnlineBankTypeName")
 * @ORM\Table(name="OnlineBankTypes", uniqueConstraints={@ORM\UniqueConstraint(name="OnlineBankTypeCode", columns={"OnlineBankTypeCode"})})
 * @ORM\Entity
 */
class Onlinebanktypes extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Code must be at least {{ limit }} characters long", maxMessage = "Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="OnlineBankTypeCode", type="string", length=100, nullable=true)
     */
    private $OnlineBankTypeCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100, minMessage = "Name must be at least {{ limit }} characters long", maxMessage = "Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="OnlineBankTypeName", type="string", length=100, nullable=true)
     */
    private $OnlineBankTypeName;
    
    
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=1000, minMessage = "Description must be at least {{ limit }} characters long", maxMessage = "Description cannot be longer than {{ limit }} characters")
     *
     * @ORM\Column(name="Description", type="string", length=1000, nullable=false)
     */
    private $Description;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="BrandId", type="bigint", nullable=true)
     */
    private $BrandId;
    
    /**
     *
     * Many Online Banks to Brand
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
     * Set OnlineBankTypeCode
     *
     * @param string $OnlineBankTypeCode
     *
     * @return Onlinebanktypes
     */
    public function setOnlineBankTypeCode($OnlineBankTypeCode)
    {
        $this->OnlineBankTypeCode = $OnlineBankTypeCode;

        return $this;
    }

    /**
     * Get OnlineBankTypeCode
     *
     * @return string
     */
    public function getOnlineBankTypeCode()
    {
        return $this->OnlineBankTypeCode;
    }

    /**
     * Set OnlineBankTypeName
     *
     * @param string $OnlineBankTypeName
     *
     * @return Onlinebanktypes
     */
    public function setOnlineBankTypeName($OnlineBankTypeName)
    {
        $this->OnlineBankTypeName = $OnlineBankTypeName;

        return $this;
    }

    /**
     * Get OnlineBankTypeName
     *
     * @return string
     */
    public function getOnlineBankTypeName()
    {
        return $this->OnlineBankTypeName;
    }
    
    /**
     * Set Description
     *
     * @param string $Description
     *
     * @return Onlinebanktypes
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
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * Set Brand
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Onlinebanktypes
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
