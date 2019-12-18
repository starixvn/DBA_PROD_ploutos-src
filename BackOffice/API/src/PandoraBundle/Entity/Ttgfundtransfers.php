<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ttgfundtransfers
 *
 * @ORM\Table(name="TtgFundTransfers")
 * @ORM\Entity
 */
class Ttgfundtransfers
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
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="AccountId", type="string", length=50, nullable=true)
     */
    private $accountid;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrencyCode", type="string", length=5, nullable=true)
     */
    private $currencycode;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionId", type="string", length=50, nullable=true)
     */
    private $transactionid;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=50, nullable=true)
     */
    private $gameid;

    /**
     * @var integer
     *
     * @ORM\Column(name="TtgFundTransferTxnSubType", type="integer", nullable=true)
     */
    private $ttgfundtransfertxnsubtype;

    /**
     * @var string
     *
     * @ORM\Column(name="HandId", type="string", length=50, nullable=true)
     */
    private $handid;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerHandle", type="string", length=50, nullable=true)
     */
    private $playerhandle;

    /**
     * @var string
     *
     * @ORM\Column(name="GameplayId", type="string", length=50, nullable=true)
     */
    private $gameplayid;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrentBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $currentbalance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="NewBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $newbalance = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletId", type="bigint", nullable=true)
     */
    private $walletid = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingProcessed", type="boolean", nullable=false)
     */
    private $isbeingprocessed = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsProcessed", type="boolean", nullable=false)
     */
    private $isprocessed = true;

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
     * @ORM\Column(name="ProviderAccountId", type="string", length=50, nullable=true)
     */
    private $provideraccountid;

    /**
     * @var string
     *
     * @ORM\Column(name="CancelTxnId", type="string", length=50, nullable=true)
     */
    private $canceltxnid;

    /**
     * @var string
     *
     * @ORM\Column(name="DealId", type="string", length=50, nullable=true)
     */
    private $dealid;

    /**
     * @var string
     *
     * @ORM\Column(name="WagerId", type="string", length=50, nullable=true)
     */
    private $wagerid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsVoided", type="boolean", nullable=false)
     */
    private $isvoided = true;



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
     * Set userid
     *
     * @param string $userid
     *
     * @return Ttgfundtransfers
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
     * Set username
     *
     * @param string $username
     *
     * @return Ttgfundtransfers
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
     * Set accountid
     *
     * @param string $accountid
     *
     * @return Ttgfundtransfers
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
     * Set currencycode
     *
     * @param string $currencycode
     *
     * @return Ttgfundtransfers
     */
    public function setCurrencycode($currencycode)
    {
        $this->currencycode = $currencycode;

        return $this;
    }

    /**
     * Get currencycode
     *
     * @return string
     */
    public function getCurrencycode()
    {
        return $this->currencycode;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Ttgfundtransfers
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
     * Set transactionid
     *
     * @param string $transactionid
     *
     * @return Ttgfundtransfers
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
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Ttgfundtransfers
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
     * Set ttgfundtransfertxnsubtype
     *
     * @param integer $ttgfundtransfertxnsubtype
     *
     * @return Ttgfundtransfers
     */
    public function setTtgfundtransfertxnsubtype($ttgfundtransfertxnsubtype)
    {
        $this->ttgfundtransfertxnsubtype = $ttgfundtransfertxnsubtype;

        return $this;
    }

    /**
     * Get ttgfundtransfertxnsubtype
     *
     * @return integer
     */
    public function getTtgfundtransfertxnsubtype()
    {
        return $this->ttgfundtransfertxnsubtype;
    }

    /**
     * Set handid
     *
     * @param string $handid
     *
     * @return Ttgfundtransfers
     */
    public function setHandid($handid)
    {
        $this->handid = $handid;

        return $this;
    }

    /**
     * Get handid
     *
     * @return string
     */
    public function getHandid()
    {
        return $this->handid;
    }

    /**
     * Set playerhandle
     *
     * @param string $playerhandle
     *
     * @return Ttgfundtransfers
     */
    public function setPlayerhandle($playerhandle)
    {
        $this->playerhandle = $playerhandle;

        return $this;
    }

    /**
     * Get playerhandle
     *
     * @return string
     */
    public function getPlayerhandle()
    {
        return $this->playerhandle;
    }

    /**
     * Set gameplayid
     *
     * @param string $gameplayid
     *
     * @return Ttgfundtransfers
     */
    public function setGameplayid($gameplayid)
    {
        $this->gameplayid = $gameplayid;

        return $this;
    }

    /**
     * Get gameplayid
     *
     * @return string
     */
    public function getGameplayid()
    {
        return $this->gameplayid;
    }

    /**
     * Set currentbalance
     *
     * @param string $currentbalance
     *
     * @return Ttgfundtransfers
     */
    public function setCurrentbalance($currentbalance)
    {
        $this->currentbalance = $currentbalance;

        return $this;
    }

    /**
     * Get currentbalance
     *
     * @return string
     */
    public function getCurrentbalance()
    {
        return $this->currentbalance;
    }

    /**
     * Set newbalance
     *
     * @param string $newbalance
     *
     * @return Ttgfundtransfers
     */
    public function setNewbalance($newbalance)
    {
        $this->newbalance = $newbalance;

        return $this;
    }

    /**
     * Get newbalance
     *
     * @return string
     */
    public function getNewbalance()
    {
        return $this->newbalance;
    }

    /**
     * Set walletid
     *
     * @param integer $walletid
     *
     * @return Ttgfundtransfers
     */
    public function setWalletid($walletid)
    {
        $this->walletid = $walletid;

        return $this;
    }

    /**
     * Get walletid
     *
     * @return integer
     */
    public function getWalletid()
    {
        return $this->walletid;
    }

    /**
     * Set isbeingprocessed
     *
     * @param boolean $isbeingprocessed
     *
     * @return Ttgfundtransfers
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
     * Set isprocessed
     *
     * @param boolean $isprocessed
     *
     * @return Ttgfundtransfers
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

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Ttgfundtransfers
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
     * @return Ttgfundtransfers
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
     * @return Ttgfundtransfers
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
     * @return Ttgfundtransfers
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
     * @return Ttgfundtransfers
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
     * Set provideraccountid
     *
     * @param string $provideraccountid
     *
     * @return Ttgfundtransfers
     */
    public function setProvideraccountid($provideraccountid)
    {
        $this->provideraccountid = $provideraccountid;

        return $this;
    }

    /**
     * Get provideraccountid
     *
     * @return string
     */
    public function getProvideraccountid()
    {
        return $this->provideraccountid;
    }

    /**
     * Set canceltxnid
     *
     * @param string $canceltxnid
     *
     * @return Ttgfundtransfers
     */
    public function setCanceltxnid($canceltxnid)
    {
        $this->canceltxnid = $canceltxnid;

        return $this;
    }

    /**
     * Get canceltxnid
     *
     * @return string
     */
    public function getCanceltxnid()
    {
        return $this->canceltxnid;
    }

    /**
     * Set dealid
     *
     * @param string $dealid
     *
     * @return Ttgfundtransfers
     */
    public function setDealid($dealid)
    {
        $this->dealid = $dealid;

        return $this;
    }

    /**
     * Get dealid
     *
     * @return string
     */
    public function getDealid()
    {
        return $this->dealid;
    }

    /**
     * Set wagerid
     *
     * @param string $wagerid
     *
     * @return Ttgfundtransfers
     */
    public function setWagerid($wagerid)
    {
        $this->wagerid = $wagerid;

        return $this;
    }

    /**
     * Get wagerid
     *
     * @return string
     */
    public function getWagerid()
    {
        return $this->wagerid;
    }

    /**
     * Set isvoided
     *
     * @param boolean $isvoided
     *
     * @return Ttgfundtransfers
     */
    public function setIsvoided($isvoided)
    {
        $this->isvoided = $isvoided;

        return $this;
    }

    /**
     * Get isvoided
     *
     * @return boolean
     */
    public function getIsvoided()
    {
        return $this->isvoided;
    }
}
