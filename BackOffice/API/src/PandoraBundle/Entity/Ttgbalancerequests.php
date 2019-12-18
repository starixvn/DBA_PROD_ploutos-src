<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ttgbalancerequests
 *
 * @ORM\Table(name="TtgBalanceRequests")
 * @ORM\Entity
 */
class Ttgbalancerequests
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
     * @ORM\Column(name="RequestType", type="string", length=20, nullable=true)
     */
    private $requesttype;

    /**
     * @var string
     *
     * @ORM\Column(name="AccountId", type="string", length=100, nullable=true)
     */
    private $accountid;

    /**
     * @var string
     *
     * @ORM\Column(name="ProviderAccountId", type="string", length=100, nullable=true)
     */
    private $provideraccountid;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=10, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerHandle", type="string", length=100, nullable=true)
     */
    private $playerhandle;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=20, nullable=true)
     */
    private $gameid;

    /**
     * @var string
     *
     * @ORM\Column(name="ErrorCode", type="string", length=20, nullable=true)
     */
    private $errorcode;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount;

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
     * Set requesttype
     *
     * @param string $requesttype
     *
     * @return Ttgbalancerequests
     */
    public function setRequesttype($requesttype)
    {
        $this->requesttype = $requesttype;

        return $this;
    }

    /**
     * Get requesttype
     *
     * @return string
     */
    public function getRequesttype()
    {
        return $this->requesttype;
    }

    /**
     * Set accountid
     *
     * @param string $accountid
     *
     * @return Ttgbalancerequests
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
     * Set provideraccountid
     *
     * @param string $provideraccountid
     *
     * @return Ttgbalancerequests
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
     * Set currency
     *
     * @param string $currency
     *
     * @return Ttgbalancerequests
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
     * Set playerhandle
     *
     * @param string $playerhandle
     *
     * @return Ttgbalancerequests
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
     * Set gameid
     *
     * @param string $gameid
     *
     * @return Ttgbalancerequests
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
     * Set errorcode
     *
     * @param string $errorcode
     *
     * @return Ttgbalancerequests
     */
    public function setErrorcode($errorcode)
    {
        $this->errorcode = $errorcode;

        return $this;
    }

    /**
     * Get errorcode
     *
     * @return string
     */
    public function getErrorcode()
    {
        return $this->errorcode;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Ttgbalancerequests
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
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Ttgbalancerequests
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
     * @return Ttgbalancerequests
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
     * @return Ttgbalancerequests
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
     * @return Ttgbalancerequests
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
     * @return Ttgbalancerequests
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
