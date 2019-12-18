<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gdcancelledgamebets
 *
 * @ORM\Table(name="GDCancelledGameBets")
 * @ORM\Entity
 */
class Gdcancelledgamebets
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
     * @ORM\Column(name="CancelReason", type="string", length=100, nullable=true)
     */
    private $cancelreason;

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
     * Set playerprofileid
     *
     * @param integer $playerprofileid
     *
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * Set cancelreason
     *
     * @param string $cancelreason
     *
     * @return Gdcancelledgamebets
     */
    public function setCancelreason($cancelreason)
    {
        $this->cancelreason = $cancelreason;

        return $this;
    }

    /**
     * Get cancelreason
     *
     * @return string
     */
    public function getCancelreason()
    {
        return $this->cancelreason;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
     * @return Gdcancelledgamebets
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
