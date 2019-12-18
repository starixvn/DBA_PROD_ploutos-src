<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Walletwithdrawals
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNo")
 * @ORM\Table(name="WalletWithdrawals")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\WalletWithdrawalRepository")
 */
class Walletwithdrawals extends AbstractEntity
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
     * Many Wallet Withdrawal to One Wallet
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
     * @ORM\Column(name="WithdrawDate", type="datetime", nullable=true)
     */
    private $WithdrawDate;

    /**
     * @var string
     *
     * @ORM\Column(name="WithdrawAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WithdrawAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=500, nullable=true)
     */
    private $Remarks = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerBankAccountId", type="bigint", nullable=false)
     */
    private $PlayerBankAccountId = '0';
    
    /**
     *
     * Many Wallet Withdrawal to One Player Bank Account
     *
     * @ORM\ManyToOne(targetEntity="Playerbankaccounts")
     * @ORM\JoinColumn(name="PlayerBankAccountId", referencedColumnName="Id")
     */
    private $PlayerBankAccount;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="WithdrawalBankAccountId", type="bigint", nullable=false)
     */
    private $WithdrawalBankAccountId = '0';
    
    /**
     *
     * Many Wallet Withdrawal to One Bank Account
     *
     * @ORM\ManyToOne(targetEntity="Bankaccounts")
     * @ORM\JoinColumn(name="WithdrawalBankAccountId", referencedColumnName="Id")
     */
    private $WithdrawalBankAccount;
    
    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="WalletTransactionStatusTypeEnum")
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $Status = '0';

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
     * @ORM\Column(name="Platform", type="string", length=5, nullable=true)
     */
    private $Platform;

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
     * @return Walletwithdrawals
     */
    public function setWalletId($WalletId)
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
     * @return Walletwithdrawals
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
     * @return Walletwithdrawals
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
     * Set WithdrawDate
     *
     * @param \DateTime $WithdrawDate
     *
     * @return Walletwithdrawals
     */
    public function setWithdrawDate($WithdrawDate)
    {
        $this->WithdrawDate = $WithdrawDate;

        return $this;
    }

    /**
     * Get WithdrawDate
     *
     * @return \DateTime
     */
    public function getWithdrawDate()
    {
        return $this->WithdrawDate;
    }

    /**
     * Set WithdrawAmount
     *
     * @param string $WithdrawAmount
     *
     * @return Walletwithdrawals
     */
    public function setWithdrawAmount($WithdrawAmount)
    {
        $this->WithdrawAmount = $WithdrawAmount;

        return $this;
    }

    /**
     * Get WithdrawAmount
     *
     * @return string
     */
    public function getWithdrawAmount()
    {
        return $this->WithdrawAmount;
    }

    /**
     * Set Remarks
     *
     * @param string $Remarks
     *
     * @return Walletwithdrawals
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Walletwithdrawals
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
     * Set PlayerBankAccountId
     *
     * @param integer $PlayerBankAccountId
     *
     * @return Walletwithdrawals
     */
    public function setPlayerBankAccountId($PlayerBankAccountId)
    {
        $this->PlayerBankAccountId = $PlayerBankAccountId;

        return $this;
    }

    /**
     * Get PlayerBankAccountId
     *
     * @return integer
     */
    public function getPlayerBankAccountId()
    {
        return $this->PlayerBankAccountId;
    }

    /**
     * Set WithdrawalBankAccountId
     *
     * @param integer $WithdrawalBankAccountId
     *
     * @return Walletwithdrawals
     */
    public function setWithdrawalBankAccountId($WithdrawalBankAccountId)
    {
        $this->WithdrawalBankAccountId = $WithdrawalBankAccountId;

        return $this;
    }

    /**
     * Get WithdrawalBankAccountId
     *
     * @return integer
     */
    public function getWithdrawalBankAccountId()
    {
        return $this->WithdrawalBankAccountId;
    }

    /**
     * Set Status
     *
     * @param integer $Status
     *
     * @return Walletwithdrawals
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Walletwithdrawals
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
     * @return Walletwithdrawals
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
     * @return Walletwithdrawals
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
     * @return Walletwithdrawals
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
     * @return Walletwithdrawals
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
     * Set Platform
     *
     * @param string $Platform
     *
     * @return Walletwithdrawals
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
     * Set Wallet
     *
     * @param \PandoraBundle\Entity\Wallets $Wallet
     *
     * @return Walletwithdrawals
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
     * Set Playerbankaccounts
     *
     * @param \PandoraBundle\Entity\Playerbankaccounts $PlayerBankAccount
     *
     * @return Walletwithdrawals
     */
    public function setPlayerBankAccount(\PandoraBundle\Entity\Playerbankaccounts $PlayerBankAccount = null)
    {
        $this->PlayerBankAccount = $PlayerBankAccount;
        
        return $this;
    }
    
    /**
     * Get Playerbankaccounts
     *
     * @return \PandoraBundle\Entity\Playerbankaccounts
     */
    public function getPlayerBankAccount()
    {
        return $this->PlayerBankAccount;
    }
    
    /**
     * Set Bankaccounts
     *
     * @param \PandoraBundle\Entity\Bankaccounts $PlayerBankAccount
     *
     * @return Walletwithdrawals
     */
    public function setWithdrawalBankAccount(\PandoraBundle\Entity\Bankaccounts $WithdrawalBankAccount = null)
    {
        $this->WithdrawalBankAccount = $WithdrawalBankAccount;
        
        return $this;
    }
    
    /**
     * Get Bankaccounts
     *
     * @return \PandoraBundle\Entity\Bankaccounts
     */
    public function getWithdrawalBankAccount()
    {
        return $this->WithdrawalBankAccount;
    }
    
    /**
     * Set TransactionGrabs
     *
     * @param \PandoraBundle\Entity\Transactiongrabs $TransactionGrabs
     *
     * @return Walletwithdrawals
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
