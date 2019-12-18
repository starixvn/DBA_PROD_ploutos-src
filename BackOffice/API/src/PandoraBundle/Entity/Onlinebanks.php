<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Onlinebanks
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="OnlineBankName")
 * @ORM\Table(name="OnlineBanks", uniqueConstraints={@ORM\UniqueConstraint(name="OnlineBankCode", columns={"OnlineBankCode"})})
 * @ORM\Entity
 */
class Onlinebanks extends AbstractEntity
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
     * @ORM\Column(name="OnlineBankCode", type="string", length=100, nullable=true)
     */
    private $OnlineBankCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100, minMessage = "Name must be at least {{ limit }} characters long", maxMessage = "Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="OnlineBankName", type="string", length=100, nullable=true)
     */
    private $OnlineBankName;

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
     * @var integer
     *
     * @ORM\Column(name="OnlineBankTypeId", type="bigint", nullable=true)
     */
    private $OnlineBankTypeId;

    /**
     *
     * Many Online Banks to Online Banks Type
     *
     * @ORM\ManyToOne(targetEntity="Onlinebanktypes")
     * @ORM\JoinColumn(name="OnlineBankTypeId", referencedColumnName="Id")
     */
    private $OnlineBankType;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="TransactionType", type="integer", nullable=false)
     */
    private $TransactionType = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="Sequence", type="bigint", nullable=true)
     */
    private $Sequence;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Active", type="boolean", nullable=false)
     */
    private $Active = true;

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
     * Set OnlineBankCode
     *
     * @param string $OnlineBankCode
     *
     * @return Onlinebanks
     */
    public function setOnlineBankCode($OnlineBankCode)
    {
        $this->OnlineBankCode = $OnlineBankCode;

        return $this;
    }

    /**
     * Get OnlineBankCode
     *
     * @return string
     */
    public function getOnlineBankCode()
    {
        return $this->OnlineBankCode;
    }

    /**
     * Set OnlineBankName
     *
     * @param string $OnlineBankName
     *
     * @return Onlinebanks
     */
    public function setOnlineBankName($OnlineBankName)
    {
        $this->OnlineBankName = $OnlineBankName;

        return $this;
    }

    /**
     * Get OnlineBankName
     *
     * @return string
     */
    public function getOnlineBankName()
    {
        return $this->OnlineBankName;
    }

    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Onlinebanks
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
     * Set OnlineBankTypeId
     *
     * @param integer $OnlineBankTypeId
     *
     * @return Onlinebanks
     */
    public function setOnlineBankTypeId($OnlineBankTypeId)
    {
        $this->OnlineBankTypeId = $OnlineBankTypeId;

        return $this;
    }

    /**
     * Get OnlineBankTypeId
     *
     * @return integer
     */
    public function getOnlineBankTypeId()
    {
        return $this->OnlineBankTypeId;
    }

    /**
     * Set TransactionType
     *
     * @param integer $TransactionType
     *
     * @return Onlinebanks
     */
    public function setTransactionType($TransactionType)
    {
        $this->TransactionType = $TransactionType;

        return $this;
    }

    /**
     * Get TransactionType
     *
     * @return integer
     */
    public function getTransactionType()
    {
        return $this->TransactionType;
    }

    /**
     * Set Sequence
     *
     * @param integer $Sequence
     *
     * @return Onlinebanks
     */
    public function setSequence($Sequence)
    {
        $this->Sequence = $Sequence;

        return $this;
    }

    /**
     * Get Sequence
     *
     * @return integer
     */
    public function getSequence()
    {
        return $this->Sequence;
    }

    /**
     * Set Active
     *
     * @param boolean $Active
     *
     * @return Onlinebanks
     */
    public function setActive($Active)
    {
        $this->Active = $Active;

        return $this;
    }

    /**
     * Get Active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->Active;
    }

    /**
     * Set IsDefault
     *
     * @param boolean $IsDefault
     *
     * @return Onlinebanks
     */
    public function setIsDefault($IsDefault)
    {
        $this->IsDefault = $IsDefault;

        return $this;
    }

    /**
     * Get IsDefault
     *
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->IsDefault;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Onlinebanks
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
     * @return Onlinebanks
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
     * @return Onlinebanks
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
     * @return Onlinebanks
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
     * @return Onlinebanks
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
     * @return Onlinebanks
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
    
    
    /**
     * Set OnlineBankType
     *
     * @param \PandoraBundle\Entity\Onlinebanktypes $OnlineBankType
     *
     * @return Onlinebanks
     */
    public function setOnlineBankType(\PandoraBundle\Entity\Onlinebanktypes $OnlineBankType = null)
    {
        $this->OnlineBankType = $OnlineBankType;
        
        return $this;
    }
    
    /**
     * Get OnlineBankType
     *
     * @return \PandoraBundle\Entity\Onlinebanktypes
     */
    public function getOnlineBankType()
    {
        return $this->OnlineBankType;
    }
}
