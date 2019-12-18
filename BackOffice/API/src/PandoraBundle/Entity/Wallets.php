<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Wallets
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="WalletCode")
 * @ORM\Table(name="Wallets")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\WalletRepository")
 */
class Wallets extends AbstractEntity
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
     * @ORM\Column(name="WalletCode", type="string", length=100, nullable=true)
     */
    private $WalletCode;

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
     * @ORM\OneToOne(targetEntity="Playerprofiles", inversedBy="Wallets")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfiles;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Balance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Balance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="OutstandingBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $OutstandingBalance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringRequirement", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringRequirement = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WithdrawableAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WithdrawableAmount = '0.0000';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="WithdrawableAsOf", type="datetime", nullable=true)
     */
    private $WithdrawableAsOf;

    /**
     * @var string
     *
     * @ORM\Column(name="UpdatedBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $UpdatedBalance = '0.0000';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="WalletLastUpdated", type="datetime", nullable=true)
     */
    private $WalletLastUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="WageringBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringBalance = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletStatus", type="integer", nullable=true)
     */
    private $WalletStatus = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="DepositAlertEmail", type="boolean", nullable=false)
     */
    private $DepositAlertEmail = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="DepositAlertSms", type="boolean", nullable=false)
     */
    private $DepositAlertSms = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="WithdrawAlertEmail", type="boolean", nullable=false)
     */
    private $WithdrawAlertEmail = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="WithdrawAlertSms", type="boolean", nullable=false)
     */
    private $WithdrawAlertSms = true;

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
     * Set WalletCode
     *
     * @param string $WalletCode
     *
     * @return Wallets
     */
    public function setWalletCode($WalletCode)
    {
        $this->WalletCode = $WalletCode;

        return $this;
    }

    /**
     * Get WalletCode
     *
     * @return string
     */
    public function getWalletCode()
    {
        return $this->WalletCode;
    }

    /**
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return Wallets
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
     * Set Balance
     *
     * @param string $Balance
     *
     * @return Wallets
     */
    public function setBalance($Balance)
    {
        $this->Balance = $Balance;

        return $this;
    }

    /**
     * Get Balance
     *
     * @return string
     */
    public function getBalance()
    {
        return $this->Balance;
    }

    /**
     * Set OutstandingBalance
     *
     * @param string $OutstandingBalance
     *
     * @return Wallets
     */
    public function setOutstandingBalance($OutstandingBalance)
    {
        $this->OutstandingBalance = $OutstandingBalance;

        return $this;
    }

    /**
     * Get OutstandingBalance
     *
     * @return string
     */
    public function getOutstandingBalance()
    {
        return $this->OutstandingBalance;
    }

    /**
     * Set WageringRequirement
     *
     * @param string $WageringRequirement
     *
     * @return Wallets
     */
    public function setWageringRequirement($WageringRequirement)
    {
        $this->WageringRequirement = $WageringRequirement;

        return $this;
    }

    /**
     * Get WageringRequirement
     *
     * @return string
     */
    public function getWageringRequirement()
    {
        return $this->WageringRequirement;
    }

    /**
     * Set WithdrawableAmount
     *
     * @param string $WithdrawableAmount
     *
     * @return Wallets
     */
    public function setWithdrawableAmount($WithdrawableAmount)
    {
        $this->WithdrawableAmount = $WithdrawableAmount;

        return $this;
    }

    /**
     * Get WithdrawableAmount
     *
     * @return string
     */
    public function getWithdrawableAmount()
    {
        return $this->WithdrawableAmount;
    }

    /**
     * Set WithdrawableAsOf
     *
     * @param \DateTime $WithdrawableAsOf
     *
     * @return Wallets
     */
    public function setWithdrawableAsOf($WithdrawableAsOf)
    {
        $this->WithdrawableAsOf = $WithdrawableAsOf;

        return $this;
    }

    /**
     * Get WithdrawableAsOf
     *
     * @return \DateTime
     */
    public function getWithdrawableAsOf()
    {
        return $this->WithdrawableAsOf;
    }

    /**
     * Set updatedbalance
     *
     * @param string $updatedbalance
     *
     * @return Wallets
     */
    public function setUpdatedbalance($updatedbalance)
    {
        $this->updatedbalance = $updatedbalance;

        return $this;
    }

    /**
     * Get UpdatedBalance
     *
     * @return string
     */
    public function getUpdatedBalance()
    {
        return $this->UpdatedBalance;
    }

    /**
     * Set WalletLastUpdated
     *
     * @param \DateTime $WalletLastUpdated
     *
     * @return Wallets
     */
    public function setWalletLastUpdated($WalletLastUpdated)
    {
        $this->WalletLastUpdated = $WalletLastUpdated;

        return $this;
    }

    /**
     * Get WalletLastUpdated
     *
     * @return \DateTime
     */
    public function getWalletLastUpdated()
    {
        return $this->WalletLastUpdated;
    }

    /**
     * Set WageringBalance
     *
     * @param string $WageringBalance
     *
     * @return Wallets
     */
    public function setWageringBalance($WageringBalance)
    {
        $this->WageringBalance = $WageringBalance;

        return $this;
    }

    /**
     * Get WageringBalance
     *
     * @return string
     */
    public function getWageringBalance()
    {
        return $this->WageringBalance;
    }

    /**
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return Wallets
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
     * Set WalletStatus
     *
     * @param integer $WalletStatus
     *
     * @return Wallets
     */
    public function setWalletStatus($WalletStatus)
    {
        $this->WalletStatus = $WalletStatus;

        return $this;
    }

    /**
     * Get WalletStatus
     *
     * @return integer
     */
    public function getWalletStatus()
    {
        return $this->WalletStatus;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Wallets
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
     * Set DepositAlertEmail
     *
     * @param boolean $DepositAlertEmail
     *
     * @return Wallets
     */
    public function setDepositAlertEmail($DepositAlertEmail)
    {
        $this->DepositAlertEmail = $DepositAlertEmail;

        return $this;
    }

    /**
     * Get DepositAlertEmail
     *
     * @return boolean
     */
    public function getDepositAlertEmail()
    {
        return $this->DepositAlertEmail;
    }

    /**
     * Set DepositAlertSms
     *
     * @param boolean $DepositAlertSms
     *
     * @return Wallets
     */
    public function setDepositAlertSms($DepositAlertSms)
    {
        $this->DepositAlertSms = $DepositAlertSms;

        return $this;
    }

    /**
     * Get DepositAlertSms
     *
     * @return boolean
     */
    public function getDepositAlertSms()
    {
        return $this->DepositAlertSms;
    }

    /**
     * Set WithdrawAlertEmail
     *
     * @param boolean $WithdrawAlertEmail
     *
     * @return Wallets
     */
    public function setWithdrawAlertEmail($WithdrawAlertEmail)
    {
        $this->WithdrawAlertEmail = $WithdrawAlertEmail;

        return $this;
    }

    /**
     * Get WithdrawAlertEmail
     *
     * @return boolean
     */
    public function getWithdrawAlertEmail()
    {
        return $this->WithdrawAlertEmail;
    }

    /**
     * Set WithdrawAlertSms
     *
     * @param boolean $WithdrawAlertSms
     *
     * @return Wallets
     */
    public function setWithdrawAlertSms($WithdrawAlertSms)
    {
        $this->WithdrawAlertSms = $WithdrawAlertSms;

        return $this;
    }

    /**
     * Get WithdrawAlertSms
     *
     * @return boolean
     */
    public function getWithdrawAlertSms()
    {
        return $this->WithdrawAlertSms;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Wallets
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
     * @return Wallets
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
     * @return Wallets
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
     * @return Wallets
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
     * @return Wallets
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
     * Set PlayerProfiles
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Wallets
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
