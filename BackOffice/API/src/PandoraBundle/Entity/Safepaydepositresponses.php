<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Safepaydepositresponses
 *
 * @ORM\Table(name="SafePayDepositResponses")
 * @ORM\Entity
 */
class Safepaydepositresponses
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
     * @ORM\Column(name="UserID", type="string", length=50, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="RecordOrderId", type="string", length=50, nullable=true)
     */
    private $recordorderid;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderId", type="string", length=50, nullable=true)
     */
    private $orderid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserOrderId", type="string", length=50, nullable=true)
     */
    private $userorderid;

    /**
     * @var integer
     *
     * @ORM\Column(name="Amount", type="bigint", nullable=false)
     */
    private $amount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Cur", type="string", length=5, nullable=true)
     */
    private $cur;

    /**
     * @var string
     *
     * @ORM\Column(name="Success", type="string", length=5, nullable=true)
     */
    private $success;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDateTime", type="datetime", nullable=true)
     */
    private $transactiondatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="Bank", type="string", length=5, nullable=true)
     */
    private $bank;

    /**
     * @var string
     *
     * @ORM\Column(name="Sid", type="string", length=50, nullable=true)
     */
    private $sid;

    /**
     * @var string
     *
     * @ORM\Column(name="PayType", type="string", length=50, nullable=true)
     */
    private $paytype;

    /**
     * @var string
     *
     * @ORM\Column(name="HMAC2", type="string", length=100, nullable=true)
     */
    private $hmac2;

    /**
     * @var string
     *
     * @ORM\Column(name="Attach", type="string", length=100, nullable=true)
     */
    private $attach;

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
     * @return Safepaydepositresponses
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
     * Set recordorderid
     *
     * @param string $recordorderid
     *
     * @return Safepaydepositresponses
     */
    public function setRecordorderid($recordorderid)
    {
        $this->recordorderid = $recordorderid;

        return $this;
    }

    /**
     * Get recordorderid
     *
     * @return string
     */
    public function getRecordorderid()
    {
        return $this->recordorderid;
    }

    /**
     * Set orderid
     *
     * @param string $orderid
     *
     * @return Safepaydepositresponses
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
     * Set userorderid
     *
     * @param string $userorderid
     *
     * @return Safepaydepositresponses
     */
    public function setUserorderid($userorderid)
    {
        $this->userorderid = $userorderid;

        return $this;
    }

    /**
     * Get userorderid
     *
     * @return string
     */
    public function getUserorderid()
    {
        return $this->userorderid;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Safepaydepositresponses
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
     * Set cur
     *
     * @param string $cur
     *
     * @return Safepaydepositresponses
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
     * Set success
     *
     * @param string $success
     *
     * @return Safepaydepositresponses
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * Get success
     *
     * @return string
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set transactiondatetime
     *
     * @param \DateTime $transactiondatetime
     *
     * @return Safepaydepositresponses
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
     * Set bank
     *
     * @param string $bank
     *
     * @return Safepaydepositresponses
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
     * Set sid
     *
     * @param string $sid
     *
     * @return Safepaydepositresponses
     */
    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    /**
     * Get sid
     *
     * @return string
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set paytype
     *
     * @param string $paytype
     *
     * @return Safepaydepositresponses
     */
    public function setPaytype($paytype)
    {
        $this->paytype = $paytype;

        return $this;
    }

    /**
     * Get paytype
     *
     * @return string
     */
    public function getPaytype()
    {
        return $this->paytype;
    }

    /**
     * Set hmac2
     *
     * @param string $hmac2
     *
     * @return Safepaydepositresponses
     */
    public function setHmac2($hmac2)
    {
        $this->hmac2 = $hmac2;

        return $this;
    }

    /**
     * Get hmac2
     *
     * @return string
     */
    public function getHmac2()
    {
        return $this->hmac2;
    }

    /**
     * Set attach
     *
     * @param string $attach
     *
     * @return Safepaydepositresponses
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
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Safepaydepositresponses
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
     * @return Safepaydepositresponses
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
     * @return Safepaydepositresponses
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
     * @return Safepaydepositresponses
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
     * @return Safepaydepositresponses
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
