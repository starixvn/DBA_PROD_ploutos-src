<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Daddypaydeposits
 *
 * @ORM\Table(name="DaddyPayDeposits", uniqueConstraints={@ORM\UniqueConstraint(name="CompanyOrderNum", columns={"CompanyOrderNum"})})
 * @ORM\Entity
 */
class Daddypaydeposits
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
     * @ORM\Column(name="CompanyOrderNum", type="string", length=100, nullable=true)
     */
    private $companyordernum;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusCode", type="string", length=50, nullable=true)
     */
    private $bonuscode;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyId", type="string", length=10, nullable=true)
     */
    private $companyid;

    /**
     * @var string
     *
     * @ORM\Column(name="BankId", type="string", length=10, nullable=true)
     */
    private $bankid;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyUser", type="string", length=50, nullable=true)
     */
    private $companyuser;

    /**
     * @var string
     *
     * @ORM\Column(name="Key", type="string", length=100, nullable=true)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="EstimatedPaymentBank", type="string", length=10, nullable=true)
     */
    private $estimatedpaymentbank;

    /**
     * @var string
     *
     * @ORM\Column(name="DepositMode", type="string", length=10, nullable=true)
     */
    private $depositmode;

    /**
     * @var string
     *
     * @ORM\Column(name="GroupId", type="string", length=10, nullable=true)
     */
    private $groupid;

    /**
     * @var string
     *
     * @ORM\Column(name="WebUrl", type="string", length=100, nullable=true)
     */
    private $weburl;

    /**
     * @var string
     *
     * @ORM\Column(name="Memo", type="string", length=100, nullable=true)
     */
    private $memo;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="string", length=100, nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="NoteModel", type="string", length=10, nullable=true)
     */
    private $notemodel;

    /**
     * @var string
     *
     * @ORM\Column(name="Terminal", type="string", length=10, nullable=true)
     */
    private $terminal;

    /**
     * @var string
     *
     * @ORM\Column(name="MownecumOrderNum", type="string", length=100, nullable=true)
     */
    private $mownecumordernum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PayTime", type="datetime", nullable=true)
     */
    private $paytime;

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
     * @var string
     *
     * @ORM\Column(name="TransactionCharge", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $transactioncharge = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingProcessed", type="boolean", nullable=false)
     */
    private $isbeingprocessed = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsReflectedToDeposit", type="boolean", nullable=false)
     */
    private $isreflectedtodeposit = true;

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
     * Set companyordernum
     *
     * @param string $companyordernum
     *
     * @return Daddypaydeposits
     */
    public function setCompanyordernum($companyordernum)
    {
        $this->companyordernum = $companyordernum;

        return $this;
    }

    /**
     * Get companyordernum
     *
     * @return string
     */
    public function getCompanyordernum()
    {
        return $this->companyordernum;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Daddypaydeposits
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
     * Set bonuscode
     *
     * @param string $bonuscode
     *
     * @return Daddypaydeposits
     */
    public function setBonuscode($bonuscode)
    {
        $this->bonuscode = $bonuscode;

        return $this;
    }

    /**
     * Get bonuscode
     *
     * @return string
     */
    public function getBonuscode()
    {
        return $this->bonuscode;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Daddypaydeposits
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
     * Set companyid
     *
     * @param string $companyid
     *
     * @return Daddypaydeposits
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
     * Set bankid
     *
     * @param string $bankid
     *
     * @return Daddypaydeposits
     */
    public function setBankid($bankid)
    {
        $this->bankid = $bankid;

        return $this;
    }

    /**
     * Get bankid
     *
     * @return string
     */
    public function getBankid()
    {
        return $this->bankid;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Daddypaydeposits
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
     * Set companyuser
     *
     * @param string $companyuser
     *
     * @return Daddypaydeposits
     */
    public function setCompanyuser($companyuser)
    {
        $this->companyuser = $companyuser;

        return $this;
    }

    /**
     * Get companyuser
     *
     * @return string
     */
    public function getCompanyuser()
    {
        return $this->companyuser;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return Daddypaydeposits
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
     * Set estimatedpaymentbank
     *
     * @param string $estimatedpaymentbank
     *
     * @return Daddypaydeposits
     */
    public function setEstimatedpaymentbank($estimatedpaymentbank)
    {
        $this->estimatedpaymentbank = $estimatedpaymentbank;

        return $this;
    }

    /**
     * Get estimatedpaymentbank
     *
     * @return string
     */
    public function getEstimatedpaymentbank()
    {
        return $this->estimatedpaymentbank;
    }

    /**
     * Set depositmode
     *
     * @param string $depositmode
     *
     * @return Daddypaydeposits
     */
    public function setDepositmode($depositmode)
    {
        $this->depositmode = $depositmode;

        return $this;
    }

    /**
     * Get depositmode
     *
     * @return string
     */
    public function getDepositmode()
    {
        return $this->depositmode;
    }

    /**
     * Set groupid
     *
     * @param string $groupid
     *
     * @return Daddypaydeposits
     */
    public function setGroupid($groupid)
    {
        $this->groupid = $groupid;

        return $this;
    }

    /**
     * Get groupid
     *
     * @return string
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Set weburl
     *
     * @param string $weburl
     *
     * @return Daddypaydeposits
     */
    public function setWeburl($weburl)
    {
        $this->weburl = $weburl;

        return $this;
    }

    /**
     * Get weburl
     *
     * @return string
     */
    public function getWeburl()
    {
        return $this->weburl;
    }

    /**
     * Set memo
     *
     * @param string $memo
     *
     * @return Daddypaydeposits
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;

        return $this;
    }

    /**
     * Get memo
     *
     * @return string
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Daddypaydeposits
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
     * Set notemodel
     *
     * @param string $notemodel
     *
     * @return Daddypaydeposits
     */
    public function setNotemodel($notemodel)
    {
        $this->notemodel = $notemodel;

        return $this;
    }

    /**
     * Get notemodel
     *
     * @return string
     */
    public function getNotemodel()
    {
        return $this->notemodel;
    }

    /**
     * Set terminal
     *
     * @param string $terminal
     *
     * @return Daddypaydeposits
     */
    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;

        return $this;
    }

    /**
     * Get terminal
     *
     * @return string
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * Set mownecumordernum
     *
     * @param string $mownecumordernum
     *
     * @return Daddypaydeposits
     */
    public function setMownecumordernum($mownecumordernum)
    {
        $this->mownecumordernum = $mownecumordernum;

        return $this;
    }

    /**
     * Get mownecumordernum
     *
     * @return string
     */
    public function getMownecumordernum()
    {
        return $this->mownecumordernum;
    }

    /**
     * Set paytime
     *
     * @param \DateTime $paytime
     *
     * @return Daddypaydeposits
     */
    public function setPaytime($paytime)
    {
        $this->paytime = $paytime;

        return $this;
    }

    /**
     * Get paytime
     *
     * @return \DateTime
     */
    public function getPaytime()
    {
        return $this->paytime;
    }

    /**
     * Set area
     *
     * @param string $area
     *
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * Set operatingtime
     *
     * @param \DateTime $operatingtime
     *
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @param string $transactioncharge
     *
     * @return Daddypaydeposits
     */
    public function setTransactioncharge($transactioncharge)
    {
        $this->transactioncharge = $transactioncharge;

        return $this;
    }

    /**
     * Get transactioncharge
     *
     * @return string
     */
    public function getTransactioncharge()
    {
        return $this->transactioncharge;
    }

    /**
     * Set isbeingprocessed
     *
     * @param boolean $isbeingprocessed
     *
     * @return Daddypaydeposits
     */
    public function setIsbeingprocessed($isbeingprocessed)
    {
        $this->isbeingprocessed = $isbeingprocessed;

        return $this;
    }

    /**
     * Get isbeingprocessed
     *
     * @return boolean
     */
    public function getIsbeingprocessed()
    {
        return $this->isbeingprocessed;
    }

    /**
     * Set isreflectedtodeposit
     *
     * @param boolean $isreflectedtodeposit
     *
     * @return Daddypaydeposits
     */
    public function setIsreflectedtodeposit($isreflectedtodeposit)
    {
        $this->isreflectedtodeposit = $isreflectedtodeposit;

        return $this;
    }

    /**
     * Get isreflectedtodeposit
     *
     * @return boolean
     */
    public function getIsreflectedtodeposit()
    {
        return $this->isreflectedtodeposit;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
     * @return Daddypaydeposits
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
