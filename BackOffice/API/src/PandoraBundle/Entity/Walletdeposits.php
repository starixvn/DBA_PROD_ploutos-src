<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Walletdeposits
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNo")
 * @ORM\Table(name="WalletDeposits")
 * @ORM\Entity
 */
class Walletdeposits extends AbstractEntity
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
     * @var integer
     *
     * @ORM\Column(name="WalletId", type="bigint", nullable=false)
     */
    private $WalletId = '0';
    
    /**
     *
     * Many Wallet Deposit to One Wallet
     *
     * @ORM\ManyToOne(targetEntity="Wallets")
     * @ORM\JoinColumn(name="WalletId", referencedColumnName="Id")
     */
    private $Wallet;
    
    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $TransactionNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $TransactionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DepositDate", type="datetime", nullable=true)
     */
    private $DepositDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ActualDepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ActualDepositAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="DepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $DepositAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="UniqueDepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $UniqueDepositAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="CreditAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $CreditAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringFulfillmentAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringFulfillmentAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BonusAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusWageringAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BonusWageringAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalWageringAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalWageringAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringBalanceAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringBalanceAmount = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsWageringFulfilled", type="boolean", nullable=false)
     */
    private $IsWageringFulfilled = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="BonusId", type="bigint", nullable=false)
     */
    private $BonusId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="LockAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $LockAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusCode", type="string", length=100, nullable=true)
     */
    private $BonusCode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ApprovedDate", type="datetime", nullable=true)
     */
    private $ApprovedDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="PaymentRiskLevelId", type="bigint", nullable=false)
     */
    private $PaymentRiskLevelId = '0';
    
    /**
     *
     * Many Wallet Deposit to One Payment Risk Level
     *
     * @ORM\ManyToOne(targetEntity="Paymentrisklevels")
     * @ORM\JoinColumn(name="PaymentRiskLevelId", referencedColumnName="Id")
     */
    private $PaymentRiskLevel;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PaymentMethodId", type="bigint", nullable=false)
     */
    private $PaymentMethodId = '0';
    
    /**
     *
     * Many Wallet Deposit to One Payment Method
     *
     * @ORM\ManyToOne(targetEntity="Paymentmethods")
     * @ORM\JoinColumn(name="PaymentMethodId", referencedColumnName="Id")
     */
    private $PaymentMethod;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="BankAccountId", type="bigint", nullable=false)
     */
    private $BankAccountId = '0';
    
    /**
     *
     * Many Wallet Deposit to One Bank Acoount
     *
     * @ORM\ManyToOne(targetEntity="Bankaccounts")
     * @ORM\JoinColumn(name="BankAccountId", referencedColumnName="Id")
     */
    private $BankAccount;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DepositUntil", type="datetime", nullable=true)
     */
    private $DepositUntil;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="WalletDepositStatusTypeEnum")
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $Status = '0';
    
    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="WalletDepositTypeTypeEnum")
     * @ORM\Column(name="DepositType", type="integer", nullable=false)
     */
    private $DepositType = '0';
    
    /**
     * @var integer
     *
     * @ORM\Column(name="DaddyPayDepositId", type="bigint", nullable=false)
     */
    private $DaddyPayDepositId = '0';

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
     * @ORM\Column(name="RefTransactionNo", type="string", length=100, nullable=true)
     */
    private $RefTransactionNo;

    /**
     * @var string
     *
     * @ORM\Column(name="RefDepositRemarks", type="string", length=100, nullable=true)
     */
    private $RefDepositRemarks;

    /**
     * @var string
     *
     * @ORM\Column(name="RequiredDepositForBonus", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $RequiredDepositForBonus = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Platform", type="string", length=5, nullable=true)
     */
    private $Platform;

    /**
     * @var string
     *
     * @ORM\Column(name="DepositPageUsed", type="string", length=5, nullable=true)
     */
    private $DepositPageUsed;

    /**
     * @var string
     *
     * @ORM\Column(name="BrowserVersionUsed", type="string", length=500, nullable=true)
     */
    private $BrowserVersionUsed;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerWechatAccountNo", type="string", length=100, nullable=true)
     */
    private $PlayerWechatAccountNo;

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=200, nullable=true)
     */
    private $Remarks;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingPush", type="boolean", nullable=false)
     */
    private $IsBeingPush = true;

    /**
     *
     * One Wallet Deposit to Transaction Grab
     *
     * @ORM\OneToOne(targetEntity="Transactiongrabs")
     * @ORM\JoinColumn(name="Id", referencedColumnName="SourceObjectId"),
     */
    private $TransactionGrabs;
    
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
     * Set WalletId
     *
     * @param integer $WalletId
     *
     * @return Walletdeposits
     */
    public function setWalletid($WalletId)
    {
        $this->WalletId = $WalletId;

        return $this;
    }

    /**
     * Get WalletId
     *
     * @return integer
     */
    public function getWalletId()
    {
        return $this->WalletId;
    }

    /**
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Walletdeposits
     */
    public function setTransactionNo($TransactionNo)
    {
        $this->TransactionNo = $TransactionNo;

        return $this;
    }

    /**
     * Get TransactionNo
     *
     * @return string
     */
    public function getTransactionNo()
    {
        return $this->TransactionNo;
    }

    /**
     * Set TransactionDate
     *
     * @param \DateTime $TransactionDate
     *
     * @return Walletdeposits
     */
    public function setTransactionDate($TransactionDate)
    {
        $this->TransactionDate = $TransactionDate;

        return $this;
    }

    /**
     * Get TransactionDate
     *
     * @return \DateTime
     */
    public function getTransactionDate()
    {
        return $this->TransactionDate;
    }

    /**
     * Set DepositDate
     *
     * @param \DateTime $DepositDate
     *
     * @return Walletdeposits
     */
    public function setDepositDate($DepositDate)
    {
        $this->DepositDate = $DepositDate;

        return $this;
    }

    /**
     * Get DepositDate
     *
     * @return \DateTime
     */
    public function getDepositDate()
    {
        return $this->DepositDate;
    }

    /**
     * Set ActualDepositAmount
     *
     * @param string $ActualDepositAmount
     *
     * @return Walletdeposits
     */
    public function setActualDepositAmount($ActualDepositAmount)
    {
        $this->ActualDepositAmount = $ActualDepositAmount;

        return $this;
    }

    /**
     * Get ActualDepositAmount
     *
     * @return string
     */
    public function getActualDepositAmount()
    {
        return $this->ActualDepositAmount;
    }

    /**
     * Set DepositAmount
     *
     * @param string $DepositAmount
     *
     * @return Walletdeposits
     */
    public function setDepositAmount($DepositAmount)
    {
        $this->DepositAmount = $DepositAmount;

        return $this;
    }

    /**
     * Get DepositAmount
     *
     * @return string
     */
    public function getDepositAmount()
    {
        return $this->DepositAmount;
    }

    /**
     * Set UniqueDepositAmount
     *
     * @param string $UniqueDepositAmount
     *
     * @return Walletdeposits
     */
    public function setUniqueDepositAmount($UniqueDepositAmount)
    {
        $this->UniqueDepositAmount = $UniqueDepositAmount;

        return $this;
    }

    /**
     * Get UniqueDepositAmount
     *
     * @return string
     */
    public function getUniqueDepositAmount()
    {
        return $this->UniqueDepositAmount;
    }

    /**
     * Set CreditAmount
     *
     * @param string $CreditAmount
     *
     * @return Walletdeposits
     */
    public function setCreditAmount($CreditAmount)
    {
        $this->CreditAmount = $CreditAmount;

        return $this;
    }

    /**
     * Get CreditAmount
     *
     * @return string
     */
    public function getCreditAmount()
    {
        return $this->CreditAmount;
    }

    /**
     * Set WageringAmount
     *
     * @param string $WageringAmount
     *
     * @return Walletdeposits
     */
    public function setWageringAmount($WageringAmount)
    {
        $this->WageringAmount = $WageringAmount;

        return $this;
    }

    /**
     * Get WageringAmount
     *
     * @return string
     */
    public function getWageringAmount()
    {
        return $this->WageringAmount;
    }

    /**
     * Set WageringFulfillmentAmount
     *
     * @param string $WageringFulfillmentAmount
     *
     * @return Walletdeposits
     */
    public function setWageringFulfillmentAmount($WageringFulfillmentAmount)
    {
        $this->WageringFulfillmentAmount = $WageringFulfillmentAmount;

        return $this;
    }

    /**
     * Get WageringFulfillmentAmount
     *
     * @return string
     */
    public function getWageringFulfillmentAmount()
    {
        return $this->WageringFulfillmentAmount;
    }

    /**
     * Set BonusAmount
     *
     * @param string $BonusAmount
     *
     * @return Walletdeposits
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
     * Set BonusWageringAmount
     *
     * @param string $BonusWageringAmount
     *
     * @return Walletdeposits
     */
    public function setBonusWageringAmount($BonusWageringAmount)
    {
        $this->BonusWageringAmount = $BonusWageringAmount;

        return $this;
    }

    /**
     * Get BonusWageringAmount
     *
     * @return string
     */
    public function getBonusWageringAmount()
    {
        return $this->BonusWageringAmount;
    }

    /**
     * Set TotalWageringAmount
     *
     * @param string $TotalWageringAmount
     *
     * @return Walletdeposits
     */
    public function setTotalWageringAmount($TotalWageringAmount)
    {
        $this->TotalWageringAmount = $TotalWageringAmount;

        return $this;
    }

    /**
     * Get TotalWageringAmount
     *
     * @return string
     */
    public function getTotalWageringAmount()
    {
        return $this->TotalWageringAmount;
    }

    /**
     * Set WageringBalanceAmount
     *
     * @param string $WageringBalanceAmount
     *
     * @return Walletdeposits
     */
    public function setWageringBalanceAmount($WageringBalanceAmount)
    {
        $this->WageringBalanceAmount = $WageringBalanceAmount;

        return $this;
    }

    /**
     * Get WageringBalanceAmount
     *
     * @return string
     */
    public function getWageringBalanceAmount()
    {
        return $this->WageringBalanceAmount;
    }

    /**
     * Set IsWageringFulfilled
     *
     * @param boolean $IsWageringFulfilled
     *
     * @return Walletdeposits
     */
    public function setIsWageringFulfilled($IsWageringFulfilled)
    {
        $this->IsWageringFulfilled = $IsWageringFulfilled;

        return $this;
    }

    /**
     * Get IsWageringFulfilled
     *
     * @return boolean
     */
    public function getIsWageringFulfilled()
    {
        return $this->IsWageringFulfilled;
    }

    /**
     * Set BonusId
     *
     * @param integer $BonusId
     *
     * @return Walletdeposits
     */
    public function setBonusId($BonusId)
    {
        $this->BonusId = $BonusId;

        return $this;
    }

    /**
     * Get BonusId
     *
     * @return integer
     */
    public function getBonusId()
    {
        return $this->BonusId;
    }

    /**
     * Set LockAmount
     *
     * @param string $LockAmount
     *
     * @return Walletdeposits
     */
    public function setLockAmount($LockAmount)
    {
        $this->LockAmount = $LockAmount;

        return $this;
    }

    /**
     * Get LockAmount
     *
     * @return string
     */
    public function getLockAmount()
    {
        return $this->LockAmount;
    }

    /**
     * Set BonusCode
     *
     * @param string $BonusCode
     *
     * @return Walletdeposits
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
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return Walletdeposits
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
     * Set ApprovedDate
     *
     * @param \DateTime $ApprovedDate
     *
     * @return Walletdeposits
     */
    public function setApprovedDate($ApprovedDate)
    {
        $this->ApprovedDate = $ApprovedDate;

        return $this;
    }

    /**
     * Get ApprovedDate
     *
     * @return \DateTime
     */
    public function getApprovedDate()
    {
        return $this->ApprovedDate;
    }

    /**
     * Set PaymentRiskLevelId
     *
     * @param integer $PaymentRiskLevelId
     *
     * @return Walletdeposits
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Walletdeposits
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
     * Set PaymentMethodId
     *
     * @param integer $PaymentMethodId
     *
     * @return Walletdeposits
     */
    public function setPaymentMethodId($PaymentMethodId)
    {
        $this->PaymentMethodId = $PaymentMethodId;

        return $this;
    }

    /**
     * Get PaymentMethodId
     *
     * @return integer
     */
    public function getPaymentMethodId()
    {
        return $this->PaymentMethodId;
    }

    /**
     * Set BankAccountId
     *
     * @param integer $BankAccountId
     *
     * @return Walletdeposits
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
     * Set DepositUntil
     *
     * @param \DateTime $DepositUntil
     *
     * @return Walletdeposits
     */
    public function setDepositUntil($DepositUntil)
    {
        $this->DepositUntil = $DepositUntil;

        return $this;
    }

    /**
     * Get DepositUntil
     *
     * @return \DateTime
     */
    public function getDepositUntil()
    {
        return $this->DepositUntil;
    }

    /**
     * Set Status
     *
     * @param integer $Status
     *
     * @return Walletdeposits
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->Status;
    }
    
    /**
     * Set DepositType
     *
     * @param integer $DepositType
     *
     * @return Walletdeposits
     */
    public function setDepositType($DepositType)
    {
        $this->DepositType = $DepositType;
        
        return $this;
    }
    
    /**
     * Get DepositType
     *
     * @return integer
     */
    public function getDepositType()
    {
        return $this->DepositType;
    }
    
    /**
     * Set DaddyPayDepositId
     *
     * @param integer $DaddyPayDepositId
     *
     * @return Walletdeposits
     */
    public function setDaddyPayDepositId($DaddyPayDepositId)
    {
        $this->DaddyPayDepositId = $DaddyPayDepositId;

        return $this;
    }

    /**
     * Get DaddyPayDepositId
     *
     * @return integer
     */
    public function getDaddyPayDepositId()
    {
        return $this->DaddyPayDepositId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Walletdeposits
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
     * @return Walletdeposits
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
     * @return Walletdeposits
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
     * @return Walletdeposits
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
     * @return Walletdeposits
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
     * Set RefTransactionNo
     *
     * @param string $RefTransactionNo
     *
     * @return Walletdeposits
     */
    public function setRefTransactionNo($RefTransactionNo)
    {
        $this->RefTransactionNo = $RefTransactionNo;

        return $this;
    }

    /**
     * Get RefTransactionNo
     *
     * @return string
     */
    public function getRefTransactionNo()
    {
        return $this->RefTransactionNo;
    }

    /**
     * Set RefDepositRemarks
     *
     * @param string $RefDepositRemarks
     *
     * @return Walletdeposits
     */
    public function setRefDepositRemarks($RefDepositRemarks)
    {
        $this->RefDepositRemarks = $RefDepositRemarks;

        return $this;
    }

    /**
     * Get RefDepositRemarks
     *
     * @return string
     */
    public function getRefDepositRemarks()
    {
        return $this->RefDepositRemarks;
    }

    /**
     * Set RequiredDepositForBonus
     *
     * @param string $RequiredDepositForBonus
     *
     * @return Walletdeposits
     */
    public function setRequiredDepositForBonus($RequiredDepositForBonus)
    {
        $this->RequiredDepositForBonus = $RequiredDepositForBonus;

        return $this;
    }

    /**
     * Get RequiredDepositForBonus
     *
     * @return string
     */
    public function getRequiredDepositForBonus()
    {
        return $this->RequiredDepositForBonus;
    }

    /**
     * Set Platform
     *
     * @param string $Platform
     *
     * @return Walletdeposits
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
     * Set DepositPageUsed
     *
     * @param string $DepositPageUsed
     *
     * @return Walletdeposits
     */
    public function setDepositPageUsed($DepositPageUsed)
    {
        $this->DepositPageUsed = $DepositPageUsed;

        return $this;
    }

    /**
     * Get DepositPageUsed
     *
     * @return string
     */
    public function getDepositPageUsed()
    {
        return $this->DepositPageUsed;
    }

    /**
     * Set BrowserVersionUsed
     *
     * @param string $BrowserVersionUsed
     *
     * @return Walletdeposits
     */
    public function setBrowserVersionUsed($BrowserVersionUsed)
    {
        $this->BrowserVersionUsed = $BrowserVersionUsed;

        return $this;
    }

    /**
     * Get BrowserVersionUsed
     *
     * @return string
     */
    public function getBrowserVersionUsed()
    {
        return $this->BrowserVersionUsed;
    }

    /**
     * Set PlayerWechatAccountNo
     *
     * @param string $PlayerWechatAccountNo
     *
     * @return Walletdeposits
     */
    public function setPlayerWechatAccountNo($PlayerWechatAccountNo)
    {
        $this->PlayerWechatAccountNo = $PlayerWechatAccountNo;

        return $this;
    }

    /**
     * Get PlayerWechatAccountNo
     *
     * @return string
     */
    public function getPlayerWechatAccountNo()
    {
        return $this->PlayerWechatAccountNo;
    }
    
    /**
     * Set Remarks
     *
     * @param string $Remarks
     *
     * @return Walletdeposits
     */
    public function setRemarks($Remarks)
    {
        $this->Remarks = $Remarks;
        
        return $this;
    }
    
    /**
     * Get Remarks
     *
     * @return string
     */
    public function getRemarks()
    {
        return $this->Remarks;
    }
    
    /**
     * Set IsBeingPush
     *
     * @param boolean $IsBeingPush
     *
     * @return Walletdeposits
     */
    public function setIsBeingPush($IsBeingPush)
    {
        $this->IsBeingPush = $IsBeingPush;

        return $this;
    }

    /**
     * Get IsBeingPush
     *
     * @return boolean
     */
    public function getIsBeingPush()
    {
        return $this->IsBeingPush;
    }
    
    /**
     * Set Wallet
     *
     * @param \PandoraBundle\Entity\Wallets $Wallet
     *
     * @return Walletdeposits
     */
    public function setWallet(\PandoraBundle\Entity\Wallets $Wallet = null)
    {
        $this->Wallet = $Wallet;
        
        return $this;
    }
    
    /**
     * Get Wallet
     *
     * @return \PandoraBundle\Entity\Wallets
     */
    public function getWallet()
    {
        return $this->Wallet;
    }
    
    /**
     * Set BankAccount
     *
     * @param \PandoraBundle\Entity\Bankaccounts $BankAccount
     *
     * @return Walletdeposits
     */
    public function setBankAccount(\PandoraBundle\Entity\Bankaccounts $BankAccount = null)
    {
        $this->BankAccount = $BankAccount;
        
        return $this;
    }
    
    /**
     * Get BankAccount
     *
     * @return \PandoraBundle\Entity\Bankaccounts
     */
    public function getBankAccount()
    {
        return $this->BankAccount;
    }
    
    /**
     * Set PaymentRiskLevel
     *
     * @param \PandoraBundle\Entity\Paymentrisklevels $PaymentRiskLevel
     *
     * @return Walletdeposits
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
     * Set PaymentMethod
     *
     * @param \PandoraBundle\Entity\Paymentmethods $PaymentMethod
     *
     * @return Walletdeposits
     */
    public function setPaymentMethod(\PandoraBundle\Entity\Paymentmethods $PaymentMethod = null)
    {
        $this->PaymentMethod = $PaymentMethod;
        
        return $this;
    }
    
    /**
     * Get PaymentMethod
     *
     * @return \PandoraBundle\Entity\Paymentmethods
     */
    public function getPaymentMethod()
    {
        return $this->PaymentMethod;
    }
    
    /**
     * Set TransactionGrabs
     *
     * @param \PandoraBundle\Entity\Transactiongrabs $TransactionGrabs
     *
     * @return Walletdeposits
     */
    public function setTransactionGrabs(\PandoraBundle\Entity\Transactiongrabs $TransactionGrabs = null)
    {
        $this->TransactionGrabs = $TransactionGrabs;
        
        return $this;
    }
    
    /**
     * Get TransactionGrabs
     *
     * @return \PandoraBundle\Entity\Transactiongrabs
     */
    public function getTransactionGrabs()
    {
        return $this->TransactionGrabs;
    }
}
