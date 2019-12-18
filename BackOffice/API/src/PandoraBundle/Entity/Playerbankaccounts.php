<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Playerbankaccounts
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="AccountName")
 * @ORM\Table(name="PlayerBankAccounts")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\PlayerBankAccountResolver")
 */
class Playerbankaccounts extends AbstractEntity
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
     * @ORM\Column(name="BankAccountName", type="string", length=100, nullable=true)
     */
    private $BankAccountName;

    /**
     * @var string
     *
     * @ORM\Column(name="AccountName", type="string", length=100, nullable=true)
     */
    private $AccountName;

    /**
     * @var string
     *
     * @ORM\Column(name="AccountNumber", type="string", length=100, nullable=true)
     */
    private $AccountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="BranchName", type="string", length=100, nullable=true)
     */
    private $BranchName;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=100, nullable=true)
     */
    private $City;

    /**
     * @var string
     *
     * @ORM\Column(name="Province", type="string", length=100, nullable=true)
     */
    private $Province;

    /**
     * @var string
     *
     * @ORM\Column(name="SwiftCode", type="string", length=100, nullable=true)
     */
    private $SwiftCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';
    
    /**
     *
     * One Wallet have One Player Profile
     *
     * @ORM\OneToOne(targetEntity="Playerprofiles", inversedBy="Playerbankaccounts")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfiles;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="BankId", type="bigint", nullable=false)
     */
    private $BankId = '0';
    
    /**
     *
     * One Player Bank Account have One Bank
     *
     * @ORM\OneToOne(targetEntity="Banks")
     * @ORM\JoinColumn(name="BankId", referencedColumnName="Id")
     */
    private $Bank;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="BankAccountId", type="bigint", nullable=false)
     */
    private $BankAccountId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var boolean
     *
     * @EnumFieldAnnotation(eNumClass="ActiveStatusTypeEnum")
     * @ORM\Column(name="IsActiveAccount", type="boolean", nullable=false)
     */
    private $IsActiveAccount = true;

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
     * Set BankAccountName
     *
     * @param string $BankAccountName
     *
     * @return Playerbankaccounts
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
     * Set AccountName
     *
     * @param string $AccountName
     *
     * @return Playerbankaccounts
     */
    public function setAccountName($AccountName)
    {
        $this->AccountName = $AccountName;

        return $this;
    }

    /**
     * Get AccountName
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->AccountName;
    }

    /**
     * Set AccountNumber
     *
     * @param string $AccountNumber
     *
     * @return Playerbankaccounts
     */
    public function setAccountNumber($AccountNumber)
    {
        $this->AccountNumber = $AccountNumber;

        return $this;
    }

    /**
     * Get AccountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->AccountNumber;
    }

    /**
     * Set BranchName
     *
     * @param string $BranchName
     *
     * @return Playerbankaccounts
     */
    public function setBranchName($BranchName)
    {
        $this->BranchName = $BranchName;

        return $this;
    }

    /**
     * Get BranchName
     *
     * @return string
     */
    public function getBranchName()
    {
        return $this->BranchName;
    }

    /**
     * Set City
     *
     * @param string $City
     *
     * @return Playerbankaccounts
     */
    public function setCity($City)
    {
        $this->City = $City;

        return $this;
    }

    /**
     * Get City
     *
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Set Province
     *
     * @param string $Province
     *
     * @return Playerbankaccounts
     */
    public function setProvince($Province)
    {
        $this->Province = $Province;

        return $this;
    }

    /**
     * Get Province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->Province;
    }

    /**
     * Set SwiftCode
     *
     * @param string $SwiftCode
     *
     * @return Playerbankaccounts
     */
    public function setSwiftCode($SwiftCode)
    {
        $this->SwiftCode = $SwiftCode;

        return $this;
    }

    /**
     * Get SwiftCode
     *
     * @return string
     */
    public function getSwiftCode()
    {
        return $this->SwiftCode;
    }

    /**
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return Playerbankaccounts
     */
    public function setPlayerProfileId($PlayerProfileId)
    {
        $this->PlayerProfileId = $PlayerProfileId;

        return $this;
    }

    /**
     * Get PlayerProfileId
     *
     * @return integer
     */
    public function getPlayerProfileId()
    {
        return $this->PlayerProfileId;
    }

    /**
     * Set BankId
     *
     * @param integer $BankId
     *
     * @return Playerbankaccounts
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
     * Set BankAccountId
     *
     * @param integer $BankAccountId
     *
     * @return Playerbankaccounts
     */
    public function setBankAccountId($BankAccountId)
    {
        $this->BankAccountId = $BankAccountId;

        return $this;
    }

    /**
     * Get BankAccountId
     *
     * @return integer
     */
    public function getBankAccountId()
    {
        return $this->BankAccountId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Playerbankaccounts
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
     * Set IsActiveAccount
     *
     * @param boolean $IsActiveAccount
     *
     * @return Playerbankaccounts
     */
    public function setIsActiveAccount($IsActiveAccount)
    {
        $this->IsActiveAccount = $IsActiveAccount;

        return $this;
    }

    /**
     * Get IsActiveAccount
     *
     * @return boolean
     */
    public function getIsActiveAccount()
    {
        return $this->IsActiveAccount;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playerbankaccounts
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
     * @param string $modifiedbyid
     *
     * @return Playerbankaccounts
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
     * @return Playerbankaccounts
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
     * @return Playerbankaccounts
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
     * @return Playerbankaccounts
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
     * Set Bank
     *
     * @param \PandoraBundle\Entity\Bank $Bank
     *
     * @return Playerbankaccounts
     */
    public function setBank(\PandoraBundle\Entity\Banks $Bank = null)
    {
        $this->Bank = $Bank;
        
        return $this;
    }
    
    /**
     * Get Bank
     *
     * @return \PandoraBundle\Entity\Bank
     */
    public function getBank()
    {
        return $this->Bank;
    }
    
    
    /**
     * Set PlayerProfiles
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Playerbankaccounts
     */
    public function setPlayerProfiles(\PandoraBundle\Entity\PlayerProfiles $PlayerProfiles = null)
    {
        $this->PlayerProfiles = $PlayerProfiles;
        
        return $this;
    }
    
    /**
     * Get PlayerProfiles
     *
     * @return \PandoraBundle\Entity\PlayerProfiles
     */
    public function getPlayerProfiles()
    {
        return $this->PlayerProfiles;
    }
}
