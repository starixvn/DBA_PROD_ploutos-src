<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpndepositresponses
 *
 * @ORM\Table(name="RpnDepositResponses", uniqueConstraints={@ORM\UniqueConstraint(name="OrderId", columns={"OrderId"})})
 * @ORM\Entity
 */
class Rpndepositresponses
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
     * @ORM\Column(name="PlayerRegistrationId", type="bigint", nullable=true)
     */
    private $playerregistrationid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerAccountNo", type="string", length=50, nullable=true)
     */
    private $playeraccountno;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerUserName", type="string", length=50, nullable=true)
     */
    private $playerusername;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderId", type="string", length=50, nullable=true)
     */
    private $orderid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OrderTime", type="datetime", nullable=true)
     */
    private $ordertime;

    /**
     * @var float
     *
     * @ORM\Column(name="OrderAmount", type="float", precision=10, scale=0, nullable=true)
     */
    private $orderamount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="StatementNo", type="string", length=50, nullable=true)
     */
    private $statementno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StatementDate", type="datetime", nullable=true)
     */
    private $statementdate;

    /**
     * @var float
     *
     * @ORM\Column(name="PayAmount", type="float", precision=10, scale=0, nullable=true)
     */
    private $payamount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PayResult", type="integer", nullable=true)
     */
    private $payresult = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="Signature", type="string", length=50, nullable=true)
     */
    private $signature;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ResponseDate", type="datetime", nullable=true)
     */
    private $responsedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="DepositId", type="bigint", nullable=true)
     */
    private $depositid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=255, nullable=true)
     */
    private $createdbyid;

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=255, nullable=true)
     */
    private $modifiedbyid;

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
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=true)
     */
    private $activerecord = '1';



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
     * Set playerregistrationid
     *
     * @param integer $playerregistrationid
     *
     * @return Rpndepositresponses
     */
    public function setPlayerregistrationid($playerregistrationid)
    {
        $this->playerregistrationid = $playerregistrationid;

        return $this;
    }

    /**
     * Get playerregistrationid
     *
     * @return integer
     */
    public function getPlayerregistrationid()
    {
        return $this->playerregistrationid;
    }

    /**
     * Set playeraccountno
     *
     * @param string $playeraccountno
     *
     * @return Rpndepositresponses
     */
    public function setPlayeraccountno($playeraccountno)
    {
        $this->playeraccountno = $playeraccountno;

        return $this;
    }

    /**
     * Get playeraccountno
     *
     * @return string
     */
    public function getPlayeraccountno()
    {
        return $this->playeraccountno;
    }

    /**
     * Set playerusername
     *
     * @param string $playerusername
     *
     * @return Rpndepositresponses
     */
    public function setPlayerusername($playerusername)
    {
        $this->playerusername = $playerusername;

        return $this;
    }

    /**
     * Get playerusername
     *
     * @return string
     */
    public function getPlayerusername()
    {
        return $this->playerusername;
    }

    /**
     * Set orderid
     *
     * @param string $orderid
     *
     * @return Rpndepositresponses
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    /**
     * Get orderid
     *
     * @return string
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set ordertime
     *
     * @param \DateTime $ordertime
     *
     * @return Rpndepositresponses
     */
    public function setOrdertime($ordertime)
    {
        $this->ordertime = $ordertime;

        return $this;
    }

    /**
     * Get ordertime
     *
     * @return \DateTime
     */
    public function getOrdertime()
    {
        return $this->ordertime;
    }

    /**
     * Set orderamount
     *
     * @param float $orderamount
     *
     * @return Rpndepositresponses
     */
    public function setOrderamount($orderamount)
    {
        $this->orderamount = $orderamount;

        return $this;
    }

    /**
     * Get orderamount
     *
     * @return float
     */
    public function getOrderamount()
    {
        return $this->orderamount;
    }

    /**
     * Set statementno
     *
     * @param string $statementno
     *
     * @return Rpndepositresponses
     */
    public function setStatementno($statementno)
    {
        $this->statementno = $statementno;

        return $this;
    }

    /**
     * Get statementno
     *
     * @return string
     */
    public function getStatementno()
    {
        return $this->statementno;
    }

    /**
     * Set statementdate
     *
     * @param \DateTime $statementdate
     *
     * @return Rpndepositresponses
     */
    public function setStatementdate($statementdate)
    {
        $this->statementdate = $statementdate;

        return $this;
    }

    /**
     * Get statementdate
     *
     * @return \DateTime
     */
    public function getStatementdate()
    {
        return $this->statementdate;
    }

    /**
     * Set payamount
     *
     * @param float $payamount
     *
     * @return Rpndepositresponses
     */
    public function setPayamount($payamount)
    {
        $this->payamount = $payamount;

        return $this;
    }

    /**
     * Get payamount
     *
     * @return float
     */
    public function getPayamount()
    {
        return $this->payamount;
    }

    /**
     * Set payresult
     *
     * @param integer $payresult
     *
     * @return Rpndepositresponses
     */
    public function setPayresult($payresult)
    {
        $this->payresult = $payresult;

        return $this;
    }

    /**
     * Get payresult
     *
     * @return integer
     */
    public function getPayresult()
    {
        return $this->payresult;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return Rpndepositresponses
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set responsedate
     *
     * @param \DateTime $responsedate
     *
     * @return Rpndepositresponses
     */
    public function setResponsedate($responsedate)
    {
        $this->responsedate = $responsedate;

        return $this;
    }

    /**
     * Get responsedate
     *
     * @return \DateTime
     */
    public function getResponsedate()
    {
        return $this->responsedate;
    }

    /**
     * Set depositid
     *
     * @param integer $depositid
     *
     * @return Rpndepositresponses
     */
    public function setDepositid($depositid)
    {
        $this->depositid = $depositid;

        return $this;
    }

    /**
     * Get depositid
     *
     * @return integer
     */
    public function getDepositid()
    {
        return $this->depositid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Rpndepositresponses
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
     * @return Rpndepositresponses
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
     * @return Rpndepositresponses
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
     * @return Rpndepositresponses
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
     * @return Rpndepositresponses
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
