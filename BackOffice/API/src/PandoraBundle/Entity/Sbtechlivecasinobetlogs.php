<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sbtechlivecasinobetlogs
 *
 * @ORM\Table(name="SBTechLiveCasinoBetLogs")
 * @ORM\Entity
 */
class Sbtechlivecasinobetlogs
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
     * @ORM\Column(name="BundelId", type="string", length=100, nullable=true)
     */
    private $bundelid;

    /**
     * @var string
     *
     * @ORM\Column(name="TableId", type="string", length=100, nullable=true)
     */
    private $tableid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetId", type="string", length=100, nullable=true)
     */
    private $betid;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $betamount;

    /**
     * @var string
     *
     * @ORM\Column(name="WinLose", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $winlose;

    /**
     * @var string
     *
     * @ORM\Column(name="Balance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $balance;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=100, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=100, nullable=true)
     */
    private $gameid;

    /**
     * @var string
     *
     * @ORM\Column(name="GameCode", type="string", length=100, nullable=true)
     */
    private $gamecode;

    /**
     * @var string
     *
     * @ORM\Column(name="Platform", type="string", length=100, nullable=true)
     */
    private $platform;

    /**
     * @var string
     *
     * @ORM\Column(name="LuckyNum", type="string", length=100, nullable=true)
     */
    private $luckynum;

    /**
     * @var string
     *
     * @ORM\Column(name="GameResult", type="string", length=100, nullable=true)
     */
    private $gameresult;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransDate", type="datetime", nullable=true)
     */
    private $transdate;

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
     * Set bundelid
     *
     * @param string $bundelid
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setBundelid($bundelid)
    {
        $this->bundelid = $bundelid;

        return $this;
    }

    /**
     * Get bundelid
     *
     * @return string
     */
    public function getBundelid()
    {
        return $this->bundelid;
    }

    /**
     * Set tableid
     *
     * @param string $tableid
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setTableid($tableid)
    {
        $this->tableid = $tableid;

        return $this;
    }

    /**
     * Get tableid
     *
     * @return string
     */
    public function getTableid()
    {
        return $this->tableid;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Sbtechlivecasinobetlogs
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
     * Set betid
     *
     * @param string $betid
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setBetid($betid)
    {
        $this->betid = $betid;

        return $this;
    }

    /**
     * Get betid
     *
     * @return string
     */
    public function getBetid()
    {
        return $this->betid;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set betamount
     *
     * @param string $betamount
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setBetamount($betamount)
    {
        $this->betamount = $betamount;

        return $this;
    }

    /**
     * Get betamount
     *
     * @return string
     */
    public function getBetamount()
    {
        return $this->betamount;
    }

    /**
     * Set winlose
     *
     * @param string $winlose
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setWinlose($winlose)
    {
        $this->winlose = $winlose;

        return $this;
    }

    /**
     * Get winlose
     *
     * @return string
     */
    public function getWinlose()
    {
        return $this->winlose;
    }

    /**
     * Set balance
     *
     * @param string $balance
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setGameid($gameid)
    {
        $this->gameid = $gameid;

        return $this;
    }

    /**
     * Get gameid
     *
     * @return string
     */
    public function getGameid()
    {
        return $this->gameid;
    }

    /**
     * Set gamecode
     *
     * @param string $gamecode
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setGamecode($gamecode)
    {
        $this->gamecode = $gamecode;

        return $this;
    }

    /**
     * Get gamecode
     *
     * @return string
     */
    public function getGamecode()
    {
        return $this->gamecode;
    }

    /**
     * Set platform
     *
     * @param string $platform
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Set luckynum
     *
     * @param string $luckynum
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setLuckynum($luckynum)
    {
        $this->luckynum = $luckynum;

        return $this;
    }

    /**
     * Get luckynum
     *
     * @return string
     */
    public function getLuckynum()
    {
        return $this->luckynum;
    }

    /**
     * Set gameresult
     *
     * @param string $gameresult
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setGameresult($gameresult)
    {
        $this->gameresult = $gameresult;

        return $this;
    }

    /**
     * Get gameresult
     *
     * @return string
     */
    public function getGameresult()
    {
        return $this->gameresult;
    }

    /**
     * Set transdate
     *
     * @param \DateTime $transdate
     *
     * @return Sbtechlivecasinobetlogs
     */
    public function setTransdate($transdate)
    {
        $this->transdate = $transdate;

        return $this;
    }

    /**
     * Get transdate
     *
     * @return \DateTime
     */
    public function getTransdate()
    {
        return $this->transdate;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Sbtechlivecasinobetlogs
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
     * @return Sbtechlivecasinobetlogs
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
     * @return Sbtechlivecasinobetlogs
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
     * @return Sbtechlivecasinobetlogs
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
     * @return Sbtechlivecasinobetlogs
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
