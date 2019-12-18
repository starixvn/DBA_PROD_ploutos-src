<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gdgamebetresult
 *
 * @ORM\Table(name="GDGameBetResult")
 * @ORM\Entity
 */
class Gdgamebetresult
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
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $playerprofileid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="GameBetId", type="bigint", nullable=false)
     */
    private $gamebetid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=100, nullable=true)
     */
    private $gameid;

    /**
     * @var string
     *
     * @ORM\Column(name="GameType", type="string", length=100, nullable=true)
     */
    private $gametype;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionId", type="string", length=100, nullable=true)
     */
    private $transactionid;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=50, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="ValidBetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $validbetamount;

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
     * @var boolean
     *
     * @ORM\Column(name="CloseFlag", type="boolean", nullable=false)
     */
    private $closeflag = true;

    /**
     * @var string
     *
     * @ORM\Column(name="LoginToken", type="string", length=200, nullable=true)
     */
    private $logintoken;

    /**
     * @var string
     *
     * @ORM\Column(name="LinkId", type="string", length=200, nullable=true)
     */
    private $linkid;

    /**
     * @var string
     *
     * @ORM\Column(name="TurnOver", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $turnover;

    /**
     * @var string
     *
     * @ORM\Column(name="WinLoss", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $winloss;

    /**
     * @var string
     *
     * @ORM\Column(name="BeforeWinBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $beforewinbalance;

    /**
     * @var string
     *
     * @ORM\Column(name="AfterWinBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $afterwinbalance;



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
     * Set playerprofileid
     *
     * @param integer $playerprofileid
     *
     * @return Gdgamebetresult
     */
    public function setPlayerprofileid($playerprofileid)
    {
        $this->playerprofileid = $playerprofileid;

        return $this;
    }

    /**
     * Get playerprofileid
     *
     * @return integer
     */
    public function getPlayerprofileid()
    {
        return $this->playerprofileid;
    }

    /**
     * Set gamebetid
     *
     * @param integer $gamebetid
     *
     * @return Gdgamebetresult
     */
    public function setGamebetid($gamebetid)
    {
        $this->gamebetid = $gamebetid;

        return $this;
    }

    /**
     * Get gamebetid
     *
     * @return integer
     */
    public function getGamebetid()
    {
        return $this->gamebetid;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Gdgamebetresult
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
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Gdgamebetresult
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
     * Set gametype
     *
     * @param string $gametype
     *
     * @return Gdgamebetresult
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
     * Set transactionid
     *
     * @param string $transactionid
     *
     * @return Gdgamebetresult
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
     * Set amount
     *
     * @param string $amount
     *
     * @return Gdgamebetresult
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
     * Set currency
     *
     * @param string $currency
     *
     * @return Gdgamebetresult
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
     * Set validbetamount
     *
     * @param string $validbetamount
     *
     * @return Gdgamebetresult
     */
    public function setValidbetamount($validbetamount)
    {
        $this->validbetamount = $validbetamount;

        return $this;
    }

    /**
     * Get validbetamount
     *
     * @return string
     */
    public function getValidbetamount()
    {
        return $this->validbetamount;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Gdgamebetresult
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
     * @return Gdgamebetresult
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
     * @return Gdgamebetresult
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
     * @return Gdgamebetresult
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
     * @return Gdgamebetresult
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
     * Set closeflag
     *
     * @param boolean $closeflag
     *
     * @return Gdgamebetresult
     */
    public function setCloseflag($closeflag)
    {
        $this->closeflag = $closeflag;

        return $this;
    }

    /**
     * Get closeflag
     *
     * @return boolean
     */
    public function getCloseflag()
    {
        return $this->closeflag;
    }

    /**
     * Set logintoken
     *
     * @param string $logintoken
     *
     * @return Gdgamebetresult
     */
    public function setLogintoken($logintoken)
    {
        $this->logintoken = $logintoken;

        return $this;
    }

    /**
     * Get logintoken
     *
     * @return string
     */
    public function getLogintoken()
    {
        return $this->logintoken;
    }

    /**
     * Set linkid
     *
     * @param string $linkid
     *
     * @return Gdgamebetresult
     */
    public function setLinkid($linkid)
    {
        $this->linkid = $linkid;

        return $this;
    }

    /**
     * Get linkid
     *
     * @return string
     */
    public function getLinkid()
    {
        return $this->linkid;
    }

    /**
     * Set turnover
     *
     * @param string $turnover
     *
     * @return Gdgamebetresult
     */
    public function setTurnover($turnover)
    {
        $this->turnover = $turnover;

        return $this;
    }

    /**
     * Get turnover
     *
     * @return string
     */
    public function getTurnover()
    {
        return $this->turnover;
    }

    /**
     * Set winloss
     *
     * @param string $winloss
     *
     * @return Gdgamebetresult
     */
    public function setWinloss($winloss)
    {
        $this->winloss = $winloss;

        return $this;
    }

    /**
     * Get winloss
     *
     * @return string
     */
    public function getWinloss()
    {
        return $this->winloss;
    }

    /**
     * Set beforewinbalance
     *
     * @param string $beforewinbalance
     *
     * @return Gdgamebetresult
     */
    public function setBeforewinbalance($beforewinbalance)
    {
        $this->beforewinbalance = $beforewinbalance;

        return $this;
    }

    /**
     * Get beforewinbalance
     *
     * @return string
     */
    public function getBeforewinbalance()
    {
        return $this->beforewinbalance;
    }

    /**
     * Set afterwinbalance
     *
     * @param string $afterwinbalance
     *
     * @return Gdgamebetresult
     */
    public function setAfterwinbalance($afterwinbalance)
    {
        $this->afterwinbalance = $afterwinbalance;

        return $this;
    }

    /**
     * Get afterwinbalance
     *
     * @return string
     */
    public function getAfterwinbalance()
    {
        return $this->afterwinbalance;
    }
}
