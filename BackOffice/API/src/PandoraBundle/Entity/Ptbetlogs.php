<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ptbetlogs
 *
 * @ORM\Table(name="PTBetLogs")
 * @ORM\Entity
 */
class Ptbetlogs
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
     * @ORM\Column(name="PlayerName", type="string", length=100, nullable=true)
     */
    private $playername;

    /**
     * @var string
     *
     * @ORM\Column(name="WindowCode", type="string", length=100, nullable=true)
     */
    private $windowcode;

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
     * @ORM\Column(name="GameType", type="string", length=100, nullable=true)
     */
    private $gametype;

    /**
     * @var string
     *
     * @ORM\Column(name="GameName", type="string", length=255, nullable=true)
     */
    private $gamename;

    /**
     * @var string
     *
     * @ORM\Column(name="SessionId", type="string", length=100, nullable=true)
     */
    private $sessionid;

    /**
     * @var string
     *
     * @ORM\Column(name="Bet", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $bet;

    /**
     * @var string
     *
     * @ORM\Column(name="Win", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $win;

    /**
     * @var string
     *
     * @ORM\Column(name="ProgressiveBet", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $progressivebet;

    /**
     * @var string
     *
     * @ORM\Column(name="ProgressiveWin", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $progressivewin;

    /**
     * @var string
     *
     * @ORM\Column(name="Balance", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $balance;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrentBet", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $currentbet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GameDate", type="datetime", nullable=true)
     */
    private $gamedate;

    /**
     * @var string
     *
     * @ORM\Column(name="LiveNetword", type="string", length=100, nullable=true)
     */
    private $livenetword;

    /**
     * @var integer
     *
     * @ORM\Column(name="RNum", type="bigint", nullable=true)
     */
    private $rnum;

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
     * @ORM\Column(name="GameInitial", type="string", length=100, nullable=true)
     */
    private $gameinitial;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsProcessed", type="boolean", nullable=false)
     */
    private $isprocessed = true;



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
     * Set playername
     *
     * @param string $playername
     *
     * @return Ptbetlogs
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
     * Set windowcode
     *
     * @param string $windowcode
     *
     * @return Ptbetlogs
     */
    public function setWindowcode($windowcode)
    {
        $this->windowcode = $windowcode;

        return $this;
    }

    /**
     * Get windowcode
     *
     * @return string
     */
    public function getWindowcode()
    {
        return $this->windowcode;
    }

    /**
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Ptbetlogs
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
     * @return Ptbetlogs
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
     * Set gametype
     *
     * @param string $gametype
     *
     * @return Ptbetlogs
     */
    public function setGametype($gametype)
    {
        $this->gametype = $gametype;

        return $this;
    }

    /**
     * Get gametype
     *
     * @return string
     */
    public function getGametype()
    {
        return $this->gametype;
    }

    /**
     * Set gamename
     *
     * @param string $gamename
     *
     * @return Ptbetlogs
     */
    public function setGamename($gamename)
    {
        $this->gamename = $gamename;

        return $this;
    }

    /**
     * Get gamename
     *
     * @return string
     */
    public function getGamename()
    {
        return $this->gamename;
    }

    /**
     * Set sessionid
     *
     * @param string $sessionid
     *
     * @return Ptbetlogs
     */
    public function setSessionid($sessionid)
    {
        $this->sessionid = $sessionid;

        return $this;
    }

    /**
     * Get sessionid
     *
     * @return string
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Set bet
     *
     * @param string $bet
     *
     * @return Ptbetlogs
     */
    public function setBet($bet)
    {
        $this->bet = $bet;

        return $this;
    }

    /**
     * Get bet
     *
     * @return string
     */
    public function getBet()
    {
        return $this->bet;
    }

    /**
     * Set win
     *
     * @param string $win
     *
     * @return Ptbetlogs
     */
    public function setWin($win)
    {
        $this->win = $win;

        return $this;
    }

    /**
     * Get win
     *
     * @return string
     */
    public function getWin()
    {
        return $this->win;
    }

    /**
     * Set progressivebet
     *
     * @param string $progressivebet
     *
     * @return Ptbetlogs
     */
    public function setProgressivebet($progressivebet)
    {
        $this->progressivebet = $progressivebet;

        return $this;
    }

    /**
     * Get progressivebet
     *
     * @return string
     */
    public function getProgressivebet()
    {
        return $this->progressivebet;
    }

    /**
     * Set progressivewin
     *
     * @param string $progressivewin
     *
     * @return Ptbetlogs
     */
    public function setProgressivewin($progressivewin)
    {
        $this->progressivewin = $progressivewin;

        return $this;
    }

    /**
     * Get progressivewin
     *
     * @return string
     */
    public function getProgressivewin()
    {
        return $this->progressivewin;
    }

    /**
     * Set balance
     *
     * @param string $balance
     *
     * @return Ptbetlogs
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
     * Set currentbet
     *
     * @param string $currentbet
     *
     * @return Ptbetlogs
     */
    public function setCurrentbet($currentbet)
    {
        $this->currentbet = $currentbet;

        return $this;
    }

    /**
     * Get currentbet
     *
     * @return string
     */
    public function getCurrentbet()
    {
        return $this->currentbet;
    }

    /**
     * Set gamedate
     *
     * @param \DateTime $gamedate
     *
     * @return Ptbetlogs
     */
    public function setGamedate($gamedate)
    {
        $this->gamedate = $gamedate;

        return $this;
    }

    /**
     * Get gamedate
     *
     * @return \DateTime
     */
    public function getGamedate()
    {
        return $this->gamedate;
    }

    /**
     * Set livenetword
     *
     * @param string $livenetword
     *
     * @return Ptbetlogs
     */
    public function setLivenetword($livenetword)
    {
        $this->livenetword = $livenetword;

        return $this;
    }

    /**
     * Get livenetword
     *
     * @return string
     */
    public function getLivenetword()
    {
        return $this->livenetword;
    }

    /**
     * Set rnum
     *
     * @param integer $rnum
     *
     * @return Ptbetlogs
     */
    public function setRnum($rnum)
    {
        $this->rnum = $rnum;

        return $this;
    }

    /**
     * Get rnum
     *
     * @return integer
     */
    public function getRnum()
    {
        return $this->rnum;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Ptbetlogs
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
     * @return Ptbetlogs
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
     * @return Ptbetlogs
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
     * @return Ptbetlogs
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
     * @return Ptbetlogs
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
     * Set gameinitial
     *
     * @param string $gameinitial
     *
     * @return Ptbetlogs
     */
    public function setGameinitial($gameinitial)
    {
        $this->gameinitial = $gameinitial;

        return $this;
    }

    /**
     * Get gameinitial
     *
     * @return string
     */
    public function getGameinitial()
    {
        return $this->gameinitial;
    }

    /**
     * Set isprocessed
     *
     * @param boolean $isprocessed
     *
     * @return Ptbetlogs
     */
    public function setIsprocessed($isprocessed)
    {
        $this->isprocessed = $isprocessed;

        return $this;
    }

    /**
     * Get isprocessed
     *
     * @return boolean
     */
    public function getIsprocessed()
    {
        return $this->isprocessed;
    }
}
