<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gdbethistorycasino
 *
 * @ORM\Table(name="GDBetHistoryCasino")
 * @ORM\Entity
 */
class Gdbethistorycasino
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
     * @ORM\Column(name="No", type="string", length=100, nullable=true)
     */
    private $no;

    /**
     * @var string
     *
     * @ORM\Column(name="UserID", type="string", length=100, nullable=true)
     */
    private $userid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BetTime", type="datetime", nullable=true)
     */
    private $bettime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BalanceTime", type="datetime", nullable=true)
     */
    private $balancetime;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductID", type="string", length=100, nullable=true)
     */
    private $productid;

    /**
     * @var string
     *
     * @ORM\Column(name="GameInterface", type="string", length=100, nullable=true)
     */
    private $gameinterface;

    /**
     * @var string
     *
     * @ORM\Column(name="BetID", type="string", length=100, nullable=true)
     */
    private $betid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetType", type="string", length=200, nullable=true)
     */
    private $bettype;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $betamount;

    /**
     * @var string
     *
     * @ORM\Column(name="WinLossAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $winlossamount;

    /**
     * @var string
     *
     * @ORM\Column(name="BetResult", type="string", length=200, nullable=true)
     */
    private $betresult;

    /**
     * @var string
     *
     * @ORM\Column(name="StartBalance", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $startbalance;

    /**
     * @var string
     *
     * @ORM\Column(name="EndBalance", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $endbalance;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionID", type="string", length=100, nullable=true)
     */
    private $transactionid;

    /**
     * @var string
     *
     * @ORM\Column(name="Odds", type="string", length=100, nullable=true)
     */
    private $odds;

    /**
     * @var string
     *
     * @ORM\Column(name="GameID", type="string", length=100, nullable=true)
     */
    private $gameid;

    /**
     * @var string
     *
     * @ORM\Column(name="SubBetType", type="string", length=200, nullable=true)
     */
    private $subbettype;

    /**
     * @var string
     *
     * @ORM\Column(name="GameResult", type="string", length=200, nullable=true)
     */
    private $gameresult;

    /**
     * @var string
     *
     * @ORM\Column(name="WinningBet", type="string", length=200, nullable=true)
     */
    private $winningbet;

    /**
     * @var string
     *
     * @ORM\Column(name="TableID", type="string", length=100, nullable=true)
     */
    private $tableid;

    /**
     * @var string
     *
     * @ORM\Column(name="DealerID", type="string", length=100, nullable=true)
     */
    private $dealerid;

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
     * @ORM\Column(name="Currency", type="string", length=50, nullable=true)
     */
    private $currency;



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
     * Set no
     *
     * @param string $no
     *
     * @return Gdbethistorycasino
     */
    public function setNo($no)
    {
        $this->no = $no;

        return $this;
    }

    /**
     * Get no
     *
     * @return string
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Gdbethistorycasino
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
     * Set bettime
     *
     * @param \DateTime $bettime
     *
     * @return Gdbethistorycasino
     */
    public function setBettime($bettime)
    {
        $this->bettime = $bettime;

        return $this;
    }

    /**
     * Get bettime
     *
     * @return \DateTime
     */
    public function getBettime()
    {
        return $this->bettime;
    }

    /**
     * Set balancetime
     *
     * @param \DateTime $balancetime
     *
     * @return Gdbethistorycasino
     */
    public function setBalancetime($balancetime)
    {
        $this->balancetime = $balancetime;

        return $this;
    }

    /**
     * Get balancetime
     *
     * @return \DateTime
     */
    public function getBalancetime()
    {
        return $this->balancetime;
    }

    /**
     * Set productid
     *
     * @param string $productid
     *
     * @return Gdbethistorycasino
     */
    public function setProductid($productid)
    {
        $this->productid = $productid;

        return $this;
    }

    /**
     * Get productid
     *
     * @return string
     */
    public function getProductid()
    {
        return $this->productid;
    }

    /**
     * Set gameinterface
     *
     * @param string $gameinterface
     *
     * @return Gdbethistorycasino
     */
    public function setGameinterface($gameinterface)
    {
        $this->gameinterface = $gameinterface;

        return $this;
    }

    /**
     * Get gameinterface
     *
     * @return string
     */
    public function getGameinterface()
    {
        return $this->gameinterface;
    }

    /**
     * Set betid
     *
     * @param string $betid
     *
     * @return Gdbethistorycasino
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
     * Set bettype
     *
     * @param string $bettype
     *
     * @return Gdbethistorycasino
     */
    public function setBettype($bettype)
    {
        $this->bettype = $bettype;

        return $this;
    }

    /**
     * Get bettype
     *
     * @return string
     */
    public function getBettype()
    {
        return $this->bettype;
    }

    /**
     * Set betamount
     *
     * @param string $betamount
     *
     * @return Gdbethistorycasino
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
     * Set winlossamount
     *
     * @param string $winlossamount
     *
     * @return Gdbethistorycasino
     */
    public function setWinlossamount($winlossamount)
    {
        $this->winlossamount = $winlossamount;

        return $this;
    }

    /**
     * Get winlossamount
     *
     * @return string
     */
    public function getWinlossamount()
    {
        return $this->winlossamount;
    }

    /**
     * Set betresult
     *
     * @param string $betresult
     *
     * @return Gdbethistorycasino
     */
    public function setBetresult($betresult)
    {
        $this->betresult = $betresult;

        return $this;
    }

    /**
     * Get betresult
     *
     * @return string
     */
    public function getBetresult()
    {
        return $this->betresult;
    }

    /**
     * Set startbalance
     *
     * @param string $startbalance
     *
     * @return Gdbethistorycasino
     */
    public function setStartbalance($startbalance)
    {
        $this->startbalance = $startbalance;

        return $this;
    }

    /**
     * Get startbalance
     *
     * @return string
     */
    public function getStartbalance()
    {
        return $this->startbalance;
    }

    /**
     * Set endbalance
     *
     * @param string $endbalance
     *
     * @return Gdbethistorycasino
     */
    public function setEndbalance($endbalance)
    {
        $this->endbalance = $endbalance;

        return $this;
    }

    /**
     * Get endbalance
     *
     * @return string
     */
    public function getEndbalance()
    {
        return $this->endbalance;
    }

    /**
     * Set transactionid
     *
     * @param string $transactionid
     *
     * @return Gdbethistorycasino
     */
    public function setTransactionid($transactionid)
    {
        $this->transactionid = $transactionid;

        return $this;
    }

    /**
     * Get transactionid
     *
     * @return string
     */
    public function getTransactionid()
    {
        return $this->transactionid;
    }

    /**
     * Set odds
     *
     * @param string $odds
     *
     * @return Gdbethistorycasino
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
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Gdbethistorycasino
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
     * Set subbettype
     *
     * @param string $subbettype
     *
     * @return Gdbethistorycasino
     */
    public function setSubbettype($subbettype)
    {
        $this->subbettype = $subbettype;

        return $this;
    }

    /**
     * Get subbettype
     *
     * @return string
     */
    public function getSubbettype()
    {
        return $this->subbettype;
    }

    /**
     * Set gameresult
     *
     * @param string $gameresult
     *
     * @return Gdbethistorycasino
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
     * Set winningbet
     *
     * @param string $winningbet
     *
     * @return Gdbethistorycasino
     */
    public function setWinningbet($winningbet)
    {
        $this->winningbet = $winningbet;

        return $this;
    }

    /**
     * Get winningbet
     *
     * @return string
     */
    public function getWinningbet()
    {
        return $this->winningbet;
    }

    /**
     * Set tableid
     *
     * @param string $tableid
     *
     * @return Gdbethistorycasino
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
     * Set dealerid
     *
     * @param string $dealerid
     *
     * @return Gdbethistorycasino
     */
    public function setDealerid($dealerid)
    {
        $this->dealerid = $dealerid;

        return $this;
    }

    /**
     * Get dealerid
     *
     * @return string
     */
    public function getDealerid()
    {
        return $this->dealerid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Gdbethistorycasino
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
     * @return Gdbethistorycasino
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
     * @return Gdbethistorycasino
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
     * @return Gdbethistorycasino
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
     * @return Gdbethistorycasino
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
     * Set currency
     *
     * @param string $currency
     *
     * @return Gdbethistorycasino
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
}
