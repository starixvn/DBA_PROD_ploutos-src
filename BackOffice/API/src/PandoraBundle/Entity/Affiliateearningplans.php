<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Affiliateearningplans
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="EarningPlanName")
 * @ORM\Table(name="AffiliateEarningPlans")
 * @UniqueEntity(fields={"EarningPlanCode"}, message="Code already exist")
 * @UniqueEntity(fields={"CurrencyId", "MinimumNGR"}, errorPath="MinimumNGR", message="Minimum NGR already exist in the same Currency.")
 * @ORM\Entity
 */
class Affiliateearningplans extends AbstractEntity
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
     * @Assert\Length(min=3, max=100, minMessage = "Earning Plan Code must be at least {{ limit }} characters long", maxMessage = "Earning Plan Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="EarningPlanCode", type="string", length=100, nullable=true)
     */
    private $EarningPlanCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Earning Plan Name must be at least {{ limit }} characters long", maxMessage = "Earning Plan Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="EarningPlanName", type="string", length=100, nullable=true)
     */
    private $EarningPlanName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Earning Plan Desc must be at least {{ limit }} characters long", maxMessage = "Earning Plan Desc cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="EarningPlanDesc", type="string", length=100, nullable=true)
     */
    private $EarningPlanDesc;

    /**
     * @var string
     *
     * @Assert\Expression(
     *      expression="this.getFixedCommisionAmount() > 0 || this.getRevenueShare() > 0",
     *      message="You need to define values for at least one of Revenue Share and Fixed Commission Amount"
     * )
     * 
     * @ORM\Column(name="RevenueShare", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $RevenueShare = '0.0000';

    /**
     * @var string
     *
     * @Assert\Expression(
     *      expression="this.getFixedCommisionAmount() > 0 || this.getRevenueShare() > 0",
     *      message="You need to define values for at least one of Revenue Share and Fixed Commission Amount"
     * )
     * 
     * @ORM\Column(name="FixedCommisionAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $FixedCommisionAmount = '0.0000';
    
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\GreaterThan(value=0, message="Minimum NGR should be greater than 0")
     * 
     * @ORM\Column(name="MinimumNGR", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MinimumNGR = '0.0000';

    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsActive", type="boolean", nullable=false)
     */
    private $IsActive = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="WhichEverisHigher", type="boolean", nullable=false)
     */
    private $WhichEverisHigher = true;
    
    
//     /**
//      * @var boolean
//      *
//      * @ORM\Column(name="IsTakeHigher", type="boolean", nullable=false)
//      */
//     private $IsTakeHigher = true;

//     /**
//      * @var integer
//      *
//      * @Assert\NotBlank()
//      * 
//      * @ORM\Column(name="ProductId", type="bigint", nullable=false)
//      */
//     private $ProductId = '0';

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

//     /**
//      * @var integer
//      *
//      * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
//      */
//     private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\GreaterThan(value=0, message="Minimum Active Player should be greater than 0")
     * 
     * @ORM\Column(name="MinActivePlayer", type="integer", nullable=false)
     */
    private $MinActivePlayer = '0';
    
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
     * Many Affiliate Earning Plan has One Brand
     *
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;
    
    /**
     * @var integer
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
     * Set EarningPlanCode
     *
     * @param string $EarningPlanCode
     *
     * @return Affiliateearningplans
     */
    public function setEarningPlanCode($EarningPlanCode)
    {
        $this->EarningPlanCode = $EarningPlanCode;

        return $this;
    }

    /**
     * Get EarningPlanCode
     *
     * @return string
     */
    public function getEarningPlanCode()
    {
        return $this->EarningPlanCode;
    }

    /**
     * Set EarningPlanName
     *
     * @param string $EarningPlanName
     *
     * @return Affiliateearningplans
     */
    public function setEarningPlanName($EarningPlanName)
    {
        $this->EarningPlanName = $EarningPlanName;

        return $this;
    }

    /**
     * Get EarningPlanName
     *
     * @return string
     */
    public function getEarningPlanName()
    {
        return $this->EarningPlanName;
    }

    /**
     * Set EarningPlanDesc
     *
     * @param string $EarningPlanDesc
     *
     * @return Affiliateearningplans
     */
    public function setEarningPlanDesc($EarningPlanDesc)
    {
        $this->EarningPlanDesc = $EarningPlanDesc;

        return $this;
    }

    /**
     * Get EarningPlanDesc
     *
     * @return string
     */
    public function getEarningPlanDesc()
    {
        return $this->EarningPlanDesc;
    }

    /**
     * Set RevenueShare
     *
     * @param string $RevenueShare
     *
     * @return Affiliateearningplans
     */
    public function setRevenueshare($RevenueShare)
    {
        $this->RevenueShare = $RevenueShare;

        return $this;
    }

    /**
     * Get RevenueShare
     *
     * @return string
     */
    public function getRevenueShare()
    {
        return $this->RevenueShare;
    }

    /**
     * Set MinimumNGR
     *
     * @param string $MinimumNGR
     *
     * @return Affiliateearningplans
     */
    public function setMinimumNGR($MinimumNGR)
    {
        $this->MinimumNGR = $MinimumNGR;

        return $this;
    }

    /**
     * Get MinimumNGR
     *
     * @return string
     */
    public function getMinimumNGR()
    {
        return $this->MinimumNGR;
    }

    /**
     * Set FixedCommisionAmount
     *
     * @param string $FixedCommisionAmount
     *
     * @return Affiliateearningplans
     */
    public function setFixedCommisionAmount($FixedCommisionAmount)
    {
        $this->FixedCommisionAmount = $FixedCommisionAmount;

        return $this;
    }

    /**
     * Get FixedCommisionAmount
     *
     * @return string
     */
    public function getFixedCommisionAmount()
    {
        return $this->FixedCommisionAmount;
    }

    /**
     * Set IsActive
     *
     * @param boolean $IsActive
     *
     * @return Affiliateearningplans
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
     * Set WhichEverisHigher
     *
     * @param boolean $WhichEverisHigher
     *
     * @return Affiliateearningplans
     */
    public function setWhichEverisHigher($WhichEverisHigher)
    {
        $this->WhichEverisHigher = $WhichEverisHigher;
        
        return $this;
    }
    
    /**
     * Get WhichEverisHigher
     *
     * @return boolean
     */
    public function getWhichEverisHigher()
    {
        return $this->WhichEverisHigher;
    }

//     /**
//      * Set IsTakeHigher
//      *
//      * @param boolean $IsTakeHigher
//      *
//      * @return Affiliateearningplans
//      */
//     public function setIsTakeHigher($IsTakeHigher)
//     {
//         $this->IsTakeHigher = $IsTakeHigher;

//         return $this;
//     }

//     /**
//      * Get IsTakeHigher
//      *
//      * @return boolean
//      */
//     public function getIsTakeHigher()
//     {
//         return $this->IsTakeHigher;
//     }

//     /**
//      * Set ProductId
//      *
//      * @param integer $ProductId
//      *
//      * @return Affiliateearningplans
//      */
//     public function setProductId($ProductId)
//     {
//         $this->ProductId = $ProductId;

//         return $this;
//     }

//     /**
//      * Get ProductId
//      *
//      * @return integer
//      */
//     public function getProductId()
//     {
//         return $this->ProductId;
//     }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Affiliateearningplans
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
     * @return Affiliateearningplans
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
     * @return Affiliateearningplans
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
     * @return Affiliateearningplans
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
     * @return Affiliateearningplans
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

//     /**
//      * Set RollbaseId
//      *
//      * @param integer $RollbaseId
//      *
//      * @return Affiliateearningplans
//      */
//     public function setRollbaseId($RollbaseId)
//     {
//         $this->RollbaseId = $RollbaseId;

//         return $this;
//     }

//     /**
//      * Get RollbaseId
//      *
//      * @return integer
//      */
//     public function getRollbaseId()
//     {
//         return $this->RollbaseId;
//     }

    /**
     * Set MinActivePlayer
     *
     * @param integer $MinActivePlayer
     *
     * @return Affiliateearningplans
     */
    public function setMinActivePlayer($MinActivePlayer)
    {
        $this->MinActivePlayer = $MinActivePlayer;

        return $this;
    }

    /**
     * Get MinActivePlayer
     *
     * @return integer
     */
    public function getMinActivePlayer()
    {
        return $this->MinActivePlayer;
    }
    
    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Affiliateearningplans
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
     * @return Affiliateearningplans
     */
    public function setBrand(\PandoraBundle\Entity\Brands $Brand = null)
    {
        $this->Brand = $Brand;
        
        return $this;
    }
    
    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Affiliateearningplans
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
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Affiliateearningplans
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
