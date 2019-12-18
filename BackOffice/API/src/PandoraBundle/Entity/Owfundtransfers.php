<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owfundtransfers
 *
 * @ORM\Table(name="OWFundTransfers")
 * @ORM\Entity
 */
class Owfundtransfers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="UserAccountNumber", type="string", length=100, nullable=true)
     */
    private $useraccountnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $transactionno;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="WalletPrevBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $walletprevbal;

    /**
     * @var string
     *
     * @ORM\Column(name="WalletNewBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $walletnewbal;

    /**
     * @var string
     *
     * @ORM\Column(name="OWWalletPrevBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $owwalletprevbal;

    /**
     * @var string
     *
     * @ORM\Column(name="OWWalletNewBal", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $owwalletnewbal;

    /**
     * @var string
     *
     * @ORM\Column(name="TransferType", type="string", length=100, nullable=true)
     */
    private $transfertype;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $createdbyid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=50, nullable=true)
     */
    private $modifiedbyid = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime", nullable=true)
     */
    private $datecreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $datemodified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=false)
     */
    private $activerecord = true;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Owfundtransfers
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Owfundtransfers
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set useraccountnumber
     *
     * @param string $useraccountnumber
     *
     * @return Owfundtransfers
     */
    public function setUseraccountnumber($useraccountnumber)
    {
        $this->useraccountnumber = $useraccountnumber;

        return $this;
    }

    /**
     * Get useraccountnumber
     *
     * @return string
     */
    public function getUseraccountnumber()
    {
        return $this->useraccountnumber;
    }

    /**
     * Set transactionno
     *
     * @param string $transactionno
     *
     * @return Owfundtransfers
     */
    public function setTransactionno($transactionno)
    {
        $this->transactionno = $transactionno;

        return $this;
    }

    /**
     * Get transactionno
     *
     * @return string
     */
    public function getTransactionno()
    {
        return $this->transactionno;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Owfundtransfers
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set walletprevbal
     *
     * @param string $walletprevbal
     *
     * @return Owfundtransfers
     */
    public function setWalletprevbal($walletprevbal)
    {
        $this->walletprevbal = $walletprevbal;

        return $this;
    }

    /**
     * Get walletprevbal
     *
     * @return string
     */
    public function getWalletprevbal()
    {
        return $this->walletprevbal;
    }

    /**
     * Set walletnewbal
     *
     * @param string $walletnewbal
     *
     * @return Owfundtransfers
     */
    public function setWalletnewbal($walletnewbal)
    {
        $this->walletnewbal = $walletnewbal;

        return $this;
    }

    /**
     * Get walletnewbal
     *
     * @return string
     */
    public function getWalletnewbal()
    {
        return $this->walletnewbal;
    }

    /**
     * Set owwalletprevbal
     *
     * @param string $owwalletprevbal
     *
     * @return Owfundtransfers
     */
    public function setOwwalletprevbal($owwalletprevbal)
    {
        $this->owwalletprevbal = $owwalletprevbal;

        return $this;
    }

    /**
     * Get owwalletprevbal
     *
     * @return string
     */
    public function getOwwalletprevbal()
    {
        return $this->owwalletprevbal;
    }

    /**
     * Set owwalletnewbal
     *
     * @param string $owwalletnewbal
     *
     * @return Owfundtransfers
     */
    public function setOwwalletnewbal($owwalletnewbal)
    {
        $this->owwalletnewbal = $owwalletnewbal;

        return $this;
    }

    /**
     * Get owwalletnewbal
     *
     * @return string
     */
    public function getOwwalletnewbal()
    {
        return $this->owwalletnewbal;
    }

    /**
     * Set transfertype
     *
     * @param string $transfertype
     *
     * @return Owfundtransfers
     */
    public function setTransfertype($transfertype)
    {
        $this->transfertype = $transfertype;

        return $this;
    }

    /**
     * Get transfertype
     *
     * @return string
     */
    public function getTransfertype()
    {
        return $this->transfertype;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Owfundtransfers
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }

    /**
     * Get createdbyid
     *
     * @return string
     */
    public function getCreatedbyid()
    {
        return $this->createdbyid;
    }

    /**
     * Set modifiedbyid
     *
     * @param string $modifiedbyid
     *
     * @return Owfundtransfers
     */
    public function setModifiedbyid($modifiedbyid)
    {
        $this->modifiedbyid = $modifiedbyid;

        return $this;
    }

    /**
     * Get modifiedbyid
     *
     * @return string
     */
    public function getModifiedbyid()
    {
        return $this->modifiedbyid;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     *
     * @return Owfundtransfers
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set datemodified
     *
     * @param \DateTime $datemodified
     *
     * @return Owfundtransfers
     */
    public function setDatemodified($datemodified)
    {
        $this->datemodified = $datemodified;

        return $this;
    }

    /**
     * Get datemodified
     *
     * @return \DateTime
     */
    public function getDatemodified()
    {
        return $this->datemodified;
    }

    /**
     * Set activerecord
     *
     * @param boolean $activerecord
     *
     * @return Owfundtransfers
     */
    public function setActiverecord($activerecord)
    {
        $this->activerecord = $activerecord;

        return $this;
    }

    /**
     * Get activerecord
     *
     * @return boolean
     */
    public function getActiverecord()
    {
        return $this->activerecord;
    }
}
