<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owcasinobetlogs
 *
 * @ORM\Table(name="OWCasinoBetLogs")
 * @ORM\Entity
 */
class Owcasinobetlogs
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
     * @var integer
     *
     * @ORM\Column(name="TransId", type="bigint", nullable=true)
     */
    private $transid;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerName", type="string", length=50, nullable=true)
     */
    private $playername;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionTime", type="datetime", nullable=true)
     */
    private $transactiontime;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchId", type="bigint", nullable=true)
     */
    private $matchid;

    /**
     * @var string
     *
     * @ORM\Column(name="SportType", type="string", length=20, nullable=true)
     */
    private $sporttype;

    /**
     * @var string
     *
     * @ORM\Column(name="TableNo", type="string", length=20, nullable=true)
     */
    private $tableno;

    /**
     * @var string
     *
     * @ORM\Column(name="HandNo", type="string", length=20, nullable=true)
     */
    private $handno;

    /**
     * @var integer
     *
     * @ORM\Column(name="BetType", type="integer", nullable=true)
     */
    private $bettype;

    /**
     * @var string
     *
     * @ORM\Column(name="BetTeam", type="string", length=20, nullable=true)
     */
    private $betteam;

    /**
     * @var string
     *
     * @ORM\Column(name="Odds", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $odds;

    /**
     * @var integer
     *
     * @ORM\Column(name="OddsType", type="integer", nullable=true)
     */
    private $oddstype;

    /**
     * @var string
     *
     * @ORM\Column(name="TicketStatus", type="string", length=20, nullable=true)
     */
    private $ticketstatus;

    /**
     * @var string
     *
     * @ORM\Column(name="Stake", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $stake;

    /**
     * @var string
     *
     * @ORM\Column(name="WinLoseAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $winloseamount;

    /**
     * @var string
     *
     * @ORM\Column(name="AfterAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $afteramount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="WinLostDateTime", type="datetime", nullable=true)
     */
    private $winlostdatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=15, nullable=true)
     */
    private $currency;

    /**
     * @var integer
     *
     * @ORM\Column(name="VersionKey", type="bigint", nullable=true)
     */
    private $versionkey;

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
     * Set transid
     *
     * @param integer $transid
     *
     * @return Owcasinobetlogs
     */
    public function setTransid($transid)
    {
        $this->transid = $transid;

        return $this;
    }

    /**
     * Get transid
     *
     * @return integer
     */
    public function getTransid()
    {
        return $this->transid;
    }

    /**
     * Set playername
     *
     * @param string $playername
     *
     * @return Owcasinobetlogs
     */
    public function setPlayername($playername)
    {
        $this->playername = $playername;

        return $this;
    }

    /**
     * Get playername
     *
     * @return string
     */
    public function getPlayername()
    {
        return $this->playername;
    }

    /**
     * Set transactiontime
     *
     * @param \DateTime $transactiontime
     *
     * @return Owcasinobetlogs
     */
    public function setTransactiontime($transactiontime)
    {
        $this->transactiontime = $transactiontime;

        return $this;
    }

    /**
     * Get transactiontime
     *
     * @return \DateTime
     */
    public function getTransactiontime()
    {
        return $this->transactiontime;
    }

    /**
     * Set matchid
     *
     * @param integer $matchid
     *
     * @return Owcasinobetlogs
     */
    public function setMatchid($matchid)
    {
        $this->matchid = $matchid;

        return $this;
    }

    /**
     * Get matchid
     *
     * @return integer
     */
    public function getMatchid()
    {
        return $this->matchid;
    }

    /**
     * Set sporttype
     *
     * @param string $sporttype
     *
     * @return Owcasinobetlogs
     */
    public function setSporttype($sporttype)
    {
        $this->sporttype = $sporttype;

        return $this;
    }

    /**
     * Get sporttype
     *
     * @return string
     */
    public function getSporttype()
    {
        return $this->sporttype;
    }

    /**
     * Set tableno
     *
     * @param string $tableno
     *
     * @return Owcasinobetlogs
     */
    public function setTableno($tableno)
    {
        $this->tableno = $tableno;

        return $this;
    }

    /**
     * Get tableno
     *
     * @return string
     */
    public function getTableno()
    {
        return $this->tableno;
    }

    /**
     * Set handno
     *
     * @param string $handno
     *
     * @return Owcasinobetlogs
     */
    public function setHandno($handno)
    {
        $this->handno = $handno;

        return $this;
    }

    /**
     * Get handno
     *
     * @return string
     */
    public function getHandno()
    {
        return $this->handno;
    }

    /**
     * Set bettype
     *
     * @param integer $bettype
     *
     * @return Owcasinobetlogs
     */
    public function setBettype($bettype)
    {
        $this->bettype = $bettype;

        return $this;
    }

    /**
     * Get bettype
     *
     * @return integer
     */
    public function getBettype()
    {
        return $this->bettype;
    }

    /**
     * Set betteam
     *
     * @param string $betteam
     *
     * @return Owcasinobetlogs
     */
    public function setBetteam($betteam)
    {
        $this->betteam = $betteam;

        return $this;
    }

    /**
     * Get betteam
     *
     * @return string
     */
    public function getBetteam()
    {
        return $this->betteam;
    }

    /**
     * Set odds
     *
     * @param string $odds
     *
     * @return Owcasinobetlogs
     */
    public function setOdds($odds)
    {
        $this->odds = $odds;

        return $this;
    }

    /**
     * Get odds
     *
     * @return string
     */
    public function getOdds()
    {
        return $this->odds;
    }

    /**
     * Set oddstype
     *
     * @param integer $oddstype
     *
     * @return Owcasinobetlogs
     */
    public function setOddstype($oddstype)
    {
        $this->oddstype = $oddstype;

        return $this;
    }

    /**
     * Get oddstype
     *
     * @return integer
     */
    public function getOddstype()
    {
        return $this->oddstype;
    }

    /**
     * Set ticketstatus
     *
     * @param string $ticketstatus
     *
     * @return Owcasinobetlogs
     */
    public function setTicketstatus($ticketstatus)
    {
        $this->ticketstatus = $ticketstatus;

        return $this;
    }

    /**
     * Get ticketstatus
     *
     * @return string
     */
    public function getTicketstatus()
    {
        return $this->ticketstatus;
    }

    /**
     * Set stake
     *
     * @param string $stake
     *
     * @return Owcasinobetlogs
     */
    public function setStake($stake)
    {
        $this->stake = $stake;

        return $this;
    }

    /**
     * Get stake
     *
     * @return string
     */
    public function getStake()
    {
        return $this->stake;
    }

    /**
     * Set winloseamount
     *
     * @param string $winloseamount
     *
     * @return Owcasinobetlogs
     */
    public function setWinloseamount($winloseamount)
    {
        $this->winloseamount = $winloseamount;

        return $this;
    }

    /**
     * Get winloseamount
     *
     * @return string
     */
    public function getWinloseamount()
    {
        return $this->winloseamount;
    }

    /**
     * Set afteramount
     *
     * @param string $afteramount
     *
     * @return Owcasinobetlogs
     */
    public function setAfteramount($afteramount)
    {
        $this->afteramount = $afteramount;

        return $this;
    }

    /**
     * Get afteramount
     *
     * @return string
     */
    public function getAfteramount()
    {
        return $this->afteramount;
    }

    /**
     * Set winlostdatetime
     *
     * @param \DateTime $winlostdatetime
     *
     * @return Owcasinobetlogs
     */
    public function setWinlostdatetime($winlostdatetime)
    {
        $this->winlostdatetime = $winlostdatetime;

        return $this;
    }

    /**
     * Get winlostdatetime
     *
     * @return \DateTime
     */
    public function getWinlostdatetime()
    {
        return $this->winlostdatetime;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Owcasinobetlogs
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
     * Set versionkey
     *
     * @param integer $versionkey
     *
     * @return Owcasinobetlogs
     */
    public function setVersionkey($versionkey)
    {
        $this->versionkey = $versionkey;

        return $this;
    }

    /**
     * Get versionkey
     *
     * @return integer
     */
    public function getVersionkey()
    {
        return $this->versionkey;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Owcasinobetlogs
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
     * @return Owcasinobetlogs
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
     * @return Owcasinobetlogs
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
     * @return Owcasinobetlogs
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
     * @return Owcasinobetlogs
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
