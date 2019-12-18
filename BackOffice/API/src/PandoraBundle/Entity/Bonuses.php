<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Bonuses
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="BonusName")
 * @ORM\Table(name="Bonuses", uniqueConstraints={@ORM\UniqueConstraint(name="BonusCode", columns={"BonusCode"})})
 * @ORM\Entity
 */
class Bonuses extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Bonus Code must be at least {{ limit }} characters long", maxMessage = "Bonus Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BonusCode", type="string", length=100, nullable=true)
     */
    private $BonusCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100, minMessage = "Bonus Name must be at least {{ limit }} characters long", maxMessage = "Bonus Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BonusName", type="string", length=100, nullable=true)
     */
    private $BonusName;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusDesc", type="string", length=100, nullable=true)
     */
    private $BonusDesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';
    
    /**
     *
     * Many Bonuses to Brand
     *
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="VIPLevelId", type="bigint", nullable=false)
     */
    private $VIPLevelId = '0';
    
    /**
     *
     * Many Bonuses to one VIP Level
     *
     * @ORM\ManyToOne(targetEntity="Viplevels")
     * @ORM\JoinColumn(name="VIPLevelId", referencedColumnName="Id")
     */
    private $VIPLevel;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ValidStartDate", type="datetime", nullable=true)
     */
    private $ValidStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ValidEndDate", type="datetime", nullable=true)
     */
    private $ValidEndDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsActiveBonus", type="boolean", nullable=false)
     */
    private $IsActiveBonus = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="BonusType", type="integer", nullable=true)
     */
    private $BonusType;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusTypeCode", type="string", length=50, nullable=true)
     */
    private $BonusTypeCode;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusTypeName", type="string", length=100, nullable=true)
     */
    private $BonusTypeName;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="BonusValueTypeEnum")
     * @ORM\Column(name="BonusValueType", type="integer", nullable=true)
     */
    private $BonusValueType;

    /**
     * @var string
     *
     * @ORM\Column(name="MinDepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MinDepositAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BonusAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="PercentAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $PercentAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="LimitAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $LimitAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="MaxNumberOfPlayer", type="integer", nullable=true)
     */
    private $MaxNumberOfPlayer;

    /**
     * @var integer
     *
     * @ORM\Column(name="MinDaysRegistered", type="integer", nullable=true)
     */
    private $MinDaysRegistered;

    /**
     * @var string
     *
     * @ORM\Column(name="WageringFactor", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringFactor;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="BonusFactorBasisTypeEnum")
     * @ORM\Column(name="BonusFactorBasis", type="integer", nullable=true)
     */
    private $BonusFactorBasis;

    /**
     * @var integer
     *
     * @ORM\Column(name="NumberOfPlayersAvailed", type="integer", nullable=true)
     */
    private $NumberOfPlayersAvailed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsOneTimeUsed", type="boolean", nullable=false)
     */
    private $IsOneTimeUsed = true;

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
     * @ORM\Column(name="ShowToPlayer", type="boolean", nullable=false)
     */
    private $ShowToPlayer = true;

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
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Bonuses
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
    
    
    /**
     * Set VIPLevel
     *
     * @param \PandoraBundle\Entity\Viplevels $VIPLevel
     *
     * @return Bonuses
     */
    public function setVIPLevel(\PandoraBundle\Entity\Viplevels $VIPLevel = null)
    {
        $this->VIPLevel = $VIPLevel;
        
        return $this;
    }
    
    /**
     * Get VIPLevel
     *
     * @return \PandoraBundle\Entity\Viplevels
     */
    public function getVIPLevel()
    {
        return $this->VIPLevel;
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
     * Set BonusCode
     *
     * @param string $BonusCode
     *
     * @return Bonuses
     */
    public function setBonusCode($BonusCode)
    {
        $this->BonusCode = $BonusCode;

        return $this;
    }

    /**
     * Get BonusCode
     *
     * @return string
     */
    public function getBonusCode()
    {
        return $this->BonusCode;
    }

    /**
     * Set BonusName
     *
     * @param string $BonusName
     *
     * @return Bonuses
     */
    public function setBonusName($BonusName)
    {
        $this->BonusName = $BonusName;

        return $this;
    }

    /**
     * Get BonusName
     *
     * @return string
     */
    public function getBonusName()
    {
        return $this->BonusName;
    }

    /**
     * Set BonusDesc
     *
     * @param string $BonusDesc
     *
     * @return Bonuses
     */
    public function setBonusDesc($BonusDesc)
    {
        $this->BonusDesc = $BonusDesc;

        return $this;
    }

    /**
     * Get BonusDesc
     *
     * @return string
     */
    public function getBonusDesc()
    {
        return $this->BonusDesc;
    }

    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Bonuses
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
     * Set VIPLevelId
     *
     * @param integer $VIPLevelId
     *
     * @return Bonuses
     */
    public function setVIPLevelId($VIPLevelId)
    {
        $this->VIPLevelId = $VIPLevelId;

        return $this;
    }

    /**
     * Get VIPLevelId
     *
     * @return integer
     */
    public function getVIPLevelId()
    {
        return $this->VIPLevelId;
    }

    /**
     * Set ValidStartDate
     *
     * @param \DateTime $ValidStartDate
     *
     * @return Bonuses
     */
    public function setValidStartDate($ValidStartDate)
    {
        $this->ValidStartDate = $ValidStartDate;

        return $this;
    }

    /**
     * Get ValidStartDate
     *
     * @return \DateTime
     */
    public function getValidStartDate()
    {
        return $this->ValidStartDate;
    }

    /**
     * Set ValidEndDate
     *
     * @param \DateTime $ValidEndDate
     *
     * @return Bonuses
     */
    public function setValidEndDate($ValidEndDate)
    {
        $this->ValidEndDate = $ValidEndDate;

        return $this;
    }

    /**
     * Get ValidEndDate
     *
     * @return \DateTime
     */
    public function getValidEndDate()
    {
        return $this->ValidEndDate;
    }

    /**
     * Set IsActiveBonus
     *
     * @param boolean $IsActiveBonus
     *
     * @return Bonuses
     */
    public function setIsActiveBonus($IsActiveBonus)
    {
        $this->IsActiveBonus = $IsActiveBonus;

        return $this;
    }

    /**
     * Get IsActiveBonus
     *
     * @return boolean
     */
    public function getIsActiveBonus()
    {
        return $this->IsActiveBonus;
    }

    /**
     * Set BonusType
     *
     * @param integer $BonusType
     *
     * @return Bonuses
     */
    public function setBonusType($BonusType)
    {
        $this->BonusType = $BonusType;

        return $this;
    }

    /**
     * Get BonusType
     *
     * @return integer
     */
    public function getBonusType()
    {
        return $this->BonusType;
    }

    /**
     * Set BonusTypeCode
     *
     * @param string $BonusTypeCode
     *
     * @return Bonuses
     */
    public function setBonusTypeCode($BonusTypeCode)
    {
        $this->BonusTypeCode = $BonusTypeCode;

        return $this;
    }

    /**
     * Get BonusTypeCode
     *
     * @return string
     */
    public function getBonusTypeCode()
    {
        return $this->BonusTypeCode;
    }

    /**
     * Set BonusTypeName
     *
     * @param string $BonusTypeName
     *
     * @return Bonuses
     */
    public function setBonusTypeName($BonusTypeName)
    {
        $this->BonusTypeName = $BonusTypeName;

        return $this;
    }

    /**
     * Get BonusTypeName
     *
     * @return string
     */
    public function getBonusTypeName()
    {
        return $this->BonusTypeName;
    }

    /**
     * Set BonusValueType
     *
     * @param integer $BonusValueType
     *
     * @return Bonuses
     */
    public function setBonusValueType($BonusValueType)
    {
        $this->BonusValueType = $BonusValueType;

        return $this;
    }

    /**
     * Get BonusValueType
     *
     * @return integer
     */
    public function getBonusValueType()
    {
        return $this->BonusValueType;
    }

    /**
     * Set MinDepositAmount
     *
     * @param string $MinDepositAmount
     *
     * @return Bonuses
     */
    public function setMinDepositAmount($MinDepositAmount)
    {
        $this->MinDepositAmount = $MinDepositAmount;

        return $this;
    }

    /**
     * Get MinDepositAmount
     *
     * @return string
     */
    public function getMinDepositAmount()
    {
        return $this->MinDepositAmount;
    }

    /**
     * Set BonusAmount
     *
     * @param string $BonusAmount
     *
     * @return Bonuses
     */
    public function setBonusAmount($BonusAmount)
    {
        $this->BonusAmount = $BonusAmount;

        return $this;
    }

    /**
     * Get BonusAmount
     *
     * @return string
     */
    public function getBonusAmount()
    {
        return $this->BonusAmount;
    }

    /**
     * Set PercentAmount
     *
     * @param string $PercentAmount
     *
     * @return Bonuses
     */
    public function setPercentAmount($PercentAmount)
    {
        $this->PercentAmount = $PercentAmount;

        return $this;
    }

    /**
     * Get PercentAmount
     *
     * @return string
     */
    public function getPercentAmount()
    {
        return $this->PercentAmount;
    }

    /**
     * Set LimitAmount
     *
     * @param string $LimitAmount
     *
     * @return Bonuses
     */
    public function setLimitAmount($LimitAmount)
    {
        $this->LimitAmount = $LimitAmount;

        return $this;
    }

    /**
     * Get LimitAmount
     *
     * @return string
     */
    public function getLimitAmount()
    {
        return $this->LimitAmount;
    }

    /**
     * Set MaxNumberOfPlayer
     *
     * @param integer $MaxNumberOfPlayer
     *
     * @return Bonuses
     */
    public function setMaxNumberOfPlayer($MaxNumberOfPlayer)
    {
        $this->MaxNumberOfPlayer = $MaxNumberOfPlayer;

        return $this;
    }

    /**
     * Get MaxNumberOfPlayer
     *
     * @return integer
     */
    public function getMaxNumberOfPlayer()
    {
        return $this->MaxNumberOfPlayer;
    }

    /**
     * Set MinDaysRegistered
     *
     * @param integer $MinDaysRegistered
     *
     * @return Bonuses
     */
    public function setMinDaysRegistered($MinDaysRegistered)
    {
        $this->MinDaysRegistered = $MinDaysRegistered;

        return $this;
    }

    /**
     * Get MinDaysRegistered
     *
     * @return integer
     */
    public function getMinDaysRegistered()
    {
        return $this->MinDaysRegistered;
    }

    /**
     * Set WageringFactor
     *
     * @param string $WageringFactor
     *
     * @return Bonuses
     */
    public function setWageringFactor($WageringFactor)
    {
        $this->WageringFactor = $WageringFactor;

        return $this;
    }

    /**
     * Get WageringFactor
     *
     * @return string
     */
    public function getWageringFactor()
    {
        return $this->WageringFactor;
    }

    /**
     * Set BonusFactorBasis
     *
     * @param integer $BonusFactorBasis
     *
     * @return Bonuses
     */
    public function setBonusFactorBasis($BonusFactorBasis)
    {
        $this->BonusFactorBasis = $BonusFactorBasis;

        return $this;
    }

    /**
     * Get BonusFactorBasis
     *
     * @return integer
     */
    public function getBonusFactorBasis()
    {
        return $this->BonusFactorBasis;
    }

    /**
     * Set NumberOfPlayersAvailed
     *
     * @param integer $NumberOfPlayersAvailed
     *
     * @return Bonuses
     */
    public function setNumberOfPlayersAvailed($NumberOfPlayersAvailed)
    {
        $this->NumberOfPlayersAvailed = $NumberOfPlayersAvailed;

        return $this;
    }

    /**
     * Get NumberOfPlayersAvailed
     *
     * @return integer
     */
    public function getNumberOfPlayersAvailed()
    {
        return $this->NumberOfPlayersAvailed;
    }

    /**
     * Set IsOneTimeUsed
     *
     * @param boolean $IsOneTimeUsed
     *
     * @return Bonuses
     */
    public function setIsOneTimeUsed($IsOneTimeUsed)
    {
        $this->IsOneTimeUsed = $IsOneTimeUsed;

        return $this;
    }

    /**
     * Get IsOneTimeUsed
     *
     * @return boolean
     */
    public function getIsOneTimeUsed()
    {
        return $this->IsOneTimeUsed;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Bonuses
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
     * @return Bonuses
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
     * @return Bonuses
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
     * @return Bonuses
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
     * @return Bonuses
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
     * @return Bonuses
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
     * Set ShowToPlayer
     *
     * @param boolean $ShowToPlayer
     *
     * @return Bonuses
     */
    public function setShowToPlayer($ShowToPlayer)
    {
        $this->ShowToPlayer = $ShowToPlayer;

        return $this;
    }

    /**
     * Get ShowToPlayer
     *
     * @return boolean
     */
    public function getShowToPlayer()
    {
        return $this->ShowToPlayer;
    }

    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Bonuses
     */
    public function setCurrencyId($CurrencyId)
    {
        $this->CurrencyId = $CurrencyId;

        return $this;
    }

    /**
     * Get Currency
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->CurrencyId;
    }
    
    /**
     * Set Brand
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Bonuses
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
