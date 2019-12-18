<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Daddypayexceptionwithdrawapplys
 *
 * @ORM\Table(name="DaddypayExceptionWithdrawApplys")
 * @ORM\Entity
 */
class Daddypayexceptionwithdrawapplys
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
     * @ORM\Column(name="CompanyId", type="string", length=10, nullable=true)
     */
    private $companyid;

    /**
     * @var string
     *
     * @ORM\Column(name="ExactPaymentBank", type="string", length=20, nullable=true)
     */
    private $exactpaymentbank;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ExactTime", type="datetime", nullable=true)
     */
    private $exacttime;

    /**
     * @var string
     *
     * @ORM\Column(name="ExceptionOrderNumber", type="string", length=100, nullable=true)
     */
    private $exceptionordernumber;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="string", length=100, nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="ReceivingAccountName", type="string", length=50, nullable=true)
     */
    private $receivingaccountname;

    /**
     * @var string
     *
     * @ORM\Column(name="ReceivingBank", type="string", length=10, nullable=true)
     */
    private $receivingbank;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Area", type="string", length=50, nullable=true)
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(name="BaseInfo", type="string", length=256, nullable=true)
     */
    private $baseinfo;

    /**
     * @var string
     *
     * @ORM\Column(name="Channel", type="string", length=256, nullable=true)
     */
    private $channel;

    /**
     * @var string
     *
     * @ORM\Column(name="Fee", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $fee = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Key", type="string", length=100, nullable=true)
     */
    private $key;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OperatingTime", type="datetime", nullable=true)
     */
    private $operatingtime;

    /**
     * @var string
     *
     * @ORM\Column(name="PayCardName", type="string", length=50, nullable=true)
     */
    private $paycardname;

    /**
     * @var string
     *
     * @ORM\Column(name="PayCardNumber", type="string", length=50, nullable=true)
     */
    private $paycardnumber;

    /**
     * @var float
     *
     * @ORM\Column(name="TransactionCharge", type="float", precision=10, scale=0, nullable=true)
     */
    private $transactioncharge = '0';

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
     * Set companyid
     *
     * @param string $companyid
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setCompanyid($companyid)
    {
        $this->companyid = $companyid;

        return $this;
    }

    /**
     * Get companyid
     *
     * @return string
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }

    /**
     * Set exactpaymentbank
     *
     * @param string $exactpaymentbank
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setExactpaymentbank($exactpaymentbank)
    {
        $this->exactpaymentbank = $exactpaymentbank;

        return $this;
    }

    /**
     * Get exactpaymentbank
     *
     * @return string
     */
    public function getExactpaymentbank()
    {
        return $this->exactpaymentbank;
    }

    /**
     * Set exacttime
     *
     * @param \DateTime $exacttime
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setExacttime($exacttime)
    {
        $this->exacttime = $exacttime;

        return $this;
    }

    /**
     * Get exacttime
     *
     * @return \DateTime
     */
    public function getExacttime()
    {
        return $this->exacttime;
    }

    /**
     * Set exceptionordernumber
     *
     * @param string $exceptionordernumber
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setExceptionordernumber($exceptionordernumber)
    {
        $this->exceptionordernumber = $exceptionordernumber;

        return $this;
    }

    /**
     * Get exceptionordernumber
     *
     * @return string
     */
    public function getExceptionordernumber()
    {
        return $this->exceptionordernumber;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set receivingaccountname
     *
     * @param string $receivingaccountname
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setReceivingaccountname($receivingaccountname)
    {
        $this->receivingaccountname = $receivingaccountname;

        return $this;
    }

    /**
     * Get receivingaccountname
     *
     * @return string
     */
    public function getReceivingaccountname()
    {
        return $this->receivingaccountname;
    }

    /**
     * Set receivingbank
     *
     * @param string $receivingbank
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setReceivingbank($receivingbank)
    {
        $this->receivingbank = $receivingbank;

        return $this;
    }

    /**
     * Get receivingbank
     *
     * @return string
     */
    public function getReceivingbank()
    {
        return $this->receivingbank;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Daddypayexceptionwithdrawapplys
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
     * Set area
     *
     * @param string $area
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set baseinfo
     *
     * @param string $baseinfo
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setBaseinfo($baseinfo)
    {
        $this->baseinfo = $baseinfo;

        return $this;
    }

    /**
     * Get baseinfo
     *
     * @return string
     */
    public function getBaseinfo()
    {
        return $this->baseinfo;
    }

    /**
     * Set channel
     *
     * @param string $channel
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set fee
     *
     * @param string $fee
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get fee
     *
     * @return string
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set operatingtime
     *
     * @param \DateTime $operatingtime
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setOperatingtime($operatingtime)
    {
        $this->operatingtime = $operatingtime;

        return $this;
    }

    /**
     * Get operatingtime
     *
     * @return \DateTime
     */
    public function getOperatingtime()
    {
        return $this->operatingtime;
    }

    /**
     * Set paycardname
     *
     * @param string $paycardname
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setPaycardname($paycardname)
    {
        $this->paycardname = $paycardname;

        return $this;
    }

    /**
     * Get paycardname
     *
     * @return string
     */
    public function getPaycardname()
    {
        return $this->paycardname;
    }

    /**
     * Set paycardnumber
     *
     * @param string $paycardnumber
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setPaycardnumber($paycardnumber)
    {
        $this->paycardnumber = $paycardnumber;

        return $this;
    }

    /**
     * Get paycardnumber
     *
     * @return string
     */
    public function getPaycardnumber()
    {
        return $this->paycardnumber;
    }

    /**
     * Set transactioncharge
     *
     * @param float $transactioncharge
     *
     * @return Daddypayexceptionwithdrawapplys
     */
    public function setTransactioncharge($transactioncharge)
    {
        $this->transactioncharge = $transactioncharge;

        return $this;
    }

    /**
     * Get transactioncharge
     *
     * @return float
     */
    public function getTransactioncharge()
    {
        return $this->transactioncharge;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Daddypayexceptionwithdrawapplys
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
     * @return Daddypayexceptionwithdrawapplys
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
     * @return Daddypayexceptionwithdrawapplys
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
     * @return Daddypayexceptionwithdrawapplys
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
     * @return Daddypayexceptionwithdrawapplys
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
     * @return Daddypayexceptionwithdrawapplys
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
