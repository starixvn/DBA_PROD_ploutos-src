<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Paymentmethods
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="PaymentMethodName")
 * @ORM\Table(name="PaymentMethods")
 * @UniqueEntity(fields={"PaymentMethodCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Paymentmethods extends AbstractEntity
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
     * @ORM\Column(name="PaymentMethodCode", type="string", length=100, nullable=true)
     */
    private $PaymentMethodCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Payment Method Name must be at least {{ limit }} characters long", maxMessage = "Payment Method Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PaymentMethodName", type="string", length=100, nullable=true)
     */
    private $PaymentMethodName;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="PaymentRiskLevelId", type="bigint", nullable=false)
     */
    private $PaymentRiskLevelId = '0';
    
    /**
     *
     * One Payment Method to One Payment Payment Risk Level
     *
     * @ORM\ManyToOne(targetEntity="Paymentrisklevels")
     * @ORM\JoinColumn(name="PaymentRiskLevelId", referencedColumnName="Id")
     */
    private $PaymentRiskLevel;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="UniqueDepositAmountRuleId", type="bigint", nullable=false)
     */
    private $UniqueDepositAmountRuleId = '0';

    /**
     *
     * One Payment Method to One Unique Deposit Amount Rules
     *
     * @ORM\ManyToOne(targetEntity="Uniquedepositamountrules")
     * @ORM\JoinColumn(name="UniqueDepositAmountRuleId", referencedColumnName="Id")
     */
	private $UniqueDepositAmountRule;
	
    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsOnlinePayment", type="boolean", nullable=false)
     */
    private $IsOnlinePayment = false;

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
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $CurrencyId = '0';
    
    /**
     *
     * One Payment Method to One Currency
     *
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
    private $Currency;
    
    /**
     * @var string
     *
     * @ORM\Column(name="PaymentMethodDesc", type="text", length=65535, nullable=true)
     */
    private $PaymentMethodDesc;
    
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
     * @Assert\NotBlank()
     *
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;

    /**
     * Many Country have Many Payment Methods.
     * @ORM\ManyToMany(targetEntity="Countrys")
     * @ORM\JoinTable(name="CountryPaymentMethods",
     *      joinColumns={@ORM\JoinColumn(name="PaymentMethodId", referencedColumnName="Id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="CountryId", referencedColumnName="Id")}
     * )
     */
    private $PaymentMethodCountry;    

    public function __construct()
    {
        $this->PaymentMethodCountry = new ArrayCollection();
    }

    public function getPaymentMethodCountry()
    {
        return $this->PaymentMethodCountry;
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
     * Set PaymentMethodCode
     *
     * @param string $PaymentMethodCode
     *
     * @return Paymentmethods
     */
    public function setPaymentMethodCode($PaymentMethodCode)
    {
        $this->PaymentMethodCode = $PaymentMethodCode;

        return $this;
    }

    /**
     * Get PaymentMethodCode
     *
     * @return string
     */
    public function getPaymentMethodCode()
    {
        return $this->PaymentMethodCode;
    }

    /**
     * Set PaymentMethodName
     *
     * @param string $PaymentMethodName
     *
     * @return Paymentmethods
     */
    public function setPaymentMethodName($PaymentMethodName)
    {
        $this->PaymentMethodName = $PaymentMethodName;

        return $this;
    }

    /**
     * Get PaymentMethodName
     *
     * @return string
     */
    public function getPaymentMethodName()
    {
        return $this->PaymentMethodName;
    }

    /**
     * Set PaymentRiskLevelId
     *
     * @param integer $PaymentRiskLevelId
     *
     * @return Paymentmethods
     */
    public function setPaymentRiskLevelId($PaymentRiskLevelId)
    {
        $this->PaymentRiskLevelId = $PaymentRiskLevelId;

        return $this;
    }

    /**
     * Get PaymentRiskLevelId
     *
     * @return integer
     */
    public function getPaymentRiskLevelId()
    {
        return $this->PaymentRiskLevelId;
    }

    /**
     * Set UniqueDepositAmountRuleId
     *
     * @param integer $UniqueDepositAmountRuleId
     *
     * @return Paymentmethods
     */
    public function setUniqueDepositAmountRuleId($UniqueDepositAmountRuleId)
    {
        $this->UniqueDepositAmountRuleId = $UniqueDepositAmountRuleId;

        return $this;
    }

    /**
     * Get UniqueDepositAmountRuleId
     *
     * @return integer
     */
    public function getUniqueDepositAmountRuleId()
    {
        return $this->UniqueDepositAmountRuleId;
    }

    /**
     * Set IsOnlinePayment
     *
     * @param boolean $IsOnlinePayment
     *
     * @return Paymentmethods
     */
    public function setIsOnlinePayment($IsOnlinePayment)
    {
        $this->IsOnlinePayment = $IsOnlinePayment;

        return $this;
    }

    /**
     * Get IsOnlinePayment
     *
     * @return boolean
     */
    public function getIsOnlinePayment()
    {
        return $this->IsOnlinePayment;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Paymentmethods
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
     * @return Paymentmethods
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
     * @return Paymentmethods
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
     * @return Paymentmethods
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
     * @return Paymentmethods
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
     * @return Paymentmethods
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
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Paymentmethods
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
     * Set PaymentMethodDesc
     *
     * @param string $PaymentMethodDesc
     *
     * @return Paymentmethods
     */
    public function setPaymentMethodDesc($PaymentMethodDesc)
    {
        $this->PaymentMethodDesc = $PaymentMethodDesc;

        return $this;
    }

    /**
     * Get PaymentMethodDesc
     *
     * @return string
     */
    public function getPaymentMethodDesc()
    {
        return $this->PaymentMethodDesc;
    }
    
    /**
     * Set PaymentRiskLevel
     *
     * @param \PandoraBundle\Entity\Paymentrisklevels $PaymentRiskLevel
     *
     * @return Paymentmethods
     */
    public function setPaymentRiskLevel(\PandoraBundle\Entity\Paymentrisklevels $PaymentRiskLevel = null)
    {
        $this->PaymentRiskLevel = $PaymentRiskLevel;
        
        return $this;
    }
    
    /**
     * Get PaymentRiskLevel
     *
     * @return \PandoraBundle\Entity\Paymentrisklevels
     */
    public function getPaymentRiskLevel()
    {
        return $this->PaymentRiskLevel;
    }
    
    /**
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Paymentmethods
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
     * Set UniqueDepositAmountRule
     *
     * @param \PandoraBundle\Entity\Uniquedepositamountrules $UniqueDepositAmountRule
     *
     * @return Paymentmethods
     */
    public function setUniqueDepositAmountRule(\PandoraBundle\Entity\Uniquedepositamountrules $UniqueDepositAmountRule = null)
    {
        $this->UniqueDepositAmountRule = $UniqueDepositAmountRule;
        
        return $this;
    }
    
    /**
     * Get UniqueDepositAmountRule
     *
     * @return \PandoraBundle\Entity\Uniquedepositamountrules
     */
    public function getUniqueDepositAmountRule()
    {
        return $this->UniqueDepositAmountRule;
	}

    
    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Paymentmethods
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
     * @return Paymentmethods
     */
    public function setBrand(\PandoraBundle\Entity\Brands $Brand = null)
    {
        $this->Brand = $Brand;
        
        return $this;
    }
}
