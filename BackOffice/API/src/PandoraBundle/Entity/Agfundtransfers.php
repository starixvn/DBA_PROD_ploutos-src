<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agfundtransfers
 *
 * @ORM\Table(name="AGFundTransfers")
 * @ORM\Entity
 */
class Agfundtransfers
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
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=100, nullable=true)
     */
    private $UserName;

    /**
     * @var string
     *
     * @ORM\Column(name="UserAccountNumber", type="string", length=100, nullable=true)
     */
    private $UserAccountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $TransactionNo;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Amount;

    /**
     * @var string
     *
     * @ORM\Column(name="WalletPrevBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WalletPrevBal;

    /**
     * @var string
     *
     * @ORM\Column(name="WalletNewBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WalletNewBal;

    /**
     * @var string
     *
     * @ORM\Column(name="AGWalletPrevBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $AGWalletPrevBal;

    /**
     * @var string
     *
     * @ORM\Column(name="AGWalletNewBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $AGWalletNewBal;

    /**
     * @var string
     *
     * @ORM\Column(name="TransferType", type="string", length=100, nullable=true)
     */
    private $TransferType;

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
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Agfundtransfers
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
     * @return Agfundtransfers
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
     * Set UserAccountNumber
     *
     * @param string $UserAccountNumber
     *
     * @return Agfundtransfers
     */
    public function setUserAccountNumber($UserAccountNumber)
    {
        $this->UserAccountNumber = $UserAccountNumber;

        return $this;
    }

    /**
     * Get UserAccountNumber
     *
     * @return string
     */
    public function getUserAccountNumber()
    {
        return $this->UserAccountNumber;
    }

    /**
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Agfundtransfers
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
     * Set Amount
     *
     * @param string $Amount
     *
     * @return Agfundtransfers
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;

        return $this;
    }

    /**
     * Get Amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * Set WalletPrevBal
     *
     * @param string $WalletPrevBal
     *
     * @return Agfundtransfers
     */
    public function setWalletPrevBal($WalletPrevBal)
    {
        $this->WalletPrevBal = $WalletPrevBal;

        return $this;
    }

    /**
     * Get WalletPrevBal
     *
     * @return string
     */
    public function getWalletPrevBal()
    {
        return $this->WalletPrevBal;
    }

    /**
     * Set WalletNewBal
     *
     * @param string $WalletNewBal
     *
     * @return Agfundtransfers
     */
    public function setWalletNewBal($WalletNewBal)
    {
        $this->WalletNewBal = $WalletNewBal;

        return $this;
    }

    /**
     * Get WalletNewBal
     *
     * @return string
     */
    public function getWalletNewBal()
    {
        return $this->WalletNewBal;
    }

    /**
     * Set AGWalletPrevBal
     *
     * @param string $AGWalletPrevBal
     *
     * @return Agfundtransfers
     */
    public function setAGWalletPrevBal($AGWalletPrevBal)
    {
        $this->AGWalletPrevBal = $AGWalletPrevBal;

        return $this;
    }

    /**
     * Get AGWalletPrevBal
     *
     * @return string
     */
    public function getAGWalletPrevBal()
    {
        return $this->AGWalletPrevBal;
    }

    /**
     * Set AGWalletNewBal
     *
     * @param string $AGWalletNewBal
     *
     * @return Agfundtransfers
     */
    public function setAGWalletNewBal($AGWalletNewBal)
    {
        $this->AGWalletNewBal = $AGWalletNewBal;

        return $this;
    }

    /**
     * Get AGWalletNewBal
     *
     * @return string
     */
    public function getAGWalletNewBal()
    {
        return $this->AGWalletNewBal;
    }

    /**
     * Set TransferType
     *
     * @param string $TransferType
     *
     * @return Agfundtransfers
     */
    public function setTransferType($TransferType)
    {
        $this->TransferType = $TransferType;

        return $this;
    }

    /**
     * Get TransferType
     *
     * @return string
     */
    public function getTransferType()
    {
        return $this->TransferType;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Agfundtransfers
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
     * @return Agfundtransfers
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
     * @return Agfundtransfers
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
     * @return Agfundtransfers
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
     * @return Agfundtransfers
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
