<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gdgamebettransactions
 *
 * @ORM\Table(name="GDGameBetTransactions")
 * @ORM\Entity
 */
class Gdgamebettransactions
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
     * @ORM\Column(name="GameType", type="string", length=200, nullable=true)
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
     * @ORM\Column(name="ReferenceTransactionId", type="string", length=100, nullable=true)
     */
    private $referencetransactionid;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionType", type="string", length=100, nullable=true)
     */
    private $transactiontype;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="RunningBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $runningbalance;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=50, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="IPAddress", type="string", length=100, nullable=true)
     */
    private $ipaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="GameView", type="string", length=200, nullable=true)
     */
    private $gameview;

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
     * @var boolean
     *
     * @ORM\Column(name="CloseFlag", type="boolean", nullable=false)
     */
    private $closeflag = true;

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=200, nullable=true)
     */
    private $remarks;

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
     * @ORM\Column(name="BeginningBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $beginningbalance;



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
     * @return Gdgamebettransactions
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
     * Set userid
     *
     * @param string $userid
     *
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * Set referencetransactionid
     *
     * @param string $referencetransactionid
     *
     * @return Gdgamebettransactions
     */
    public function setReferencetransactionid($referencetransactionid)
    {
        $this->referencetransactionid = $referencetransactionid;

        return $this;
    }

    /**
     * Get referencetransactionid
     *
     * @return string
     */
    public function getReferencetransactionid()
    {
        return $this->referencetransactionid;
    }

    /**
     * Set transactiontype
     *
     * @param string $transactiontype
     *
     * @return Gdgamebettransactions
     */
    public function setTransactiontype($transactiontype)
    {
        $this->transactiontype = $transactiontype;

        return $this;
    }

    /**
     * Get transactiontype
     *
     * @return string
     */
    public function getTransactiontype()
    {
        return $this->transactiontype;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Gdgamebettransactions
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
     * Set runningbalance
     *
     * @param string $runningbalance
     *
     * @return Gdgamebettransactions
     */
    public function setRunningbalance($runningbalance)
    {
        $this->runningbalance = $runningbalance;

        return $this;
    }

    /**
     * Get runningbalance
     *
     * @return string
     */
    public function getRunningbalance()
    {
        return $this->runningbalance;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Gdgamebettransactions
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
     * Set ipaddress
     *
     * @param string $ipaddress
     *
     * @return Gdgamebettransactions
     */
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress
     *
     * @return string
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Set gameview
     *
     * @param string $gameview
     *
     * @return Gdgamebettransactions
     */
    public function setGameview($gameview)
    {
        $this->gameview = $gameview;

        return $this;
    }

    /**
     * Get gameview
     *
     * @return string
     */
    public function getGameview()
    {
        return $this->gameview;
    }

    /**
     * Set logintoken
     *
     * @param string $logintoken
     *
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * Set closeflag
     *
     * @param boolean $closeflag
     *
     * @return Gdgamebettransactions
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
     * Set remarks
     *
     * @param string $remarks
     *
     * @return Gdgamebettransactions
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * @return Gdgamebettransactions
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
     * Set beginningbalance
     *
     * @param string $beginningbalance
     *
     * @return Gdgamebettransactions
     */
    public function setBeginningbalance($beginningbalance)
    {
        $this->beginningbalance = $beginningbalance;

        return $this;
    }

    /**
     * Get beginningbalance
     *
     * @return string
     */
    public function getBeginningbalance()
    {
        return $this->beginningbalance;
    }
}
