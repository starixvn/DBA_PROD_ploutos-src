<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Safepaydeposits
 *
 * @ORM\Table(name="SafePayDeposits")
 * @ORM\Entity
 */
class Safepaydeposits
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
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderId", type="string", length=50, nullable=true)
     */
    private $orderid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDateTime", type="datetime", nullable=true)
     */
    private $transactiondatetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="Amount", type="bigint", nullable=false)
     */
    private $amount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Bank", type="string", length=5, nullable=true)
     */
    private $bank;

    /**
     * @var string
     *
     * @ORM\Column(name="ClientName", type="string", length=100, nullable=true)
     */
    private $clientname;

    /**
     * @var string
     *
     * @ORM\Column(name="Url", type="string", length=500, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="Cur", type="string", length=5, nullable=true)
     */
    private $cur;

    /**
     * @var string
     *
     * @ORM\Column(name="HMAC", type="string", length=100, nullable=true)
     */
    private $hmac;

    /**
     * @var string
     *
     * @ORM\Column(name="UserIP", type="string", length=20, nullable=true)
     */
    private $userip;

    /**
     * @var string
     *
     * @ORM\Column(name="Agent", type="string", length=50, nullable=true)
     */
    private $agent;

    /**
     * @var string
     *
     * @ORM\Column(name="Attach", type="string", length=100, nullable=true)
     */
    private $attach;

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletDepositId", type="bigint", nullable=false)
     */
    private $walletdepositid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletDepositNo", type="string", length=50, nullable=true)
     */
    private $walletdepositno;

    /**
     * @var integer
     *
     * @ORM\Column(name="Status", type="integer", nullable=true)
     */
    private $status;

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
     * @return Safepaydeposits
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
     * Set orderid
     *
     * @param string $orderid
     *
     * @return Safepaydeposits
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    /**
     * Get orderid
     *
     * @return string
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set transactiondatetime
     *
     * @param \DateTime $transactiondatetime
     *
     * @return Safepaydeposits
     */
    public function setTransactiondatetime($transactiondatetime)
    {
        $this->transactiondatetime = $transactiondatetime;

        return $this;
    }

    /**
     * Get transactiondatetime
     *
     * @return \DateTime
     */
    public function getTransactiondatetime()
    {
        return $this->transactiondatetime;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Safepaydeposits
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set bank
     *
     * @param string $bank
     *
     * @return Safepaydeposits
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set clientname
     *
     * @param string $clientname
     *
     * @return Safepaydeposits
     */
    public function setClientname($clientname)
    {
        $this->clientname = $clientname;

        return $this;
    }

    /**
     * Get clientname
     *
     * @return string
     */
    public function getClientname()
    {
        return $this->clientname;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Safepaydeposits
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set cur
     *
     * @param string $cur
     *
     * @return Safepaydeposits
     */
    public function setCur($cur)
    {
        $this->cur = $cur;

        return $this;
    }

    /**
     * Get cur
     *
     * @return string
     */
    public function getCur()
    {
        return $this->cur;
    }

    /**
     * Set hmac
     *
     * @param string $hmac
     *
     * @return Safepaydeposits
     */
    public function setHmac($hmac)
    {
        $this->hmac = $hmac;

        return $this;
    }

    /**
     * Get hmac
     *
     * @return string
     */
    public function getHmac()
    {
        return $this->hmac;
    }

    /**
     * Set userip
     *
     * @param string $userip
     *
     * @return Safepaydeposits
     */
    public function setUserip($userip)
    {
        $this->userip = $userip;

        return $this;
    }

    /**
     * Get userip
     *
     * @return string
     */
    public function getUserip()
    {
        return $this->userip;
    }

    /**
     * Set agent
     *
     * @param string $agent
     *
     * @return Safepaydeposits
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return string
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set attach
     *
     * @param string $attach
     *
     * @return Safepaydeposits
     */
    public function setAttach($attach)
    {
        $this->attach = $attach;

        return $this;
    }

    /**
     * Get attach
     *
     * @return string
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * Set walletdepositid
     *
     * @param integer $walletdepositid
     *
     * @return Safepaydeposits
     */
    public function setWalletdepositid($walletdepositid)
    {
        $this->walletdepositid = $walletdepositid;

        return $this;
    }

    /**
     * Get walletdepositid
     *
     * @return integer
     */
    public function getWalletdepositid()
    {
        return $this->walletdepositid;
    }

    /**
     * Set walletdepositno
     *
     * @param string $walletdepositno
     *
     * @return Safepaydeposits
     */
    public function setWalletdepositno($walletdepositno)
    {
        $this->walletdepositno = $walletdepositno;

        return $this;
    }

    /**
     * Get walletdepositno
     *
     * @return string
     */
    public function getWalletdepositno()
    {
        return $this->walletdepositno;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Safepaydeposits
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Safepaydeposits
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
     * @return Safepaydeposits
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
     * @return Safepaydeposits
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
     * @return Safepaydeposits
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
     * @return Safepaydeposits
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
