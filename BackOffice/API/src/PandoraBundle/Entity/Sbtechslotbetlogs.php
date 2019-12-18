<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sbtechslotbetlogs
 *
 * @ORM\Table(name="SBTechSlotBetLogs")
 * @ORM\Entity
 */
class Sbtechslotbetlogs
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
     * @ORM\Column(name="OperationCode", type="string", length=100, nullable=true)
     */
    private $operationcode;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $userid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ChangeTime", type="datetime", nullable=true)
     */
    private $changetime;

    /**
     * @var string
     *
     * @ORM\Column(name="ChangeType", type="string", length=100, nullable=true)
     */
    private $changetype;

    /**
     * @var string
     *
     * @ORM\Column(name="GameName", type="string", length=100, nullable=true)
     */
    private $gamename;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $betamount;

    /**
     * @var string
     *
     * @ORM\Column(name="ReturnAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $returnamount;

    /**
     * @var string
     *
     * @ORM\Column(name="EndBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $endbalance;

    /**
     * @var string
     *
     * @ORM\Column(name="ChangesAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $changesamount;

    /**
     * @var string
     *
     * @ORM\Column(name="Operator", type="string", length=100, nullable=true)
     */
    private $operator;

    /**
     * @var string
     *
     * @ORM\Column(name="JackpotContributionAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $jackpotcontributionamount;

    /**
     * @var string
     *
     * @ORM\Column(name="JackpotWin", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $jackpotwin;

    /**
     * @var string
     *
     * @ORM\Column(name="Platform", type="string", length=100, nullable=true)
     */
    private $platform;

    /**
     * @var string
     *
     * @ORM\Column(name="GameType", type="string", length=100, nullable=true)
     */
    private $gametype;

    /**
     * @var string
     *
     * @ORM\Column(name="Version", type="string", length=100, nullable=true)
     */
    private $version;

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
     * Set operationcode
     *
     * @param string $operationcode
     *
     * @return Sbtechslotbetlogs
     */
    public function setOperationcode($operationcode)
    {
        $this->operationcode = $operationcode;

        return $this;
    }

    /**
     * Get operationcode
     *
     * @return string
     */
    public function getOperationcode()
    {
        return $this->operationcode;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Sbtechslotbetlogs
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
     * Set changetime
     *
     * @param \DateTime $changetime
     *
     * @return Sbtechslotbetlogs
     */
    public function setChangetime($changetime)
    {
        $this->changetime = $changetime;

        return $this;
    }

    /**
     * Get changetime
     *
     * @return \DateTime
     */
    public function getChangetime()
    {
        return $this->changetime;
    }

    /**
     * Set changetype
     *
     * @param string $changetype
     *
     * @return Sbtechslotbetlogs
     */
    public function setChangetype($changetype)
    {
        $this->changetype = $changetype;

        return $this;
    }

    /**
     * Get changetype
     *
     * @return string
     */
    public function getChangetype()
    {
        return $this->changetype;
    }

    /**
     * Set gamename
     *
     * @param string $gamename
     *
     * @return Sbtechslotbetlogs
     */
    public function setGamename($gamename)
    {
        $this->gamename = $gamename;

        return $this;
    }

    /**
     * Get gamename
     *
     * @return string
     */
    public function getGamename()
    {
        return $this->gamename;
    }

    /**
     * Set betamount
     *
     * @param string $betamount
     *
     * @return Sbtechslotbetlogs
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
     * Set returnamount
     *
     * @param string $returnamount
     *
     * @return Sbtechslotbetlogs
     */
    public function setReturnamount($returnamount)
    {
        $this->returnamount = $returnamount;

        return $this;
    }

    /**
     * Get returnamount
     *
     * @return string
     */
    public function getReturnamount()
    {
        return $this->returnamount;
    }

    /**
     * Set endbalance
     *
     * @param string $endbalance
     *
     * @return Sbtechslotbetlogs
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
     * Set changesamount
     *
     * @param string $changesamount
     *
     * @return Sbtechslotbetlogs
     */
    public function setChangesamount($changesamount)
    {
        $this->changesamount = $changesamount;

        return $this;
    }

    /**
     * Get changesamount
     *
     * @return string
     */
    public function getChangesamount()
    {
        return $this->changesamount;
    }

    /**
     * Set operator
     *
     * @param string $operator
     *
     * @return Sbtechslotbetlogs
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set jackpotcontributionamount
     *
     * @param string $jackpotcontributionamount
     *
     * @return Sbtechslotbetlogs
     */
    public function setJackpotcontributionamount($jackpotcontributionamount)
    {
        $this->jackpotcontributionamount = $jackpotcontributionamount;

        return $this;
    }

    /**
     * Get jackpotcontributionamount
     *
     * @return string
     */
    public function getJackpotcontributionamount()
    {
        return $this->jackpotcontributionamount;
    }

    /**
     * Set jackpotwin
     *
     * @param string $jackpotwin
     *
     * @return Sbtechslotbetlogs
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
     * Set platform
     *
     * @param string $platform
     *
     * @return Sbtechslotbetlogs
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Set gametype
     *
     * @param string $gametype
     *
     * @return Sbtechslotbetlogs
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
     * Set version
     *
     * @param string $version
     *
     * @return Sbtechslotbetlogs
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Sbtechslotbetlogs
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
     * @return Sbtechslotbetlogs
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
     * @return Sbtechslotbetlogs
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
     * @return Sbtechslotbetlogs
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
     * @return Sbtechslotbetlogs
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
