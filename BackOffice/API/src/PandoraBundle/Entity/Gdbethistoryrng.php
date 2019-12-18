<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gdbethistoryrng
 *
 * @ORM\Table(name="GDBetHistoryRNG")
 * @ORM\Entity
 */
class Gdbethistoryrng
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
     * @ORM\Column(name="Time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="RNGID", type="string", length=100, nullable=true)
     */
    private $rngid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetID", type="string", length=100, nullable=true)
     */
    private $betid;

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
     * @ORM\Column(name="JackpotWin", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $jackpotwin;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=100, nullable=true)
     */
    private $status;

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
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Gdbethistoryrng
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set rngid
     *
     * @param string $rngid
     *
     * @return Gdbethistoryrng
     */
    public function setRngid($rngid)
    {
        $this->rngid = $rngid;

        return $this;
    }

    /**
     * Get rngid
     *
     * @return string
     */
    public function getRngid()
    {
        return $this->rngid;
    }

    /**
     * Set betid
     *
     * @param string $betid
     *
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
     * Set jackpotwin
     *
     * @param string $jackpotwin
     *
     * @return Gdbethistoryrng
     */
    public function setJackpotwin($jackpotwin)
    {
        $this->jackpotwin = $jackpotwin;

        return $this;
    }

    /**
     * Get jackpotwin
     *
     * @return string
     */
    public function getJackpotwin()
    {
        return $this->jackpotwin;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Gdbethistoryrng
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
     * @return Gdbethistoryrng
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
