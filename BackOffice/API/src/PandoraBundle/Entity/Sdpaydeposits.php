<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sdpaydeposits
 *
 * @ORM\Table(name="SDPayDeposits")
 * @ORM\Entity
 */
class Sdpaydeposits
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
     * @ORM\Column(name="Cmd", type="string", length=50, nullable=true)
     */
    private $cmd;

    /**
     * @var string
     *
     * @ORM\Column(name="MerchantId", type="string", length=50, nullable=true)
     */
    private $merchantid;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderNo", type="string", length=50, nullable=true)
     */
    private $orderno;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="Money", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $money;

    /**
     * @var integer
     *
     * @ORM\Column(name="Unit", type="integer", nullable=true)
     */
    private $unit;

    /**
     * @var string
     *
     * @ORM\Column(name="UnitString", type="string", length=50, nullable=true)
     */
    private $unitstring;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="Remark", type="string", length=200, nullable=true)
     */
    private $remark;

    /**
     * @var string
     *
     * @ORM\Column(name="BackUrl", type="string", length=200, nullable=true)
     */
    private $backurl;

    /**
     * @var string
     *
     * @ORM\Column(name="BackUrlBrowser", type="string", length=200, nullable=true)
     */
    private $backurlbrowser;

    /**
     * @var integer
     *
     * @ORM\Column(name="DepositResult", type="integer", nullable=true)
     */
    private $depositresult;

    /**
     * @var string
     *
     * @ORM\Column(name="DepositResultStatus", type="string", length=50, nullable=true)
     */
    private $depositresultstatus;

    /**
     * @var string
     *
     * @ORM\Column(name="DesKey", type="text", nullable=true)
     */
    private $deskey;

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
     * @var string
     *
     * @ORM\Column(name="CmdDepositResponse", type="string", length=50, nullable=true)
     */
    private $cmddepositresponse;

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletDepositId", type="bigint", nullable=false)
     */
    private $walletdepositid = '0';



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
     * Set cmd
     *
     * @param string $cmd
     *
     * @return Sdpaydeposits
     */
    public function setCmd($cmd)
    {
        $this->cmd = $cmd;

        return $this;
    }

    /**
     * Get cmd
     *
     * @return string
     */
    public function getCmd()
    {
        return $this->cmd;
    }

    /**
     * Set merchantid
     *
     * @param string $merchantid
     *
     * @return Sdpaydeposits
     */
    public function setMerchantid($merchantid)
    {
        $this->merchantid = $merchantid;

        return $this;
    }

    /**
     * Get merchantid
     *
     * @return string
     */
    public function getMerchantid()
    {
        return $this->merchantid;
    }

    /**
     * Set orderno
     *
     * @param string $orderno
     *
     * @return Sdpaydeposits
     */
    public function setOrderno($orderno)
    {
        $this->orderno = $orderno;

        return $this;
    }

    /**
     * Get orderno
     *
     * @return string
     */
    public function getOrderno()
    {
        return $this->orderno;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Sdpaydeposits
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
     * Set money
     *
     * @param string $money
     *
     * @return Sdpaydeposits
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set unit
     *
     * @param integer $unit
     *
     * @return Sdpaydeposits
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return integer
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set unitstring
     *
     * @param string $unitstring
     *
     * @return Sdpaydeposits
     */
    public function setUnitstring($unitstring)
    {
        $this->unitstring = $unitstring;

        return $this;
    }

    /**
     * Get unitstring
     *
     * @return string
     */
    public function getUnitstring()
    {
        return $this->unitstring;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Sdpaydeposits
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set remark
     *
     * @param string $remark
     *
     * @return Sdpaydeposits
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set backurl
     *
     * @param string $backurl
     *
     * @return Sdpaydeposits
     */
    public function setBackurl($backurl)
    {
        $this->backurl = $backurl;

        return $this;
    }

    /**
     * Get backurl
     *
     * @return string
     */
    public function getBackurl()
    {
        return $this->backurl;
    }

    /**
     * Set backurlbrowser
     *
     * @param string $backurlbrowser
     *
     * @return Sdpaydeposits
     */
    public function setBackurlbrowser($backurlbrowser)
    {
        $this->backurlbrowser = $backurlbrowser;

        return $this;
    }

    /**
     * Get backurlbrowser
     *
     * @return string
     */
    public function getBackurlbrowser()
    {
        return $this->backurlbrowser;
    }

    /**
     * Set depositresult
     *
     * @param integer $depositresult
     *
     * @return Sdpaydeposits
     */
    public function setDepositresult($depositresult)
    {
        $this->depositresult = $depositresult;

        return $this;
    }

    /**
     * Get depositresult
     *
     * @return integer
     */
    public function getDepositresult()
    {
        return $this->depositresult;
    }

    /**
     * Set depositresultstatus
     *
     * @param string $depositresultstatus
     *
     * @return Sdpaydeposits
     */
    public function setDepositresultstatus($depositresultstatus)
    {
        $this->depositresultstatus = $depositresultstatus;

        return $this;
    }

    /**
     * Get depositresultstatus
     *
     * @return string
     */
    public function getDepositresultstatus()
    {
        return $this->depositresultstatus;
    }

    /**
     * Set deskey
     *
     * @param string $deskey
     *
     * @return Sdpaydeposits
     */
    public function setDeskey($deskey)
    {
        $this->deskey = $deskey;

        return $this;
    }

    /**
     * Get deskey
     *
     * @return string
     */
    public function getDeskey()
    {
        return $this->deskey;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Sdpaydeposits
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
     * @return Sdpaydeposits
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
     * @return Sdpaydeposits
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
     * @return Sdpaydeposits
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
     * @return Sdpaydeposits
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

    /**
     * Set cmddepositresponse
     *
     * @param string $cmddepositresponse
     *
     * @return Sdpaydeposits
     */
    public function setCmddepositresponse($cmddepositresponse)
    {
        $this->cmddepositresponse = $cmddepositresponse;

        return $this;
    }

    /**
     * Get cmddepositresponse
     *
     * @return string
     */
    public function getCmddepositresponse()
    {
        return $this->cmddepositresponse;
    }

    /**
     * Set walletdepositid
     *
     * @param integer $walletdepositid
     *
     * @return Sdpaydeposits
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
}
