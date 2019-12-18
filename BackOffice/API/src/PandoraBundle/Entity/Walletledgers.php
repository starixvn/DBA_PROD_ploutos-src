<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Walletledgers
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="WalletCode")
 * @ORM\Table(name="WalletLedgers")
 * @ORM\Entity
 */
class Walletledgers extends AbstractEntity
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
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
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
     * @ORM\Column(name="AccountNo", type="string", length=50, nullable=true)
     */
    private $AccountNo;

    /**
     * @var string
     *
     * @ORM\Column(name="WalletCode", type="string", length=50, nullable=true)
     */
    private $WalletCode;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="VendorTypeEnum")
     * @ORM\Column(name="VendorType", type="integer", nullable=true)
     */
    private $VendorType;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="WalletLedgerTypeEnum")
     * @ORM\Column(name="WalletLedgerType", type="integer", nullable=true)
     */
    private $WalletLedgerType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $TransactionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=50, nullable=true)
     */
    private $TransactionNo;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TransactionAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="VendorPrevBalanceAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $VendorPrevBalanceAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="VendorNewBalanceAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $VendorNewBalanceAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletPrevBalanceAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WalletPrevBalanceAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletNewBalanceAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WalletNewBalanceAmount = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingPush", type="boolean", nullable=false)
     */
    private $IsBeingPush = true;

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
     * Set UserName
     *
     * @param string $UserName
     *
     * @return Walletledgers
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
     * @return Walletledgers
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
     * Set AccountNo
     *
     * @param string $AccountNo
     *
     * @return Walletledgers
     */
    public function setAccountNo($AccountNo)
    {
        $this->AccountNo = $AccountNo;

        return $this;
    }

    /**
     * Get AccountNo
     *
     * @return string
     */
    public function getAccountNo()
    {
        return $this->AccountNo;
    }

    /**
     * Set WalletCode
     *
     * @param string $WalletCode
     *
     * @return Walletledgers
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
     * Set VendorType
     *
     * @param integer $VendorType
     *
     * @return Walletledgers
     */
    public function setVendorType($VendorType)
    {
        $this->VendorType = $VendorType;

        return $this;
    }

    /**
     * Get VendorType
     *
     * @return integer
     */
    public function getVendorType()
    {
        return $this->VendorType;
    }

    /**
     * Set WalletLedgerType
     *
     * @param integer $WalletLedgerType
     *
     * @return Walletledgers
     */
    public function setWalletLedgerType($WalletLedgerType)
    {
        $this->WalletLedgerType = $WalletLedgerType;

        return $this;
    }

    /**
     * Get WalletLedgerType
     *
     * @return integer
     */
    public function getWalletLedgerType()
    {
        return $this->WalletLedgerType;
    }

    /**
     * Set TransactionDate
     *
     * @param \DateTime $TransactionDate
     *
     * @return Walletledgers
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
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Walletledgers
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
     * Set TransactionAmount
     *
     * @param string $TransactionAmount
     *
     * @return Walletledgers
     */
    public function setTransactionAmount($TransactionAmount)
    {
        $this->TransactionAmount = $TransactionAmount;

        return $this;
    }

    /**
     * Get TransactionAmount
     *
     * @return string
     */
    public function getTransactionAmount()
    {
        return $this->TransactionAmount;
    }

    /**
     * Set VendorPrevBalanceAmount
     *
     * @param string $VendorPrevBalanceAmount
     *
     * @return Walletledgers
     */
    public function setVendorPrevBalanceAmount($VendorPrevBalanceAmount)
    {
        $this->VendorPrevBalanceAmount = $VendorPrevBalanceAmount;

        return $this;
    }

    /**
     * Get VendorPrevBalanceAmount
     *
     * @return string
     */
    public function getVendorPrevBalanceAmount()
    {
        return $this->VendorPrevBalanceAmount;
    }

    /**
     * Set VendorNewBalanceAmount
     *
     * @param string $VendorNewBalanceAmount
     *
     * @return Walletledgers
     */
    public function setVendorNewBalanceAmount($VendorNewBalanceAmount)
    {
        $this->VendorNewBalanceAmount = $VendorNewBalanceAmount;

        return $this;
    }

    /**
     * Get VendorNewBalanceAmount
     *
     * @return string
     */
    public function getVendorNewBalanceAmount()
    {
        return $this->VendorNewBalanceAmount;
    }

    /**
     * Set WalletPrevBalanceAmount
     *
     * @param string $WalletPrevBalanceAmount
     *
     * @return Walletledgers
     */
    public function setWalletPrevBalanceAmount($WalletPrevBalanceAmount)
    {
        $this->WalletPrevBalanceAmount = $WalletPrevBalanceAmount;

        return $this;
    }

    /**
     * Get WalletPrevBalanceAmount
     *
     * @return string
     */
    public function getWalletPrevBalanceAmount()
    {
        return $this->WalletPrevBalanceAmount;
    }

    /**
     * Set WalletNewBalanceAmount
     *
     * @param string $WalletNewBalanceAmount
     *
     * @return Walletledgers
     */
    public function setWalletNewBalanceAmount($WalletNewBalanceAmount)
    {
        $this->WalletNewBalanceAmount = $WalletNewBalanceAmount;

        return $this;
    }

    /**
     * Get WalletNewBalanceAmount
     *
     * @return string
     */
    public function getWalletNewBalanceAmount()
    {
        return $this->WalletNewBalanceAmount;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Walletledgers
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
     * Set IsBeingPush
     *
     * @param boolean $IsBeingPush
     *
     * @return Walletledgers
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Walletledgers
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
     * @return Walletledgers
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
     * @return Walletledgers
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
     * @return Walletledgers
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
     * @return Walletledgers
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
}
