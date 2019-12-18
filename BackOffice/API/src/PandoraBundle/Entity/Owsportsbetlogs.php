<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owsportsbetlogs
 *
 * @ORM\Table(name="OWSportsBetLogs")
 * @ORM\Entity
 */
class Owsportsbetlogs
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
     * @var integer
     *
     * @ORM\Column(name="LeagueId", type="integer", nullable=true)
     */
    private $leagueid;

    /**
     * @var string
     *
     * @ORM\Column(name="LeagueName", type="string", length=200, nullable=true)
     */
    private $leaguename;

    /**
     * @var string
     *
     * @ORM\Column(name="SportType", type="string", length=50, nullable=true)
     */
    private $sporttype;

    /**
     * @var integer
     *
     * @ORM\Column(name="AwayId", type="bigint", nullable=true)
     */
    private $awayid;

    /**
     * @var string
     *
     * @ORM\Column(name="AwayIDName", type="string", length=50, nullable=true)
     */
    private $awayidname;

    /**
     * @var integer
     *
     * @ORM\Column(name="HomeId", type="bigint", nullable=true)
     */
    private $homeid;

    /**
     * @var string
     *
     * @ORM\Column(name="HomeIDName", type="string", length=50, nullable=true)
     */
    private $homeidname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MatchDateTime", type="datetime", nullable=true)
     */
    private $matchdatetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="BetType", type="integer", nullable=true)
     */
    private $bettype;

    /**
     * @var integer
     *
     * @ORM\Column(name="ParlayRefNo", type="bigint", nullable=true)
     */
    private $parlayrefno;

    /**
     * @var string
     *
     * @ORM\Column(name="BetTeam", type="string", length=50, nullable=true)
     */
    private $betteam;

    /**
     * @var string
     *
     * @ORM\Column(name="HDP", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $hdp;

    /**
     * @var string
     *
     * @ORM\Column(name="AwayHDP", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $awayhdp;

    /**
     * @var string
     *
     * @ORM\Column(name="HomeHDP", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $homehdp;

    /**
     * @var string
     *
     * @ORM\Column(name="Odds", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $odds;

    /**
     * @var string
     *
     * @ORM\Column(name="AwayScore", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $awayscore;

    /**
     * @var string
     *
     * @ORM\Column(name="HomeScore", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $homescore;

    /**
     * @var string
     *
     * @ORM\Column(name="TicketStatus", type="string", length=100, nullable=true)
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
     * @var \DateTime
     *
     * @ORM\Column(name="WinLostDateTime", type="datetime", nullable=true)
     */
    private $winlostdatetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="VersionKey", type="bigint", nullable=true)
     */
    private $versionkey;

    /**
     * @var string
     *
     * @ORM\Column(name="LastBallNo", type="string", length=50, nullable=true)
     */
    private $lastballno;

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
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * Set leagueid
     *
     * @param integer $leagueid
     *
     * @return Owsportsbetlogs
     */
    public function setLeagueid($leagueid)
    {
        $this->leagueid = $leagueid;

        return $this;
    }

    /**
     * Get leagueid
     *
     * @return integer
     */
    public function getLeagueid()
    {
        return $this->leagueid;
    }

    /**
     * Set leaguename
     *
     * @param string $leaguename
     *
     * @return Owsportsbetlogs
     */
    public function setLeaguename($leaguename)
    {
        $this->leaguename = $leaguename;

        return $this;
    }

    /**
     * Get leaguename
     *
     * @return string
     */
    public function getLeaguename()
    {
        return $this->leaguename;
    }

    /**
     * Set sporttype
     *
     * @param string $sporttype
     *
     * @return Owsportsbetlogs
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
     * Set awayid
     *
     * @param integer $awayid
     *
     * @return Owsportsbetlogs
     */
    public function setAwayid($awayid)
    {
        $this->awayid = $awayid;

        return $this;
    }

    /**
     * Get awayid
     *
     * @return integer
     */
    public function getAwayid()
    {
        return $this->awayid;
    }

    /**
     * Set awayidname
     *
     * @param string $awayidname
     *
     * @return Owsportsbetlogs
     */
    public function setAwayidname($awayidname)
    {
        $this->awayidname = $awayidname;

        return $this;
    }

    /**
     * Get awayidname
     *
     * @return string
     */
    public function getAwayidname()
    {
        return $this->awayidname;
    }

    /**
     * Set homeid
     *
     * @param integer $homeid
     *
     * @return Owsportsbetlogs
     */
    public function setHomeid($homeid)
    {
        $this->homeid = $homeid;

        return $this;
    }

    /**
     * Get homeid
     *
     * @return integer
     */
    public function getHomeid()
    {
        return $this->homeid;
    }

    /**
     * Set homeidname
     *
     * @param string $homeidname
     *
     * @return Owsportsbetlogs
     */
    public function setHomeidname($homeidname)
    {
        $this->homeidname = $homeidname;

        return $this;
    }

    /**
     * Get homeidname
     *
     * @return string
     */
    public function getHomeidname()
    {
        return $this->homeidname;
    }

    /**
     * Set matchdatetime
     *
     * @param \DateTime $matchdatetime
     *
     * @return Owsportsbetlogs
     */
    public function setMatchdatetime($matchdatetime)
    {
        $this->matchdatetime = $matchdatetime;

        return $this;
    }

    /**
     * Get matchdatetime
     *
     * @return \DateTime
     */
    public function getMatchdatetime()
    {
        return $this->matchdatetime;
    }

    /**
     * Set bettype
     *
     * @param integer $bettype
     *
     * @return Owsportsbetlogs
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
     * Set parlayrefno
     *
     * @param integer $parlayrefno
     *
     * @return Owsportsbetlogs
     */
    public function setParlayrefno($parlayrefno)
    {
        $this->parlayrefno = $parlayrefno;

        return $this;
    }

    /**
     * Get parlayrefno
     *
     * @return integer
     */
    public function getParlayrefno()
    {
        return $this->parlayrefno;
    }

    /**
     * Set betteam
     *
     * @param string $betteam
     *
     * @return Owsportsbetlogs
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
     * Set hdp
     *
     * @param string $hdp
     *
     * @return Owsportsbetlogs
     */
    public function setHdp($hdp)
    {
        $this->hdp = $hdp;

        return $this;
    }

    /**
     * Get hdp
     *
     * @return string
     */
    public function getHdp()
    {
        return $this->hdp;
    }

    /**
     * Set awayhdp
     *
     * @param string $awayhdp
     *
     * @return Owsportsbetlogs
     */
    public function setAwayhdp($awayhdp)
    {
        $this->awayhdp = $awayhdp;

        return $this;
    }

    /**
     * Get awayhdp
     *
     * @return string
     */
    public function getAwayhdp()
    {
        return $this->awayhdp;
    }

    /**
     * Set homehdp
     *
     * @param string $homehdp
     *
     * @return Owsportsbetlogs
     */
    public function setHomehdp($homehdp)
    {
        $this->homehdp = $homehdp;

        return $this;
    }

    /**
     * Get homehdp
     *
     * @return string
     */
    public function getHomehdp()
    {
        return $this->homehdp;
    }

    /**
     * Set odds
     *
     * @param string $odds
     *
     * @return Owsportsbetlogs
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
     * Set awayscore
     *
     * @param string $awayscore
     *
     * @return Owsportsbetlogs
     */
    public function setAwayscore($awayscore)
    {
        $this->awayscore = $awayscore;

        return $this;
    }

    /**
     * Get awayscore
     *
     * @return string
     */
    public function getAwayscore()
    {
        return $this->awayscore;
    }

    /**
     * Set homescore
     *
     * @param string $homescore
     *
     * @return Owsportsbetlogs
     */
    public function setHomescore($homescore)
    {
        $this->homescore = $homescore;

        return $this;
    }

    /**
     * Get homescore
     *
     * @return string
     */
    public function getHomescore()
    {
        return $this->homescore;
    }

    /**
     * Set ticketstatus
     *
     * @param string $ticketstatus
     *
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * Set winlostdatetime
     *
     * @param \DateTime $winlostdatetime
     *
     * @return Owsportsbetlogs
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
     * Set versionkey
     *
     * @param integer $versionkey
     *
     * @return Owsportsbetlogs
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
     * Set lastballno
     *
     * @param string $lastballno
     *
     * @return Owsportsbetlogs
     */
    public function setLastballno($lastballno)
    {
        $this->lastballno = $lastballno;

        return $this;
    }

    /**
     * Get lastballno
     *
     * @return string
     */
    public function getLastballno()
    {
        return $this->lastballno;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
     * @return Owsportsbetlogs
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
