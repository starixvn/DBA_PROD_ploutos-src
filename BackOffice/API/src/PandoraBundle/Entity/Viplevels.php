<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Viplevels
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="VipLevelName")
 * @ORM\Table(name="VipLevels")
 * @UniqueEntity(fields={"VipLevelCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Viplevels extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Vip Level Code must be at least {{ limit }} characters long", maxMessage = "Vip Level Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="VipLevelCode", type="string", length=100, nullable=true)
     */
    private $VipLevelCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Vip Level Name must be at least {{ limit }} characters long", maxMessage = "Vip Level Name cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="VipLevelName", type="string", length=100, nullable=true)
     */
    private $VipLevelName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MinDeposit", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MinDeposit;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MaxDeposit", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MaxDeposit;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MaxAggDeposit", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MaxAggDeposit;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MinWithdrawal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MinWithdrawal;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MaxWithdrawal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MaxWithdrawal;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MaxAggWithdrawal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MaxAggWithdrawal;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="FraudCheck", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $FraudCheck;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsDefault", type="boolean", nullable=false)
     */
    private $IsDefault = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

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
     * One VIP Level to One Brand
     *
     * @ORM\OneToOne(targetEntity="Brands")
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
     * Set VipLevelCode
     *
     * @param string $VipLevelCode
     *
     * @return Viplevels
     */
    public function setVipLevelCode($VipLevelCode)
    {
        $this->VipLevelCode = $VipLevelCode;

        return $this;
    }

    /**
     * Get VipLevelCode
     *
     * @return string
     */
    public function getVipLevelCode()
    {
        return $this->VipLevelCode;
    }

    /**
     * Set VipLevelName
     *
     * @param string $VipLevelName
     *
     * @return Viplevels
     */
    public function setVipLevelName($VipLevelName)
    {
        $this->VipLevelName = $VipLevelName;

        return $this;
    }

    /**
     * Get VipLevelName
     *
     * @return string
     */
    public function getVipLevelName()
    {
        return $this->VipLevelName;
    }

    /**
     * Set MinDeposit
     *
     * @param string $MinDeposit
     *
     * @return Viplevels
     */
    public function setMinDeposit($MinDeposit)
    {
        $this->MinDeposit = $MinDeposit;

        return $this;
    }

    /**
     * Get MinDeposit
     *
     * @return string
     */
    public function getMinDeposit()
    {
        return $this->MinDeposit;
    }

    /**
     * Set MaxDeposit
     *
     * @param string $MaxDeposit
     *
     * @return Viplevels
     */
    public function setMaxDeposit($MaxDeposit)
    {
        $this->MaxDeposit = $MaxDeposit;

        return $this;
    }

    /**
     * Get MaxDeposit
     *
     * @return string
     */
    public function getMaxDeposit()
    {
        return $this->MaxDeposit;
    }

    /**
     * Set MaxAggDeposit
     *
     * @param string $MaxAggDeposit
     *
     * @return Viplevels
     */
    public function setMaxAggDeposit($MaxAggDeposit)
    {
        $this->MaxAggDeposit = $MaxAggDeposit;

        return $this;
    }

    /**
     * Get MaxAggDeposit
     *
     * @return string
     */
    public function getMaxAggDeposit()
    {
        return $this->MaxAggDeposit;
    }

    /**
     * Set MinWithdrawal
     *
     * @param string $MinWithdrawal
     *
     * @return Viplevels
     */
    public function setMinWithdrawal($MinWithdrawal)
    {
        $this->MinWithdrawal = $MinWithdrawal;

        return $this;
    }

    /**
     * Get MinWithdrawal
     *
     * @return string
     */
    public function getMinWithdrawal()
    {
        return $this->MinWithdrawal;
    }

    /**
     * Set MaxWithdrawal
     *
     * @param string $MaxWithdrawal
     *
     * @return Viplevels
     */
    public function setMaxWithdrawal($MaxWithdrawal)
    {
        $this->MaxWithdrawal = $MaxWithdrawal;

        return $this;
    }

    /**
     * Get MaxWithdrawal
     *
     * @return string
     */
    public function getMaxWithdrawal()
    {
        return $this->MaxWithdrawal;
    }

    /**
     * Set MaxAggWithdrawal
     *
     * @param string $MaxAggWithdrawal
     *
     * @return Viplevels
     */
    public function setMaxAggWithdrawal($MaxAggWithdrawal)
    {
        $this->MaxAggWithdrawal = $MaxAggWithdrawal;

        return $this;
    }

    /**
     * Get MaxAggWithdrawal
     *
     * @return string
     */
    public function getMaxAggWithdrawal()
    {
        return $this->MaxAggWithdrawal;
    }
    
    /**
     * Set FraudCheck
     *
     * @param string $FraudCheck
     *
     * @return Viplevels
     */
    public function setFraudCheck($FraudCheck)
    {
        $this->FraudCheck = $FraudCheck;

        return $this;
    }

    /**
     * Get FraudCheck
     *
     * @return string
     */
    public function getFraudCheck()
    {
        return $this->FraudCheck;
    }

    /**
     * Set IsDefault
     *
     * @param boolean $IsDefault
     *
     * @return Viplevels
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Viplevels
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
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Viplevels
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
     * @return Viplevels
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
     * @return Viplevels
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
     * @return Viplevels
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
     * @return Viplevels
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
     * @return Viplevels
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
     * @return Viplevels
     */
    public function setBrand(\PandoraBundle\Entity\Brands $Brand = null)
    {
        $this->Brand = $Brand;
    
        return $this;
    }
    
    /**
     * Get Brand
     *
     * @return \PandoraBundle\Entity\Brands $Brand
     */
    public function getBrand()
    {
        return $this->Brand;
	}
}
