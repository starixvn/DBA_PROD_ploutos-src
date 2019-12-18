<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hgbetlogs
 *
 * @ORM\Table(name="HGBetLogs")
 * @ORM\Entity
 */
class Hgbetlogs
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
     * @var \DateTime
     *
     * @ORM\Column(name="BetStartDate", type="datetime", nullable=true)
     */
    private $betstartdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BetEndDate", type="datetime", nullable=true)
     */
    private $betenddate;

    /**
     * @var string
     *
     * @ORM\Column(name="AccountId", type="string", length=100, nullable=true)
     */
    private $accountid;

    /**
     * @var string
     *
     * @ORM\Column(name="TableId", type="string", length=100, nullable=true)
     */
    private $tableid;

    /**
     * @var string
     *
     * @ORM\Column(name="TableName", type="string", length=200, nullable=true)
     */
    private $tablename;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=100, nullable=true)
     */
    private $gameid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetId", type="string", length=100, nullable=true)
     */
    private $betid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $betamount = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="Payout", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $payout = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=10, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="GameType", type="string", length=100, nullable=true)
     */
    private $gametype;

    /**
     * @var string
     *
     * @ORM\Column(name="BetSpot", type="string", length=100, nullable=true)
     */
    private $betspot;

    /**
     * @var string
     *
     * @ORM\Column(name="BetNo", type="string", length=100, nullable=true)
     */
    private $betno;

    /**
     * @var string
     *
     * @ORM\Column(name="BetMode", type="string", length=100, nullable=true)
     */
    private $betmode;

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
     * Set betstartdate
     *
     * @param \DateTime $betstartdate
     *
     * @return Hgbetlogs
     */
    public function setBetstartdate($betstartdate)
    {
        $this->betstartdate = $betstartdate;

        return $this;
    }

    /**
     * Get betstartdate
     *
     * @return \DateTime
     */
    public function getBetstartdate()
    {
        return $this->betstartdate;
    }

    /**
     * Set betenddate
     *
     * @param \DateTime $betenddate
     *
     * @return Hgbetlogs
     */
    public function setBetenddate($betenddate)
    {
        $this->betenddate = $betenddate;

        return $this;
    }

    /**
     * Get betenddate
     *
     * @return \DateTime
     */
    public function getBetenddate()
    {
        return $this->betenddate;
    }

    /**
     * Set accountid
     *
     * @param string $accountid
     *
     * @return Hgbetlogs
     */
    public function setAccountid($accountid)
    {
        $this->accountid = $accountid;

        return $this;
    }

    /**
     * Get accountid
     *
     * @return string
     */
    public function getAccountid()
    {
        return $this->accountid;
    }

    /**
     * Set tableid
     *
     * @param string $tableid
     *
     * @return Hgbetlogs
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
     * Set tablename
     *
     * @param string $tablename
     *
     * @return Hgbetlogs
     */
    public function setTablename($tablename)
    {
        $this->tablename = $tablename;

        return $this;
    }

    /**
     * Get tablename
     *
     * @return string
     */
    public function getTablename()
    {
        return $this->tablename;
    }

    /**
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Hgbetlogs
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
     * Set betid
     *
     * @param string $betid
     *
     * @return Hgbetlogs
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
     * Set betamount
     *
     * @param string $betamount
     *
     * @return Hgbetlogs
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
     * Set payout
     *
     * @param string $payout
     *
     * @return Hgbetlogs
     */
    public function setPayout($payout)
    {
        $this->payout = $payout;

        return $this;
    }

    /**
     * Get payout
     *
     * @return string
     */
    public function getPayout()
    {
        return $this->payout;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Hgbetlogs
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
     * Set gametype
     *
     * @param string $gametype
     *
     * @return Hgbetlogs
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
     * Set betspot
     *
     * @param string $betspot
     *
     * @return Hgbetlogs
     */
    public function setBetspot($betspot)
    {
        $this->betspot = $betspot;

        return $this;
    }

    /**
     * Get betspot
     *
     * @return string
     */
    public function getBetspot()
    {
        return $this->betspot;
    }

    /**
     * Set betno
     *
     * @param string $betno
     *
     * @return Hgbetlogs
     */
    public function setBetno($betno)
    {
        $this->betno = $betno;

        return $this;
    }

    /**
     * Get betno
     *
     * @return string
     */
    public function getBetno()
    {
        return $this->betno;
    }

    /**
     * Set betmode
     *
     * @param string $betmode
     *
     * @return Hgbetlogs
     */
    public function setBetmode($betmode)
    {
        $this->betmode = $betmode;

        return $this;
    }

    /**
     * Get betmode
     *
     * @return string
     */
    public function getBetmode()
    {
        return $this->betmode;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Hgbetlogs
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
     * @return Hgbetlogs
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
     * @return Hgbetlogs
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
     * @return Hgbetlogs
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
     * @return Hgbetlogs
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
