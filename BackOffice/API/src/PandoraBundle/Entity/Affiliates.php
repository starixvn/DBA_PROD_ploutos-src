<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Affiliates
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="AffiliateName")
 * @ORM\Table(name="Affiliates", uniqueConstraints={@ORM\UniqueConstraint(name="AffiliateCode", columns={"AffiliateCode"}), @ORM\UniqueConstraint(name="UserName", columns={"UserName"}), @ORM\UniqueConstraint(name="UserId", columns={"UserId"}), @ORM\UniqueConstraint(name="PrimaryEmail", columns={"PrimaryEmail"})})
 * @ORM\Entity
 */
class Affiliates extends AbstractEntity
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
     * @ORM\Column(name="AffiliateCode", type="string", length=100, nullable=true)
     */
    private $AffiliateCode;

    /**
     * @var string
     *
     * @ORM\Column(name="AffiliateName", type="string", length=100, nullable=true)
     */
    private $AffiliateName;

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
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=30, nullable=true)
     */
    private $UserName;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="FullName", type="string", length=50, nullable=true)
     */
    private $FullName;

    /**
     * @var string
     *
     * @ORM\Column(name="PrimaryEmail", type="string", length=50, nullable=true)
     */
    private $PrimaryEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="SecondaryEmail", type="string", length=50, nullable=true)
     */
    private $SecondaryEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="PhoneCountryCodeNo", type="string", length=5, nullable=true)
     */
    private $PhoneCountryCodeNo;

    /**
     * @var string
     *
     * @ORM\Column(name="PhoneNo", type="string", length=20, nullable=true)
     */
    private $PhoneNo;

    /**
     * @var string
     *
     * @ORM\Column(name="WebsiteURL", type="string", length=500, nullable=true)
     */
    private $WebsiteURL;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrencyCode", type="string", length=10, nullable=true)
     */
    private $CurrencyCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="IM1", type="bigint", nullable=false)
     */
    private $IM1 = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="IM1UserName", type="string", length=50, nullable=true)
     */
    private $IM1UserName;

    /**
     * @var integer
     *
     * @ORM\Column(name="IM2", type="bigint", nullable=false)
     */
    private $IM2 = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="IM2UserName", type="string", length=50, nullable=true)
     */
    private $IM2UserName;

    /**
     * @var integer
     *
     * @ORM\Column(name="SecurityQuestionId", type="bigint", nullable=false)
     */
    private $SecurityQuestionId = '0';
    
    /**
     *
     * One Affiliate has One Security Question
     *
     * @ORM\ManyToOne(targetEntity="Securityquestions")
     * @ORM\JoinColumn(name="SecurityQuestionId", referencedColumnName="Id")
     */
    
    private $SecurityQuestion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="SecurityAnswer", type="string", length=50, nullable=true)
     */
    private $SecurityAnswer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="AgreedToCondition", type="boolean", nullable=false)
     */
    private $AgreedToCondition = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsLegalAge", type="boolean", nullable=false)
     */
    private $IsLegalAge = true;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="AffiliateStatusTypeEnum")
     * @ORM\Column(name="AffiliateStatus", type="integer", nullable=false)
     */
    private $AffiliateStatus = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WalletBalance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="CountryCode", type="string", length=30, nullable=true)
     */
    private $CountryCode;
    
    /**
     *
     * One Affiliate has One Country
     *
     * @ORM\ManyToOne(targetEntity="Countrys")
     * @ORM\JoinColumn(name="CountryCode", referencedColumnName="Id")
     */
    private $Country;
    
    /**
     * @var string
     *
     * @EnumFieldAnnotation(eNumClass="AffiliateTypeEnum")
     * @ORM\Column(name="AffiliateType", type="string", length=30, nullable=true)
     */
    private $AffiliateType;

    /**
     * @var string
     *
     * @ORM\Column(name="BankAccountName", type="string", length=100, nullable=true)
     */
    private $BankAccountName;

    /**
     * @var string
     *
     * @ORM\Column(name="BankAccountNumber", type="string", length=50, nullable=true)
     */
    private $BankAccountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="BankAccountBranch", type="string", length=50, nullable=true)
     */
    private $BankAccountBranch;

    /**
     * @var string
     *
     * @ORM\Column(name="BankAccountCity", type="string", length=50, nullable=true)
     */
    private $BankAccountCity;

    /**
     * @var string
     *
     * @ORM\Column(name="BankAccountProvince", type="string", length=50, nullable=true)
     */
    private $BankAccountProvince;

    /**
     * @var integer
     *
     * @ORM\Column(name="BankId", type="bigint", nullable=false)
     */
    private $BankId = '0';

 	/**
     *
     * One BankId has One BankName
     *
     * @ORM\ManyToOne(targetEntity="Banks")
     * @ORM\JoinColumn(name="BankId", referencedColumnName="Id")
     */
	private $BankName;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="EarningPlanId", type="bigint", nullable=false)
     */
    private $EarningPlanId = '0';

 	/**
     *
     * One BankId has One BankName
     *
     * @ORM\ManyToOne(targetEntity="Affiliateearningplans")
     * @ORM\JoinColumn(name="EarningPlanId", referencedColumnName="Id")
     */
	private $EarningPlanName;

    /**
     * @var string
     *
     * @EnumFieldAnnotation(eNumClass="SettlementPeriodTypeEnum")
     * @ORM\Column(name="SettlementPeriod", type="string", length=5, nullable=true)
     */
    private $SettlementPeriod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastLoginDate", type="datetime", nullable=true)
     */
    private $LastLoginDate;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusCode", type="string", length=50, nullable=true)
     */
    private $BonusCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';

    /**
     *
     * One Affiliate has One Brand
     *
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;


    /**
     * @var string
     *
     * @ORM\Column(name="MarketingCost", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $MarketingCost = '0.0000';


 	/**
     *
     * One IM has One Implatforms
     *
     * @ORM\ManyToOne(targetEntity="Implatforms")
     * @ORM\JoinColumn(name="IM1", referencedColumnName="Id")
     */
    private $IMPlatformName1;

 	/**
     *
     * One IM has One Implatforms
     *
     * @ORM\ManyToOne(targetEntity="Implatforms")
     * @ORM\JoinColumn(name="IM2", referencedColumnName="Id")
     */
    private $IMPlatformName2;



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
     * Set AffiliateCode
     *
     * @param string $AffiliateCode
     *
     * @return Affiliates
     */
    public function setAffiliateCode($AffiliateCode)
    {
        $this->AffiliateCode = $AffiliateCode;

        return $this;
    }

    /**
     * Get AffiliateCode
     *
     * @return string
     */
    public function getAffiliateCode()
    {
        return $this->AffiliateCode;
    }

    /**
     * Set AffiliateName
     *
     * @param string $AffiliateName
     *
     * @return Affiliates
     */
    public function setAffiliateName($AffiliateName)
    {
        $this->AffiliateName = $AffiliateName;

        return $this;
    }

    /**
     * Get AffiliateName
     *
     * @return string
     */
    public function getAffiliateName()
    {
        return $this->AffiliateName;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Affiliates
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
     * @return Affiliates
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
     * @return Affiliates
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
     * @return Affiliates
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
     * @return Affiliates
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
     * @return Affiliates
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
     * Set UserName
     *
     * @param string $UserName
     *
     * @return Affiliates
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;

        return $this;
    }

    /**
     * Get UserName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Affiliates
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set FullName
     *
     * @param string $FullName
     *
     * @return Affiliates
     */
    public function setFullName($FullName)
    {
        $this->FullName = $FullName;

        return $this;
    }

    /**
     * Get FullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->FullName;
    }

    /**
     * Set PrimaryEmail
     *
     * @param string $PrimaryEmail
     *
     * @return Affiliates
     */
    public function setPrimaryEmail($PrimaryEmail)
    {
        $this->PrimaryEmail = $PrimaryEmail;

        return $this;
    }

    /**
     * Get PrimaryEmail
     *
     * @return string
     */
    public function getPrimaryEmail()
    {
        return $this->PrimaryEmail;
    }

    /**
     * Set SecondaryEmail
     *
     * @param string $SecondaryEmail
     *
     * @return Affiliates
     */
    public function setSecondaryEmail($SecondaryEmail)
    {
        $this->SecondaryEmail = $SecondaryEmail;

        return $this;
    }

    /**
     * Get SecondaryEmail
     *
     * @return string
     */
    public function getSecondaryEmail()
    {
        return $this->SecondaryEmail;
    }

    /**
     * Set PhoneCountryCodeNo
     *
     * @param string $PhoneCountryCodeNo
     *
     * @return Affiliates
     */
    public function setPhoneCountryCodeNo($PhoneCountryCodeNo)
    {
        $this->PhoneCountryCodeNo = $PhoneCountryCodeNo;

        return $this;
    }

    /**
     * Get PhoneCountryCodeNo
     *
     * @return string
     */
    public function getPhoneCountryCodeNo()
    {
        return $this->PhoneCountryCodeNo;
    }

    /**
     * Set PhoneNo
     *
     * @param string $PhoneNo
     *
     * @return Affiliates
     */
    public function setPhoneNo($PhoneNo)
    {
        $this->PhoneNo = $PhoneNo;

        return $this;
    }

    /**
     * Get PhoneNo
     *
     * @return string
     */
    public function getPhoneNo()
    {
        return $this->PhoneNo;
    }

    /**
     * Set WebsiteURL
     *
     * @param string $WebsiteURL
     *
     * @return Affiliates
     */
    public function setWebsiteURL($WebsiteURL)
    {
        $this->WebsiteURL = $WebsiteURL;

        return $this;
    }

    /**
     * Get WebsiteURL
     *
     * @return string
     */
    public function getWebsiteURL()
    {
        return $this->WebsiteURL;
    }

    /**
     * Set CurrencyCode
     *
     * @param string $CurrencyCode
     *
     * @return Affiliates
     */
    public function setCurrencyCode($CurrencyCode)
    {
        $this->CurrencyCode = $CurrencyCode;

        return $this;
    }

    /**
     * Get CurrencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->CurrencyCode;
    }

    /**
     * Set IM1
     *
     * @param integer $IM1
     *
     * @return Affiliates
     */
    public function setIM1($IM1)
    {
        $this->IM1 = $IM1;

        return $this;
    }

    /**
     * Get IM1
     *
     * @return integer
     */
    public function getIM1()
    {
        return $this->IM1;
    }

    /**
     * Set IM1UserName
     *
     * @param string $IM1UserName
     *
     * @return Affiliates
     */
    public function setIM1UserName($IM1UserName)
    {
        $this->IM1UserName = $IM1UserName;

        return $this;
    }

    /**
     * Get IM1UserName
     *
     * @return string
     */
    public function getIM1UserName()
    {
        return $this->IM1UserName;
    }

    /**
     * Set IM2
     *
     * @param integer $IM2
     *
     * @return Affiliates
     */
    public function setIM2($IM2)
    {
        $this->IM2 = $IM2;

        return $this;
    }

    /**
     * Get IM2
     *
     * @return integer
     */
    public function getIM2()
    {
        return $this->IM2;
    }

    /**
     * Set IM2UserName
     *
     * @param string $IM2UserName
     *
     * @return Affiliates
     */
    public function setIM2UserName($IM2UserName)
    {
        $this->IM2UserName = $IM2UserName;

        return $this;
    }

    /**
     * Get IM2UserName
     *
     * @return string
     */
    public function getIM2UserName()
    {
        return $this->IM2UserName;
    }

    /**
     * Set SecurityQuestionId
     *
     * @param integer $SecurityQuestionId
     *
     * @return Affiliates
     */
    public function setSecurityQuestionId($SecurityQuestionId)
    {
        $this->SecurityQuestionId = $SecurityQuestionId;

        return $this;
    }

    /**
     * Get SecurityQuestionId
     *
     * @return integer
     */
    public function getSecurityQuestionId()
    {
        return $this->SecurityQuestionId;
    }

    /**
     * Set SecurityAnswer
     *
     * @param string $SecurityAnswer
     *
     * @return Affiliates
     */
    public function setSecurityAnswer($SecurityAnswer)
    {
        $this->SecurityAnswer = $SecurityAnswer;

        return $this;
    }

    /**
     * Get SecurityAnswer
     *
     * @return string
     */
    public function getSecurityAnswer()
    {
        return $this->SecurityAnswer;
    }

    /**
     * Set AgreedToCondition
     *
     * @param boolean $AgreedToCondition
     *
     * @return Affiliates
     */
    public function setAgreedToCondition($AgreedToCondition)
    {
        $this->AgreedToCondition = $AgreedToCondition;

        return $this;
    }

    /**
     * Get AgreedToCondition
     *
     * @return boolean
     */
    public function getAgreedToCondition()
    {
        return $this->AgreedToCondition;
    }

    /**
     * Set IsLegalAge
     *
     * @param boolean $IsLegalAge
     *
     * @return Affiliates
     */
    public function setIsLegalAge($IsLegalAge)
    {
        $this->IsLegalAge = $IsLegalAge;

        return $this;
    }

    /**
     * Get IsLegalAge
     *
     * @return boolean
     */
    public function getIsLegalAge()
    {
        return $this->IsLegalAge;
    }

    /**
     * Set AffiliateStatus
     *
     * @param integer $AffiliateStatus
     *
     * @return Affiliates
     */
    public function setAffiliateStatus($AffiliateStatus)
    {
        $this->AffiliateStatus = $AffiliateStatus;

        return $this;
    }

    /**
     * Get AffiliateStatus
     *
     * @return integer
     */
    public function getAffiliateStatus()
    {
        return $this->AffiliateStatus;
    }

    /**
     * Set WalletBalance
     *
     * @param string $WalletBalance
     *
     * @return Affiliates
     */
    public function setWalletBalance($WalletBalance)
    {
        $this->WalletBalance = $WalletBalance;

        return $this;
    }

    /**
     * Get WalletBalance
     *
     * @return string
     */
    public function getWalletBalance()
    {
        return $this->WalletBalance;
    }

    /**
     * Set CountryCode
     *
     * @param string $CountryCode
     *
     * @return Affiliates
     */
    public function setCountryCode($CountryCode)
    {
        $this->CountryCode = $CountryCode;

        return $this;
    }

    /**
     * Get CountryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    /**
     * Set AffiliateType
     *
     * @param string $AffiliateType
     *
     * @return Affiliates
     */
    public function setAffiliateType($AffiliateType)
    {
        $this->AffiliateType = $AffiliateType;

        return $this;
    }

    /**
     * Get AffiliateType
     *
     * @return string
     */
    public function getAffiliateType()
    {
        return $this->AffiliateType;
    }

    /**
     * Set BankAccountName
     *
     * @param string $BankAccountName
     *
     * @return Affiliates
     */
    public function setBankAccountName($BankAccountName)
    {
        $this->BankAccountName = $BankAccountName;

        return $this;
    }

    /**
     * Get BankAccountName
     *
     * @return string
     */
    public function getBankAccountName()
    {
        return $this->BankAccountName;
    }

    /**
     * Set BankAccountNumber
     *
     * @param string $BankAccountNumber
     *
     * @return Affiliates
     */
    public function setBankAccountNumber($BankAccountNumber)
    {
        $this->BankAccountNumber = $BankAccountNumber;

        return $this;
    }

    /**
     * Get BankAccountNumber
     *
     * @return string
     */
    public function getBankAccountNumber()
    {
        return $this->BankAccountNumber;
    }

    /**
     * Set BankAccountBranch
     *
     * @param string $BankAccountBranch
     *
     * @return Affiliates
     */
    public function setBankAccountBranch($BankAccountBranch)
    {
        $this->BankAccountBranch = $BankAccountBranch;

        return $this;
    }

    /**
     * Get BankAccountBranch
     *
     * @return string
     */
    public function getBankAccountBranch()
    {
        return $this->BankAccountBranch;
    }

    /**
     * Set BankAccountCity
     *
     * @param string $BankAccountCity
     *
     * @return Affiliates
     */
    public function setBankAccountCity($BankAccountCity)
    {
        $this->BankAccountCity = $BankAccountCity;

        return $this;
    }

    /**
     * Get BankAccountCity
     *
     * @return string
     */
    public function getBankAccountCity()
    {
        return $this->BankAccountCity;
    }

    /**
     * Set BankAccountProvince
     *
     * @param string $BankAccountProvince
     *
     * @return Affiliates
     */
    public function setBankAccountProvince($BankAccountProvince)
    {
        $this->BankAccountProvince = $BankAccountProvince;

        return $this;
    }

    /**
     * Get BankAccountProvince
     *
     * @return string
     */
    public function getBankAccountProvince()
    {
        return $this->BankAccountProvince;
    }

    /**
     * Set BankId
     *
     * @param integer $BankId
     *
     * @return Affiliates
     */
    public function setBankId($BankId)
    {
        $this->BankId = $BankId;

        return $this;
    }

    /**
     * Get BankId
     *
     * @return integer
     */
    public function getBankId()
    {
        return $this->BankId;
    }

    /**
     * Set EarningPlanId
     *
     * @param integer $EarningPlanId
     *
     * @return Affiliates
     */
    public function setEarningPlanId($EarningPlanId)
    {
        $this->EarningPlanId = $EarningPlanId;

        return $this;
    }

    /**
     * Get EarningPlanId
     *
     * @return integer
     */
    public function getEarningPlanId()
    {
        return $this->EarningPlanId;
    }

    /**
     * Set SettlementPeriod
     *
     * @param string $SettlementPeriod
     *
     * @return Affiliates
     */
    public function setSettlementPeriod($SettlementPeriod)
    {
        $this->SettlementPeriod = $SettlementPeriod;

        return $this;
    }

    /**
     * Get SettlementPeriod
     *
     * @return string
     */
    public function getSettlementPeriod()
    {
        return $this->SettlementPeriod;
    }

//     /**
//      * Set WorkFlowStatus
//      *
//      * @param string $WorkFlowStatus
//      *
//      * @return Affiliates
//      */
//     public function setWorkFlowStatus($WorkFlowStatus)
//     {
//         $this->WorkFlowStatus = WorkFlowStatus;

//         return $this;
//     }

//     /**
//      * Get WorkFlowStatus
//      *
//      * @return string
//      */
//     public function getWorkFlowStatus()
//     {
//         return $this->WorkFlowStatus;
//     }

    /**
     * Set LastLoginDate
     *
     * @param \DateTime $LastLoginDate
     *
     * @return Affiliates
     */
    public function setLastLoginDate($LastLoginDate)
    {
        $this->LastLoginDate = $LastLoginDate;

        return $this;
    }

    /**
     * Get LastLoginDate
     *
     * @return \DateTime
     */
    public function getLastLoginDate()
    {
        return $this->LastLoginDate;
    }

    /**
     * Set BonusCode
     *
     * @param string $BonusCode
     *
     * @return Affiliates
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
     * @return Affiliates
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
     * Set MarketingCost
     *
     * @param string $MarketingCost
     *
     * @return Affiliates
     */
    public function setMarketingCost($MarketingCost)
    {
        $this->MarketingCost = $MarketingCost;

        return $this;
    }

    /**
     * Get MarketingCost
     *
     * @return string
     */
    public function getMarketingCost()
    {
        return $this->MarketingCost;
    }

    /**
     * Set IMPlatformName1
     *
     * @param \PandoraBundle\Entity\Implatforms $IMPlatformName1
     *
     * @return Affiliates
     */
    public function setIMPlatformName1(\PandoraBundle\Entity\Implatforms $IMPlatformName1 = null)
    {
        $this->IMPlatformName1 = $IMPlatformName1;

        return $this;
    }

    /**
     * Get IMPlatformName1
     *
     * @return \PandoraBundle\Entity\Implatforms
     */
    public function getIMPlatformName1()
    {
        return $this->IMPlatformName1;
    }

    /**
     * Set IMPlatformName2
     *
     * @param \PandoraBundle\Entity\Implatforms $IMPlatformName2
     *
     * @return Affiliates
     */
    public function setIMPlatformName2(\PandoraBundle\Entity\Implatforms $IMPlatformName2 = null)
    {
        $this->IMPlatformName2 = $IMPlatformName2;

        return $this;
    }

    /**
     * Get IMPlatformName2
     *
     * @return \PandoraBundle\Entity\Implatforms
     */
    public function getIMPlatformName2()
    {
        return $this->IMPlatformName2;
    }

    /**
     * Set EarningPlanName
     *
     * @param \PandoraBundle\Entity\Affiliateearningplans $EarningPlanName
     *
     * @return Affiliates
     */
    public function setEarningPlanName(\PandoraBundle\Entity\Affiliateearningplans $EarningPlanName = null)
    {
        $this->EarningPlanName = $EarningPlanName;

        return $this;
    }

    /**
     * Get EarningPlanName
     *
     * @return \PandoraBundle\Entity\Affiliateearningplans
     */
    public function getEarningPlanName()
    {
        return $this->EarningPlanName;
    }

    /**
     * Set BankName
     *
     * @param \PandoraBundle\Entity\Banks $BankName
     *
     * @return Affiliates
     */
    public function setBankName(\PandoraBundle\Entity\Banks $BankName = null)
    {
        $this->BankName = $BankName;

        return $this;
    }

    /**
     * Get BankName
     *
     * @return \PandoraBundle\Entity\Banks
     */
    public function getBankName()
    {
        return $this->BankName;
    }
    
    /**
     * Set SecurityQuestion
     *
     * @param \PandoraBundle\Entity\Securityquestions $SecurityQuestion
     *
     * @return Affiliates
     */
    public function setSecurityQuestion(\PandoraBundle\Entity\Securityquestions $SecurityQuestion = null)
    {
        $this->SecurityQuestion = $SecurityQuestion;
        
        return $this;
    }
    
    /**
     * Get SecurityQuestion
     *
     * @return \PandoraBundle\Entity\Securityquestions
     */
    public function getSecurityQuestion()
    {
        return $this->SecurityQuestion;
    }
    
    /**
     * Set Country
     *
     * @param \PandoraBundle\Entity\Countrys $Country
     *
     * @return Affiliates
     */
    public function setCountry(\PandoraBundle\Entity\Countrys $Country = null)
    {
        $this->Country = $Country;
        
        return $this;
    }
    
    /**
     * Get Country
     *
     * @return \PandoraBundle\Entity\Countrys
     */
    public function getCountry()
    {
        return $this->Country;
    }
}
