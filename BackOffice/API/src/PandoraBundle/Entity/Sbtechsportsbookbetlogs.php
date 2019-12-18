<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sbtechsportsbookbetlogs
 *
 * @ORM\Table(name="SBTechSportsBookBetLogs")
 * @ORM\Entity
 */
class Sbtechsportsbookbetlogs
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
     * @ORM\Column(name="RowId", type="string", length=100, nullable=true)
     */
    private $rowid;

    /**
     * @var string
     *
     * @ORM\Column(name="AgentId", type="string", length=100, nullable=true)
     */
    private $agentid;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerId", type="string", length=100, nullable=true)
     */
    private $customerid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetId", type="string", length=100, nullable=true)
     */
    private $betid;

    /**
     * @var string
     *
     * @ORM\Column(name="MerchantCustomerId", type="string", length=100, nullable=true)
     */
    private $merchantcustomerid;

    /**
     * @var string
     *
     * @ORM\Column(name="PurchaseId", type="string", length=100, nullable=true)
     */
    private $purchaseid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetTypeId", type="string", length=100, nullable=true)
     */
    private $bettypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetTypeName", type="string", length=100, nullable=true)
     */
    private $bettypename;

    /**
     * @var string
     *
     * @ORM\Column(name="LineId", type="string", length=100, nullable=true)
     */
    private $lineid;

    /**
     * @var string
     *
     * @ORM\Column(name="LineTypeId", type="string", length=100, nullable=true)
     */
    private $linetypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="LineTypeName", type="string", length=100, nullable=true)
     */
    private $linetypename;

    /**
     * @var string
     *
     * @ORM\Column(name="RowTypeId", type="string", length=100, nullable=true)
     */
    private $rowtypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="BranchId", type="string", length=100, nullable=true)
     */
    private $branchid;

    /**
     * @var string
     *
     * @ORM\Column(name="BranchName", type="string", length=100, nullable=true)
     */
    private $branchname;

    /**
     * @var string
     *
     * @ORM\Column(name="LeagueId", type="string", length=100, nullable=true)
     */
    private $leagueid;

    /**
     * @var string
     *
     * @ORM\Column(name="LeagueName", type="string", length=100, nullable=true)
     */
    private $leaguename;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreationDate", type="datetime", nullable=true)
     */
    private $creationdate;

    /**
     * @var string
     *
     * @ORM\Column(name="HomeTeam", type="string", length=100, nullable=true)
     */
    private $hometeam;

    /**
     * @var string
     *
     * @ORM\Column(name="AwayTeam", type="string", length=100, nullable=true)
     */
    private $awayteam;

    /**
     * @var string
     *
     * @ORM\Column(name="Stake", type="string", length=100, nullable=true)
     */
    private $stake;

    /**
     * @var string
     *
     * @ORM\Column(name="Odds", type="string", length=100, nullable=true)
     */
    private $odds;

    /**
     * @var string
     *
     * @ORM\Column(name="Points", type="string", length=100, nullable=true)
     */
    private $points;

    /**
     * @var string
     *
     * @ORM\Column(name="Score", type="string", length=100, nullable=true)
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="YourBet", type="string", length=100, nullable=true)
     */
    private $yourbet;

    /**
     * @var string
     *
     * @ORM\Column(name="IsForEvent", type="string", length=100, nullable=true)
     */
    private $isforevent;

    /**
     * @var string
     *
     * @ORM\Column(name="EventTypeId", type="string", length=100, nullable=true)
     */
    private $eventtypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="EventTypeName", type="string", length=100, nullable=true)
     */
    private $eventtypename;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderId", type="string", length=100, nullable=true)
     */
    private $orderid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UpdateDate", type="datetime", nullable=true)
     */
    private $updatedate;

    /**
     * @var string
     *
     * @ORM\Column(name="ProfitLoss", type="string", length=100, nullable=true)
     */
    private $profitloss;

    /**
     * @var string
     *
     * @ORM\Column(name="TeamMappingId", type="string", length=100, nullable=true)
     */
    private $teammappingid;

    /**
     * @var string
     *
     * @ORM\Column(name="LiveScore1", type="string", length=100, nullable=true)
     */
    private $livescore1;

    /**
     * @var string
     *
     * @ORM\Column(name="LiveScore2", type="string", length=100, nullable=true)
     */
    private $livescore2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EventDate", type="datetime", nullable=true)
     */
    private $eventdate;

    /**
     * @var string
     *
     * @ORM\Column(name="MasterEventId", type="string", length=100, nullable=true)
     */
    private $mastereventid;

    /**
     * @var string
     *
     * @ORM\Column(name="CommonStatusId", type="string", length=100, nullable=true)
     */
    private $commonstatusid;

    /**
     * @var string
     *
     * @ORM\Column(name="WebProviderId", type="string", length=100, nullable=true)
     */
    private $webproviderid;

    /**
     * @var string
     *
     * @ORM\Column(name="WebProviderName", type="string", length=100, nullable=true)
     */
    private $webprovidername;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $bonusamount;

    /**
     * @var string
     *
     * @ORM\Column(name="DomainId", type="string", length=100, nullable=true)
     */
    private $domainid;

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
     * Set rowid
     *
     * @param string $rowid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setRowid($rowid)
    {
        $this->rowid = $rowid;

        return $this;
    }

    /**
     * Get rowid
     *
     * @return string
     */
    public function getRowid()
    {
        return $this->rowid;
    }

    /**
     * Set agentid
     *
     * @param string $agentid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setAgentid($agentid)
    {
        $this->agentid = $agentid;

        return $this;
    }

    /**
     * Get agentid
     *
     * @return string
     */
    public function getAgentid()
    {
        return $this->agentid;
    }

    /**
     * Set customerid
     *
     * @param string $customerid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return string
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set betid
     *
     * @param string $betid
     *
     * @return Sbtechsportsbookbetlogs
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
     * Set merchantcustomerid
     *
     * @param string $merchantcustomerid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setMerchantcustomerid($merchantcustomerid)
    {
        $this->merchantcustomerid = $merchantcustomerid;

        return $this;
    }

    /**
     * Get merchantcustomerid
     *
     * @return string
     */
    public function getMerchantcustomerid()
    {
        return $this->merchantcustomerid;
    }

    /**
     * Set purchaseid
     *
     * @param string $purchaseid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setPurchaseid($purchaseid)
    {
        $this->purchaseid = $purchaseid;

        return $this;
    }

    /**
     * Get purchaseid
     *
     * @return string
     */
    public function getPurchaseid()
    {
        return $this->purchaseid;
    }

    /**
     * Set bettypeid
     *
     * @param string $bettypeid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setBettypeid($bettypeid)
    {
        $this->bettypeid = $bettypeid;

        return $this;
    }

    /**
     * Get bettypeid
     *
     * @return string
     */
    public function getBettypeid()
    {
        return $this->bettypeid;
    }

    /**
     * Set bettypename
     *
     * @param string $bettypename
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setBettypename($bettypename)
    {
        $this->bettypename = $bettypename;

        return $this;
    }

    /**
     * Get bettypename
     *
     * @return string
     */
    public function getBettypename()
    {
        return $this->bettypename;
    }

    /**
     * Set lineid
     *
     * @param string $lineid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setLineid($lineid)
    {
        $this->lineid = $lineid;

        return $this;
    }

    /**
     * Get lineid
     *
     * @return string
     */
    public function getLineid()
    {
        return $this->lineid;
    }

    /**
     * Set linetypeid
     *
     * @param string $linetypeid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setLinetypeid($linetypeid)
    {
        $this->linetypeid = $linetypeid;

        return $this;
    }

    /**
     * Get linetypeid
     *
     * @return string
     */
    public function getLinetypeid()
    {
        return $this->linetypeid;
    }

    /**
     * Set linetypename
     *
     * @param string $linetypename
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setLinetypename($linetypename)
    {
        $this->linetypename = $linetypename;

        return $this;
    }

    /**
     * Get linetypename
     *
     * @return string
     */
    public function getLinetypename()
    {
        return $this->linetypename;
    }

    /**
     * Set rowtypeid
     *
     * @param string $rowtypeid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setRowtypeid($rowtypeid)
    {
        $this->rowtypeid = $rowtypeid;

        return $this;
    }

    /**
     * Get rowtypeid
     *
     * @return string
     */
    public function getRowtypeid()
    {
        return $this->rowtypeid;
    }

    /**
     * Set branchid
     *
     * @param string $branchid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setBranchid($branchid)
    {
        $this->branchid = $branchid;

        return $this;
    }

    /**
     * Get branchid
     *
     * @return string
     */
    public function getBranchid()
    {
        return $this->branchid;
    }

    /**
     * Set branchname
     *
     * @param string $branchname
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setBranchname($branchname)
    {
        $this->branchname = $branchname;

        return $this;
    }

    /**
     * Get branchname
     *
     * @return string
     */
    public function getBranchname()
    {
        return $this->branchname;
    }

    /**
     * Set leagueid
     *
     * @param string $leagueid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setLeagueid($leagueid)
    {
        $this->leagueid = $leagueid;

        return $this;
    }

    /**
     * Get leagueid
     *
     * @return string
     */
    public function getLeagueid()
    {
        return $this->leagueid;
    }

    /**
     * Set leaguename
     *
     * @param string $leaguename
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setLeaguename($leaguename)
    {
        $this->leaguename = $leaguename;

        return $this;
    }

    /**
     * Get leaguename
     *
     * @return string
     */
    public function getLeaguename()
    {
        return $this->leaguename;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Set hometeam
     *
     * @param string $hometeam
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setHometeam($hometeam)
    {
        $this->hometeam = $hometeam;

        return $this;
    }

    /**
     * Get hometeam
     *
     * @return string
     */
    public function getHometeam()
    {
        return $this->hometeam;
    }

    /**
     * Set awayteam
     *
     * @param string $awayteam
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setAwayteam($awayteam)
    {
        $this->awayteam = $awayteam;

        return $this;
    }

    /**
     * Get awayteam
     *
     * @return string
     */
    public function getAwayteam()
    {
        return $this->awayteam;
    }

    /**
     * Set stake
     *
     * @param string $stake
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setStake($stake)
    {
        $this->stake = $stake;

        return $this;
    }

    /**
     * Get stake
     *
     * @return string
     */
    public function getStake()
    {
        return $this->stake;
    }

    /**
     * Set odds
     *
     * @param string $odds
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setOdds($odds)
    {
        $this->odds = $odds;

        return $this;
    }

    /**
     * Get odds
     *
     * @return string
     */
    public function getOdds()
    {
        return $this->odds;
    }

    /**
     * Set points
     *
     * @param string $points
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return string
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set score
     *
     * @param string $score
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Sbtechsportsbookbetlogs
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
     * Set yourbet
     *
     * @param string $yourbet
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setYourbet($yourbet)
    {
        $this->yourbet = $yourbet;

        return $this;
    }

    /**
     * Get yourbet
     *
     * @return string
     */
    public function getYourbet()
    {
        return $this->yourbet;
    }

    /**
     * Set isforevent
     *
     * @param string $isforevent
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setIsforevent($isforevent)
    {
        $this->isforevent = $isforevent;

        return $this;
    }

    /**
     * Get isforevent
     *
     * @return string
     */
    public function getIsforevent()
    {
        return $this->isforevent;
    }

    /**
     * Set eventtypeid
     *
     * @param string $eventtypeid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setEventtypeid($eventtypeid)
    {
        $this->eventtypeid = $eventtypeid;

        return $this;
    }

    /**
     * Get eventtypeid
     *
     * @return string
     */
    public function getEventtypeid()
    {
        return $this->eventtypeid;
    }

    /**
     * Set eventtypename
     *
     * @param string $eventtypename
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setEventtypename($eventtypename)
    {
        $this->eventtypename = $eventtypename;

        return $this;
    }

    /**
     * Get eventtypename
     *
     * @return string
     */
    public function getEventtypename()
    {
        return $this->eventtypename;
    }

    /**
     * Set orderid
     *
     * @param string $orderid
     *
     * @return Sbtechsportsbookbetlogs
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
     * Set updatedate
     *
     * @param \DateTime $updatedate
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setUpdatedate($updatedate)
    {
        $this->updatedate = $updatedate;

        return $this;
    }

    /**
     * Get updatedate
     *
     * @return \DateTime
     */
    public function getUpdatedate()
    {
        return $this->updatedate;
    }

    /**
     * Set profitloss
     *
     * @param string $profitloss
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setProfitloss($profitloss)
    {
        $this->profitloss = $profitloss;

        return $this;
    }

    /**
     * Get profitloss
     *
     * @return string
     */
    public function getProfitloss()
    {
        return $this->profitloss;
    }

    /**
     * Set teammappingid
     *
     * @param string $teammappingid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setTeammappingid($teammappingid)
    {
        $this->teammappingid = $teammappingid;

        return $this;
    }

    /**
     * Get teammappingid
     *
     * @return string
     */
    public function getTeammappingid()
    {
        return $this->teammappingid;
    }

    /**
     * Set livescore1
     *
     * @param string $livescore1
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setLivescore1($livescore1)
    {
        $this->livescore1 = $livescore1;

        return $this;
    }

    /**
     * Get livescore1
     *
     * @return string
     */
    public function getLivescore1()
    {
        return $this->livescore1;
    }

    /**
     * Set livescore2
     *
     * @param string $livescore2
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setLivescore2($livescore2)
    {
        $this->livescore2 = $livescore2;

        return $this;
    }

    /**
     * Get livescore2
     *
     * @return string
     */
    public function getLivescore2()
    {
        return $this->livescore2;
    }

    /**
     * Set eventdate
     *
     * @param \DateTime $eventdate
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setEventdate($eventdate)
    {
        $this->eventdate = $eventdate;

        return $this;
    }

    /**
     * Get eventdate
     *
     * @return \DateTime
     */
    public function getEventdate()
    {
        return $this->eventdate;
    }

    /**
     * Set mastereventid
     *
     * @param string $mastereventid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setMastereventid($mastereventid)
    {
        $this->mastereventid = $mastereventid;

        return $this;
    }

    /**
     * Get mastereventid
     *
     * @return string
     */
    public function getMastereventid()
    {
        return $this->mastereventid;
    }

    /**
     * Set commonstatusid
     *
     * @param string $commonstatusid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setCommonstatusid($commonstatusid)
    {
        $this->commonstatusid = $commonstatusid;

        return $this;
    }

    /**
     * Get commonstatusid
     *
     * @return string
     */
    public function getCommonstatusid()
    {
        return $this->commonstatusid;
    }

    /**
     * Set webproviderid
     *
     * @param string $webproviderid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setWebproviderid($webproviderid)
    {
        $this->webproviderid = $webproviderid;

        return $this;
    }

    /**
     * Get webproviderid
     *
     * @return string
     */
    public function getWebproviderid()
    {
        return $this->webproviderid;
    }

    /**
     * Set webprovidername
     *
     * @param string $webprovidername
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setWebprovidername($webprovidername)
    {
        $this->webprovidername = $webprovidername;

        return $this;
    }

    /**
     * Get webprovidername
     *
     * @return string
     */
    public function getWebprovidername()
    {
        return $this->webprovidername;
    }

    /**
     * Set bonusamount
     *
     * @param string $bonusamount
     *
     * @return Sbtechsportsbookbetlogs
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
     * Set domainid
     *
     * @param string $domainid
     *
     * @return Sbtechsportsbookbetlogs
     */
    public function setDomainid($domainid)
    {
        $this->domainid = $domainid;

        return $this;
    }

    /**
     * Get domainid
     *
     * @return string
     */
    public function getDomainid()
    {
        return $this->domainid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Sbtechsportsbookbetlogs
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
     * @return Sbtechsportsbookbetlogs
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
     * @return Sbtechsportsbookbetlogs
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
     * @return Sbtechsportsbookbetlogs
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
     * @return Sbtechsportsbookbetlogs
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
