<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ptbethistory
 *
 * @ORM\Table(name="PTBetHistory")
 * @ORM\Entity
 */
class Ptbethistory
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
     * @var \DateTime
     *
     * @ORM\Column(name="GameDate", type="datetime", nullable=true)
     */
    private $gamedate;

    /**
     * @var string
     *
     * @ORM\Column(name="GameType", type="string", length=100, nullable=true)
     */
    private $gametype;

    /**
     * @var string
     *
     * @ORM\Column(name="BetId", type="string", length=100, nullable=true)
     */
    private $betid;

    /**
     * @var string
     *
     * @ORM\Column(name="MemberCode", type="string", length=100, nullable=true)
     */
    private $membercode;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerGroup", type="string", length=100, nullable=true)
     */
    private $playergroup;

    /**
     * @var string
     *
     * @ORM\Column(name="Country", type="string", length=100, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="NoOfGames", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $noofgames = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalBets", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $totalbets = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="RealMoneyBets", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $realmoneybets = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="RealMoneyWins", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $realmoneywins = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="RealMoneyPayout", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $realmoneypayout = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalWins", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $totalwins = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="GameIncomeShare", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $gameincomeshare = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="GamePayoutPercent", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $gamepayoutpercent = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="ProgressiceShare", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $progressiceshare = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="ProgressiveWins", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $progressivewins = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalGameTips", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $totalgametips = '0.0000';

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
     * Set gamedate
     *
     * @param \DateTime $gamedate
     *
     * @return Ptbethistory
     */
    public function setGamedate($gamedate)
    {
        $this->gamedate = $gamedate;

        return $this;
    }

    /**
     * Get gamedate
     *
     * @return \DateTime
     */
    public function getGamedate()
    {
        return $this->gamedate;
    }

    /**
     * Set gametype
     *
     * @param string $gametype
     *
     * @return Ptbethistory
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
     * Set betid
     *
     * @param string $betid
     *
     * @return Ptbethistory
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
     * Set membercode
     *
     * @param string $membercode
     *
     * @return Ptbethistory
     */
    public function setMembercode($membercode)
    {
        $this->membercode = $membercode;

        return $this;
    }

    /**
     * Get membercode
     *
     * @return string
     */
    public function getMembercode()
    {
        return $this->membercode;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Ptbethistory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set playergroup
     *
     * @param string $playergroup
     *
     * @return Ptbethistory
     */
    public function setPlayergroup($playergroup)
    {
        $this->playergroup = $playergroup;

        return $this;
    }

    /**
     * Get playergroup
     *
     * @return string
     */
    public function getPlayergroup()
    {
        return $this->playergroup;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Ptbethistory
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set noofgames
     *
     * @param string $noofgames
     *
     * @return Ptbethistory
     */
    public function setNoofgames($noofgames)
    {
        $this->noofgames = $noofgames;

        return $this;
    }

    /**
     * Get noofgames
     *
     * @return string
     */
    public function getNoofgames()
    {
        return $this->noofgames;
    }

    /**
     * Set totalbets
     *
     * @param string $totalbets
     *
     * @return Ptbethistory
     */
    public function setTotalbets($totalbets)
    {
        $this->totalbets = $totalbets;

        return $this;
    }

    /**
     * Get totalbets
     *
     * @return string
     */
    public function getTotalbets()
    {
        return $this->totalbets;
    }

    /**
     * Set realmoneybets
     *
     * @param string $realmoneybets
     *
     * @return Ptbethistory
     */
    public function setRealmoneybets($realmoneybets)
    {
        $this->realmoneybets = $realmoneybets;

        return $this;
    }

    /**
     * Get realmoneybets
     *
     * @return string
     */
    public function getRealmoneybets()
    {
        return $this->realmoneybets;
    }

    /**
     * Set realmoneywins
     *
     * @param string $realmoneywins
     *
     * @return Ptbethistory
     */
    public function setRealmoneywins($realmoneywins)
    {
        $this->realmoneywins = $realmoneywins;

        return $this;
    }

    /**
     * Get realmoneywins
     *
     * @return string
     */
    public function getRealmoneywins()
    {
        return $this->realmoneywins;
    }

    /**
     * Set realmoneypayout
     *
     * @param string $realmoneypayout
     *
     * @return Ptbethistory
     */
    public function setRealmoneypayout($realmoneypayout)
    {
        $this->realmoneypayout = $realmoneypayout;

        return $this;
    }

    /**
     * Get realmoneypayout
     *
     * @return string
     */
    public function getRealmoneypayout()
    {
        return $this->realmoneypayout;
    }

    /**
     * Set totalwins
     *
     * @param string $totalwins
     *
     * @return Ptbethistory
     */
    public function setTotalwins($totalwins)
    {
        $this->totalwins = $totalwins;

        return $this;
    }

    /**
     * Get totalwins
     *
     * @return string
     */
    public function getTotalwins()
    {
        return $this->totalwins;
    }

    /**
     * Set gameincomeshare
     *
     * @param string $gameincomeshare
     *
     * @return Ptbethistory
     */
    public function setGameincomeshare($gameincomeshare)
    {
        $this->gameincomeshare = $gameincomeshare;

        return $this;
    }

    /**
     * Get gameincomeshare
     *
     * @return string
     */
    public function getGameincomeshare()
    {
        return $this->gameincomeshare;
    }

    /**
     * Set gamepayoutpercent
     *
     * @param string $gamepayoutpercent
     *
     * @return Ptbethistory
     */
    public function setGamepayoutpercent($gamepayoutpercent)
    {
        $this->gamepayoutpercent = $gamepayoutpercent;

        return $this;
    }

    /**
     * Get gamepayoutpercent
     *
     * @return string
     */
    public function getGamepayoutpercent()
    {
        return $this->gamepayoutpercent;
    }

    /**
     * Set progressiceshare
     *
     * @param string $progressiceshare
     *
     * @return Ptbethistory
     */
    public function setProgressiceshare($progressiceshare)
    {
        $this->progressiceshare = $progressiceshare;

        return $this;
    }

    /**
     * Get progressiceshare
     *
     * @return string
     */
    public function getProgressiceshare()
    {
        return $this->progressiceshare;
    }

    /**
     * Set progressivewins
     *
     * @param string $progressivewins
     *
     * @return Ptbethistory
     */
    public function setProgressivewins($progressivewins)
    {
        $this->progressivewins = $progressivewins;

        return $this;
    }

    /**
     * Get progressivewins
     *
     * @return string
     */
    public function getProgressivewins()
    {
        return $this->progressivewins;
    }

    /**
     * Set totalgametips
     *
     * @param string $totalgametips
     *
     * @return Ptbethistory
     */
    public function setTotalgametips($totalgametips)
    {
        $this->totalgametips = $totalgametips;

        return $this;
    }

    /**
     * Get totalgametips
     *
     * @return string
     */
    public function getTotalgametips()
    {
        return $this->totalgametips;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Ptbethistory
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
     * @return Ptbethistory
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
     * @return Ptbethistory
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
     * @return Ptbethistory
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
     * @return Ptbethistory
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
