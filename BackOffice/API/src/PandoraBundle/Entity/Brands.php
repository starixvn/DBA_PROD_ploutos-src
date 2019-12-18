<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Brands
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="BrandCode")
 * @ORM\Table(name="Brands", uniqueConstraints={@ORM\UniqueConstraint(name="BrandCode", columns={"BrandCode"})})
 * @UniqueEntity(fields={"BrandCode"}, message="Code already exist")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\BrandRepository")
 */
class Brands extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Brand Code must be at least {{ limit }} characters long", maxMessage = "Brand Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BrandCode", type="string", length=100, nullable=true, unique=true)
     */
    private $BrandCode;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "Brand Name is required")
     * @ORM\Column(name="BrandName", type="string", length=100, nullable=true)
     */
    private $BrandName;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "Brand URL is required")
     * @ORM\Column(name="BrandUrl", type="string", length=300, nullable=true)
     */
    private $BrandUrl;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "Brand Game Prefix is required")
     * @ORM\Column(name="BrandGamePrefix", type="string", length=10, nullable=true)
     */
    private $BrandGamePrefix;

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
     * @ORM\Column(name="IsAutoVerified", type="boolean", nullable=false)
     */
    private $IsAutoVerified = true;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="IsAffiliateRequired", type="boolean", nullable=false)
     */
    private $IsAffiliateRequired = true;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="GameForwardEndpoint", type="string", length=1000, nullable=true)
     */
    private $GameForwardEndpoint;
    
    /**
     * @var string
     *
     * @ORM\Column(name="DepositEndpoint", type="string", length=1000, nullable=true)
     */
    private $DepositEndpoint;
    
    /**
     * @var string
     *
     * @ORM\Column(name="WithdrawalEndpoint", type="string", length=1000, nullable=true)
     */
    private $WithdrawalEndpoint;
    
//     /**
//      * @var string
//      *
//      * @ORM\Column(name="ClientKey", type="string", length=100, nullable=true)
//      */
//     private $ClientKey;
    
//     /**
//      * @var string
//      *
//      * @ORM\Column(name="SecretKey", type="string", length=100, nullable=true)
//      */
//     private $SecretKey;
    
    /**
     * @var string
     *
     * @ORM\Column(name="IsActive", type="boolean", nullable=false)
     */
    private $IsActive = false;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="MerchantId", type="bigint", nullable=true)
     */
    private $MerchantId = '0';
    
    /**
     *
     * One Brand have one Merchant
     * 
     * @ORM\OneToOne(targetEntity="Merchants")
     * @ORM\JoinColumn(name="MerchantId", referencedColumnName="Id")
     */
    private $Merchant;
    
    
    /**
     * Set GameForwardEndpoint
     *
     * @param string $GameForwardEndpoint
     *
     * @return Brands
     */
    public function setGameForwardEndpoint($GameForwardEndpoint)
    {
        $this->GameForwardEndpoint = $GameForwardEndpoint;
        
        return $this;
    }
    
    /**
     * Get GameForwardEndpoint
     *
     * @return string
     */
    public function getGameForwardEndpoint()
    {
        return $this->GameForwardEndpoint;
    }
    
    /**
     * Set DepositEndpoint
     *
     * @param string $DepositEndpoint
     *
     * @return Brands
     */
    public function setDepositEndpoint($DepositEndpoint)
    {
        $this->DepositEndpoint = $DepositEndpoint;
        
        return $this;
    }
    
    /**
     * Get DepositEndpoint
     *
     * @return string
     */
    public function getDepositEndpoint()
    {
        return $this->DepositEndpoint;
    }
    
    /**
     * Set WithdrawalEndpoint
     *
     * @param string $WithdrawalEndpoint
     *
     * @return Brands
     */
    public function setWithdrawalEndpoint($WithdrawalEndpoint)
    {
        $this->WithdrawalEndpoint = $WithdrawalEndpoint;
        
        return $this;
    }
    
    /**
     * Get WithdrawalEndpoint
     *
     * @return string
     */
    public function getWithdrawalEndpoint()
    {
        return $this->WithdrawalEndpoint;
    }
    
//     /**
//      * Set ClientKey
//      *
//      * @param string $ClientKey
//      *
//      * @return Brands
//      */
//     public function setClientKey($ClientKey)
//     {
//         $this->ClientKey = $ClientKey;
        
//         return $this;
//     }
    
//     /**
//      * Get ClientKey
//      *
//      * @return string
//      */
//     public function getClientKey()
//     {
//         return $this->ClientKey;
//     }
    
//     /**
//      * Set SecretKey
//      *
//      * @param string $SecretKey
//      *
//      * @return Brands
//      */
//     public function setSecretKey($SecretKey)
//     {
//         $this->SecretKey = $SecretKey;
        
//         return $this;
//     }
    
//     /**
//      * Get SecretKey
//      *
//      * @return string
//      */
//     public function getSecretKey()
//     {
//         return $this->SecretKey;
//     }
    
    /**
     * Set IsActive
     *
     * @param string $IsActive
     *
     * @return Brands
     */
    public function setIsActive($IsActive)
    {
        $this->IsActive = $IsActive;
        
        return $this;
    }
    
    /**
     * Get IsActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }
    
    
    /**
     * Set MerchantId
     *
     * @param string $MerchantId
     *
     * @return Brands
     */
    public function setMerchantId($MerchantId)
    {
        $this->MerchantId = $MerchantId;
        
        return $this;
    }
    
    /**
     * Get MerchantId
     *
     * @return integer
     */
    public function getMerchantId()
    {
        return $this->MerchantId;
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

    /**
     * Set BrandCode
     *
     * @param string $BrandCode
     *
     * @return Brands
     */
    public function setBrandCode($BrandCode)
    {
        $this->BrandCode = $BrandCode;

        return $this;
    }

    /**
     * Get BrandCode
     *
     * @return string
     */
    public function getBrandCode()
    {
        return $this->BrandCode;
    }

    /**
     * Set BrandName
     *
     * @param string $BrandName
     *
     * @return Brands
     */
    public function setBrandName($BrandName)
    {
        $this->BrandName = $BrandName;

        return $this;
    }

    /**
     * Get BrandName
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->BrandName;
    }

    /**
     * Set BrandUrl
     *
     * @param string $BrandUrl
     *
     * @return Brands
     */
    public function setBrandUrl($BrandUrl)
    {
        $this->BrandUrl = $BrandUrl;

        return $this;
    }

    /**
     * Get BrandUrl
     *
     * @return string
     */
    public function getBrandUrl()
    {
        return $this->BrandUrl;
    }

    /**
     * Set BrandGamePrefix
     *
     * @param string $BrandGamePrefix
     *
     * @return Brands
     */
    public function setBrandGamePrefix($BrandGamePrefix)
    {
        $this->BrandGamePrefix = $BrandGamePrefix;

        return $this;
    }

    /**
     * Get BrandGamePrefix
     *
     * @return string
     */
    public function getBrandGamePrefix()
    {
        return $this->BrandGamePrefix;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * Set IsAutoVerified
     *
     * @param boolean $IsAutoVerified
     *
     * @return Brands
     */
    public function setIsAutoVerified($IsAutoVerified)
    {
        $this->IsAutoVerified = $IsAutoVerified;

        return $this;
    }

    /**
     * Get IsAutoVerified
     *
     * @return boolean
     */
    public function getIsAutoVerified()
    {
        return $this->IsAutoVerified;
    }
    
    /**
     * Set IsAffiliateRequired
     *
     * @param boolean $IsAutoVerified
     *
     * @return Brands
     */
    public function setIsAffiliateRequired($IsAffiliateRequired)
    {
        $this->IsAffiliateRequired = $IsAffiliateRequired;
        
        return $this;
    }
    
    /**
     * Get IsAffiliateRequired
     *
     * @return boolean
     */
    public function getIsAffiliateRequired()
    {
        return $this->IsAffiliateRequired;
    }
    
    /**
     * Set Merchant
     *
     * @param \PandoraBundle\Entity\Merchants $Merchant
     *
     * @return Brands
     */
    public function setMerchant(\PandoraBundle\Entity\Merchants $Merchant = null)
    {
        $this->Merchant = $Merchant;
        
        return $this;
    }
    
    /**
     * Get Merchant
     *
     * @return \PandoraBundle\Entity\Merchants
     */
    public function getMerchant()
    {
        return $this->Merchant;
    }
}
