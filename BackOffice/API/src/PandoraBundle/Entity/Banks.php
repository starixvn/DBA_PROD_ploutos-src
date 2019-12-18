<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Banks
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="BankCode")
 * @ORM\Table(name="Banks", uniqueConstraints={@ORM\UniqueConstraint(name="BankCode", columns={"BankCode"})})
 * @UniqueEntity(fields={"BankCode"}, message="Code already exist")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\BankRepository")
 */
class Banks extends AbstractEntity
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
     * @Assert\Length(min=3, max=100, minMessage = "Bank Code must be at least {{ limit }} characters long", maxMessage = "Bank Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BankCode", type="string", length=100, nullable=true)
     */
    private $BankCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Bank Name must be at least {{ limit }} characters long", maxMessage = "Bank Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BankName", type="string", length=100, nullable=true)
     */
    private $BankName;

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
     * @var boolean
     * 
     * @ORM\Column(name="IsOnlineBank", type="boolean", nullable=false)
     */
    private $IsOnlineBank = false;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="BankTransactionTypeEnum")
     * @Assert\NotBlank()
     * @ORM\Column(name="BankTransactionType", type="integer", nullable=true)
     */
    private $BankTransactionType = '0';

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $CurrencyId = '0';

    /**
     *
     * Many Bank Accounts to One Currency
     *
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
	private $Currency;
	
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
     * One Bank has One Brand
     * 
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;
    
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
     * Set BankCode
     *
     * @param string $BankCode
     *
     * @return Banks
     */
    public function setBankCode($BankCode)
    {
        $this->BankCode = $BankCode;

        return $this;
    }

    /**
     * Get BankCode
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->BankCode;
    }

    /**
     * Set BankName
     *
     * @param string $BankName
     *
     * @return Banks
     */
    public function setBankName($BankName)
    {
        $this->BankName = $BankName;

        return $this;
    }

    /**
     * Get BankName
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->BankName;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Banks
     */
    public function setRollbaseId($RollbaseId)
    {
        $this->RollbaseId = $RollbaseId;

        return $this;
    }

    /**
     * Get RollbaseId
     *
     * @return integer
     */
    public function getRollbaseId()
    {
        return $this->RollbaseId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Banks
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
     * @return Banks
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
     * @return Banks
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
     * @return Banks
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
     * @return Banks
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
     * Set IsOnlineBank
     *
     * @param boolean $IsOnlineBank
     *
     * @return Banks
     */
    public function setIsOnlineBank($IsOnlineBank)
    {
        $this->IsOnlineBank = $IsOnlineBank;

        return $this;
    }

    /**
     * Get IsOnlineBank
     *
     * @return boolean
     */
    public function getIsOnlineBank()
    {
        return $this->IsOnlineBank;
    }

    /**
     * Set BankTransactionType
     *
     * @param integer $BankTransactionType
     *
     * @return Banks
     */
    public function setBankTransactionType($BankTransactionType)
    {
        $this->BankTransactionType = $BankTransactionType;

        return $this;
    }

    /**
     * Get BankTransactionType
     *
     * @return integer
     */
    public function getBankTransactionType()
    {
        return $this->BankTransactionType;
    }

    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Banks
     */
    public function setCurrencyId($CurrencyId)
    {
        $this->CurrencyId = $CurrencyId;

        return $this;
    }

    /**
     * Get CurrencyId
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->CurrencyId;
    }
    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Banks
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
     * Set Brand
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Banks
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
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Banks
     */
    public function setCurrency(\PandoraBundle\Entity\Currencies $Currency = null)
    {
        $this->Currency = $Currency;
        
        return $this;
    }
    
    /**
     * Get Currency
     *
     * @return \PandoraBundle\Entity\Currencies
     */
    public function getCurrency()
    {
        return $this->Currency;
	}	
}
