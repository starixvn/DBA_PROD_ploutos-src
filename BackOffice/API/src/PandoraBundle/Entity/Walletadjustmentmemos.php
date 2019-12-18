<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Walletadjustmentmemos
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNo")
 * @ORM\Table(name="WalletAdjustmentMemos")
 * @ORM\Entity
 */
class Walletadjustmentmemos extends AbstractEntity
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
     * @var string
     *
     * @ORM\Column(name="CreditAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $CreditAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="DebitAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $DebitAmount = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=500, nullable=true)
     */
    private $Remarks;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="WalletAdjustmentMemoTypeEnum")
     * @ORM\Column(name="AdjustmentType", type="integer", nullable=false)
     */
    private $AdjustmentType = '0';

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="WalletAdjustmentMemoStatusTypeEnum")
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
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = true;

    /**
     * @var string
     *
     * @ORM\Column(name="AdjustmentSource", type="string", length=50, nullable=true)
     */
    private $AdjustmentSource;



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
     * @return Walletadjustmentmemos
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
     * @return Walletadjustmentmemos
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
     * @return Walletadjustmentmemos
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
     * Set CreditAmount
     *
     * @param string $CreditAmount
     *
     * @return Walletadjustmentmemos
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
     * Set DebitAmount
     *
     * @param string $DebitAmount
     *
     * @return Walletadjustmentmemos
     */
    public function setDebitAmount($DebitAmount)
    {
        $this->DebitAmount = $DebitAmount;

        return $this;
    }

    /**
     * Get DebitAmount
     *
     * @return string
     */
    public function getDebitAmount()
    {
        return $this->DebitAmount;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Walletadjustmentmemos
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
     * Set Remarks
     *
     * @param string $Remarks
     *
     * @return Walletadjustmentmemos
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
     * Set AdjustmentType
     *
     * @param integer $AdjustmentType
     *
     * @return Walletadjustmentmemos
     */
    public function setAdjustmentType($AdjustmentType)
    {
        $this->AdjustmentType = $AdjustmentType;

        return $this;
    }

    /**
     * Get AdjustmentType
     *
     * @return integer
     */
    public function getAdjustmentType()
    {
        return $this->AdjustmentType;
    }

    /**
     * Set Status
     *
     * @param integer $Status
     *
     * @return Walletadjustmentmemos
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
     * @return Walletadjustmentmemos
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
     * @return Walletadjustmentmemos
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
     * @return Walletadjustmentmemos
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
     * @return Walletadjustmentmemos
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
     * @return Walletadjustmentmemos
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
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return Walletadjustmentmemos
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
     * Set AdjustmentSource
     *
     * @param string $AdjustmentSource
     *
     * @return Walletadjustmentmemos
     */
    public function setAdjustmentSource($AdjustmentSource)
    {
        $this->AdjustmentSource = $AdjustmentSource;

        return $this;
    }

    /**
     * Get AdjustmentSource
     *
     * @return string
     */
    public function getAdjustmentSource()
    {
        return $this->AdjustmentSource;
    }
    /**
     * Set Wallet
     *
     * @param \PandoraBundle\Entity\Wallets $Wallet
     *
     * @return Walletadjustmentmemos
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
}
