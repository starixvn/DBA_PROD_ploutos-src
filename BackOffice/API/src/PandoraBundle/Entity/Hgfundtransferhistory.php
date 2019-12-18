<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hgfundtransferhistory
 *
 * @ORM\Table(name="HGFundTransferHistory")
 * @ORM\Entity
 */
class Hgfundtransferhistory
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
     * @ORM\Column(name="FundTransferType", type="string", length=100, nullable=true)
     */
    private $fundtransfertype;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrencyCode", type="string", length=10, nullable=true)
     */
    private $currencycode;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $amount = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionId", type="string", length=100, nullable=true)
     */
    private $transactionid;

    /**
     * @var string
     *
     * @ORM\Column(name="GameTypeId", type="string", length=50, nullable=true)
     */
    private $gametypeid;

    /**
     * @var integer
     *
     * @ORM\Column(name="TransactionSubTypeId", type="integer", nullable=true)
     */
    private $transactionsubtypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionSubTypeName", type="string", length=100, nullable=true)
     */
    private $transactionsubtypename;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=100, nullable=true)
     */
    private $gameid;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $bonusamount = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="RefTransactionId", type="bigint", nullable=true)
     */
    private $reftransactionid = '0';

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
     * Set fundtransfertype
     *
     * @param string $fundtransfertype
     *
     * @return Hgfundtransferhistory
     */
    public function setFundtransfertype($fundtransfertype)
    {
        $this->fundtransfertype = $fundtransfertype;

        return $this;
    }

    /**
     * Get fundtransfertype
     *
     * @return string
     */
    public function getFundtransfertype()
    {
        return $this->fundtransfertype;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Hgfundtransferhistory
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
     * Set currencycode
     *
     * @param string $currencycode
     *
     * @return Hgfundtransferhistory
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
     * @return Hgfundtransferhistory
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
     * @return Hgfundtransferhistory
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
     * Set gametypeid
     *
     * @param string $gametypeid
     *
     * @return Hgfundtransferhistory
     */
    public function setGametypeid($gametypeid)
    {
        $this->gametypeid = $gametypeid;

        return $this;
    }

    /**
     * Get gametypeid
     *
     * @return string
     */
    public function getGametypeid()
    {
        return $this->gametypeid;
    }

    /**
     * Set transactionsubtypeid
     *
     * @param integer $transactionsubtypeid
     *
     * @return Hgfundtransferhistory
     */
    public function setTransactionsubtypeid($transactionsubtypeid)
    {
        $this->transactionsubtypeid = $transactionsubtypeid;

        return $this;
    }

    /**
     * Get transactionsubtypeid
     *
     * @return integer
     */
    public function getTransactionsubtypeid()
    {
        return $this->transactionsubtypeid;
    }

    /**
     * Set transactionsubtypename
     *
     * @param string $transactionsubtypename
     *
     * @return Hgfundtransferhistory
     */
    public function setTransactionsubtypename($transactionsubtypename)
    {
        $this->transactionsubtypename = $transactionsubtypename;

        return $this;
    }

    /**
     * Get transactionsubtypename
     *
     * @return string
     */
    public function getTransactionsubtypename()
    {
        return $this->transactionsubtypename;
    }

    /**
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Hgfundtransferhistory
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
     * Set bonusamount
     *
     * @param string $bonusamount
     *
     * @return Hgfundtransferhistory
     */
    public function setBonusamount($bonusamount)
    {
        $this->bonusamount = $bonusamount;

        return $this;
    }

    /**
     * Get bonusamount
     *
     * @return string
     */
    public function getBonusamount()
    {
        return $this->bonusamount;
    }

    /**
     * Set reftransactionid
     *
     * @param integer $reftransactionid
     *
     * @return Hgfundtransferhistory
     */
    public function setReftransactionid($reftransactionid)
    {
        $this->reftransactionid = $reftransactionid;

        return $this;
    }

    /**
     * Get reftransactionid
     *
     * @return integer
     */
    public function getReftransactionid()
    {
        return $this->reftransactionid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Hgfundtransferhistory
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
     * @return Hgfundtransferhistory
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
     * @return Hgfundtransferhistory
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
     * @return Hgfundtransferhistory
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
     * @return Hgfundtransferhistory
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
