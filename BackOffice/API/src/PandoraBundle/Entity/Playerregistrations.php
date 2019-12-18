<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Playerregistrations
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="UserAccountNo")
 * @ORM\Table(name="PlayerRegistrations", uniqueConstraints={@ORM\UniqueConstraint(name="UserName", columns={"UserName"})})
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\PlayerRegistrationRepository")
 */
class Playerregistrations
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
     * @ORM\Column(name="UserAccountNo", type="string", length=50, nullable=true)
     */
    private $UserAccountNo;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $UserName;

    /**
     * @var string
     *
     * @ORM\Column(name="MobileCountryCode", type="string", length=20, nullable=true)
     */
    private $MobileCountryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="MobileNo", type="string", length=20, nullable=true)
     */
    private $MobileNo;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=100, nullable=true)
     */
    private $Email;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrencyCode", type="string", length=20, nullable=true)
     */
    private $CurrencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="RefferalCode", type="string", length=20, nullable=true)
     */
    private $RefferalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="IPAddress", type="string", length=20, nullable=true)
     */
    private $IPAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="BrandCode", type="string", length=20, nullable=true)
     */
    private $BrandCode;

    /**
     * @var string
     *
     * @ORM\Column(name="LanguageCode", type="string", length=10, nullable=true)
     */
    private $LanguageCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRegisterStatus", type="integer", nullable=true)
     */
    private $PlayerRegisterStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="VerificationCode", type="string", length=50, nullable=true)
     */
    private $VerificationCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=true)
     */
    private $RollbaseId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsVerified", type="boolean", nullable=false)
     */
    private $IsVerified = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsMobileVerified", type="boolean", nullable=false)
     */
    private $IsMobileVerified = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsEmailVerified", type="boolean", nullable=false)
     */
    private $IsEmailVerified = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsCreatedFromBackOffice", type="boolean", nullable=false)
     */
    private $IsCreatedFromBackOffice = true;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="PlayerTypeEnum")
     * @ORM\Column(name="PlayerType", type="integer", nullable=true)
     */
    private $PlayerType = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedChangePasword", type="boolean", nullable=false)
     */
    private $NeedChangePasword = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = true;

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
     * @ORM\Column(name="AffiliateId", type="bigint", nullable=false)
     */
    private $AffiliateId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="SignupCode", type="string", length=20, nullable=true)
     */
    private $SignupCode;

    /**
     * @var string
     *
     * @ORM\Column(name="LastLoginIPAddress", type="string", length=20, nullable=true)
     */
    private $LastLoginIPAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="Platform", type="string", length=5, nullable=true)
     */
    private $Platform;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastLoginTime", type="datetime", nullable=true)
     */
    private $LastLoginTime;

    /**
     * @var string
     *
     * @ORM\Column(name="SrcUrl", type="text", nullable=true)
     */
    private $SrcUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $CurrencyId = '0';



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set UserAccountNo
     *
     * @param string $UserAccountNo
     *
     * @return Playerregistrations
     */
    public function setUserAccountNo($UserAccountNo)
    {
        $this->UserAccountNo = $UserAccountNo;

        return $this;
    }

    /**
     * Get UserAccountNo
     *
     * @return string
     */
    public function getUserAccountNo()
    {
        return $this->UserAccountNo;
    }

    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Playerregistrations
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
     * Set UserName
     *
     * @param string $UserName
     *
     * @return Playerregistrations
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
     * Set MobileCountryCode
     *
     * @param string $MobileCountryCode
     *
     * @return Playerregistrations
     */
    public function setMobileCountryCode($MobileCountryCode)
    {
        $this->MobileCountryCode = $MobileCountryCode;

        return $this;
    }

    /**
     * Get MobileCountryCode
     *
     * @return string
     */
    public function getMobileCountryCode()
    {
        return $this->MobileCountryCode;
    }

    /**
     * Set MobileNo
     *
     * @param string $MobileNo
     *
     * @return Playerregistrations
     */
    public function setMobileNo($MobileNo)
    {
        $this->MobileNo = $MobileNo;

        return $this;
    }

    /**
     * Get MobileNo
     *
     * @return string
     */
    public function getMobileNo()
    {
        return $this->MobileNo;
    }

    /**
     * Set Email
     *
     * @param string $Email
     *
     * @return Playerregistrations
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set CurrencyCode
     *
     * @param string $CurrencyCode
     *
     * @return Playerregistrations
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
     * Set RefferalCode
     *
     * @param string $RefferalCode
     *
     * @return Playerregistrations
     */
    public function setRefferalCode($RefferalCode)
    {
        $this->RefferalCode = $RefferalCode;

        return $this;
    }

    /**
     * Get RefferalCode
     *
     * @return string
     */
    public function getRefferalCode()
    {
        return $this->RefferalCode;
    }

    /**
     * Set IPAddress
     *
     * @param string $IPAddress
     *
     * @return Playerregistrations
     */
    public function setIPAddress($IPAddress)
    {
        $this->IPAddress = $IPAddress;

        return $this;
    }

    /**
     * Get IPAddress
     *
     * @return string
     */
    public function getIPAddress()
    {
        return $this->IPAddress;
    }

    /**
     * Set BrandCode
     *
     * @param string $BrandCode
     *
     * @return Playerregistrations
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
     * Set LanguageCode
     *
     * @param string $LanguageCode
     *
     * @return Playerregistrations
     */
    public function setLanguageCode($LanguageCode)
    {
        $this->LanguageCode = $LanguageCode;

        return $this;
    }

    /**
     * Get LanguageCode
     *
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->LanguageCode;
    }

    /**
     * Set PlayerRegisterStatus
     *
     * @param integer $PlayerRegisterStatus
     *
     * @return Playerregistrations
     */
    public function setPlayerRegisterStatus($PlayerRegisterStatus)
    {
        $this->PlayerRegisterStatus = $PlayerRegisterStatus;

        return $this;
    }

    /**
     * Get PlayerRegisterStatus
     *
     * @return integer
     */
    public function getPlayerRegisterStatus()
    {
        return $this->PlayerRegisterStatus;
    }

    /**
     * Set VerificationCode
     *
     * @param string $VerificationCode
     *
     * @return Playerregistrations
     */
    public function setVerificationCode($VerificationCode)
    {
        $this->VerificationCode = $VerificationCode;

        return $this;
    }

    /**
     * Get VerificationCode
     *
     * @return string
     */
    public function getVerificationCode()
    {
        return $this->VerificationCode;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Playerregistrations
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
     * Set IsVerified
     *
     * @param boolean $IsVerified
     *
     * @return Playerregistrations
     */
    public function setIsVerified($IsVerified)
    {
        $this->IsVerified = $IsVerified;

        return $this;
    }

    /**
     * Get IsVerified
     *
     * @return boolean
     */
    public function getIsVerified()
    {
        return $this->IsVerified;
    }

    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Playerregistrations
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
     * Set IsMobileVerified
     *
     * @param boolean $IsMobileVerified
     *
     * @return Playerregistrations
     */
    public function setIsMobileVerified($IsMobileVerified)
    {
        $this->IsMobileVerified = $IsMobileVerified;

        return $this;
    }

    /**
     * Get IsMobileVerified
     *
     * @return boolean
     */
    public function getIsMobileVerified()
    {
        return $this->IsMobileVerified;
    }

    /**
     * Set IsEmailVerified
     *
     * @param boolean $IsEmailVerified
     *
     * @return Playerregistrations
     */
    public function setIsEmailVerified($IsEmailVerified)
    {
        $this->IsEmailVerified = $IsEmailVerified;

        return $this;
    }

    /**
     * Get IsEmailVerified
     *
     * @return boolean
     */
    public function getIsEmailVerified()
    {
        return $this->IsEmailVerified;
    }

    /**
     * Set IsCreatedFromBackOffice
     *
     * @param boolean $IsCreatedFromBackOffice
     *
     * @return Playerregistrations
     */
    public function setIsCreatedFromBackOffice($IsCreatedFromBackOffice)
    {
        $this->IsCreatedFromBackOffice = $IsCreatedFromBackOffice;

        return $this;
    }

    /**
     * Get IsCreatedFromBackOffice
     *
     * @return boolean
     */
    public function getIsCreatedFromBackOffice()
    {
        return $this->IsCreatedFromBackOffice;
    }

    /**
     * Set PlayerType
     *
     * @param integer $PlayerType
     *
     * @return Playerregistrations
     */
    public function setPlayerType($PlayerType)
    {
        $this->PlayerType = $PlayerType;

        return $this;
    }

    /**
     * Get PlayerType
     *
     * @return integer
     */
    public function getPlayerType()
    {
        return $this->PlayerType;
    }

    /**
     * Set NeedChangePasword
     *
     * @param boolean $NeedChangePasword
     *
     * @return Playerregistrations
     */
    public function setNeedChangePasword($NeedChangePasword)
    {
        $this->NeedChangePasword = $NeedChangePasword;

        return $this;
    }

    /**
     * Get NeedChangePasword
     *
     * @return boolean
     */
    public function getNeedChangePasword()
    {
        return $this->NeedChangePasword;
    }

    /**
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return Playerregistrations
     */
    public function setNeedToSync($NeedToSync)
    {
        $this->NeedToSync = $NeedToSync;

        return $this;
    }

    /**
     * Get NeedToSync
     *
     * @return boolean
     */
    public function getNeedToSync()
    {
        return $this->NeedToSync;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playerregistrations
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
     * @return Playerregistrations
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
     * @return Playerregistrations
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
     * @return Playerregistrations
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
     * @return Playerregistrations
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
     * Set AffiliateId
     *
     * @param integer $AffiliateId
     *
     * @return Playerregistrations
     */
    public function setAffiliateId($AffiliateId)
    {
        $this->AffiliateId = $AffiliateId;

        return $this;
    }

    /**
     * Get AffiliateId
     *
     * @return integer
     */
    public function getAffiliateId()
    {
        return $this->AffiliateId;
    }

    /**
     * Set SignUpCode
     *
     * @param string $SignUpCode
     *
     * @return Playerregistrations
     */
    public function setSignUpCode($SignUpCode)
    {
        $this->SignUpCode = $SignUpCode;

        return $this;
    }

    /**
     * Get SignUpCode
     *
     * @return string
     */
    public function getSignUpCode()
    {
        return $this->SignUpCode;
    }

    /**
     * Set LastLoginIPAddress
     *
     * @param string $LastLoginIPAddress
     *
     * @return Playerregistrations
     */
    public function setLastLoginIPAddress($LastLoginIPAddress)
    {
        $this->LastLoginIPAddress = $LastLoginIPAddress;

        return $this;
    }

    /**
     * Get LastLoginIPAddress
     *
     * @return string
     */
    public function getLastLoginIPAddress()
    {
        return $this->LastLoginIPAddress;
    }

    /**
     * Set Platform
     *
     * @param string $Platform
     *
     * @return Playerregistrations
     */
    public function setPlatform($Platform)
    {
        $this->Platform = $Platform;

        return $this;
    }

    /**
     * Get Platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->Platform;
    }

    /**
     * Set LastLoginTime
     *
     * @param \DateTime $LastLoginTime
     *
     * @return Playerregistrations
     */
    public function setLastLoginTime($LastLoginTime)
    {
        $this->LastLoginTime = $LastLoginTime;

        return $this;
    }

    /**
     * Get LastLoginTime
     *
     * @return \DateTime
     */
    public function getLastLoginTime()
    {
        return $this->LastLoginTime;
    }

    /**
     * Set SrcUrl
     *
     * @param string $SrcUrl
     *
     * @return Playerregistrations
     */
    public function setSrcUrl($SrcUrl)
    {
        $this->SrcUrl = $SrcUrl;

        return $this;
    }

    /**
     * Get SrcUrl
     *
     * @return string
     */
    public function getSrcUrl()
    {
        return $this->SrcUrl;
    }

    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Playerregistrations
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
}
