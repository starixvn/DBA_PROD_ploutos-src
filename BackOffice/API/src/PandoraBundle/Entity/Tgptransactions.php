<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tgptransactions
 *
 * @ORM\Table(name="TgpTransactions")
 * @ORM\Entity
 */
class Tgptransactions
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
     * @ORM\Column(name="TgpApiTxnType", type="integer", nullable=true)
     */
    private $tgpapitxntype;

    /**
     * @var string
     *
     * @ORM\Column(name="TestMode", type="string", length=100, nullable=true)
     */
    private $testmode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Transactional", type="boolean", nullable=false)
     */
    private $transactional = true;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="OauthToken", type="string", length=2000, nullable=true)
     */
    private $oauthtoken;

    /**
     * @var string
     *
     * @ORM\Column(name="BrnadCode", type="string", length=20, nullable=true)
     */
    private $brnadcode;

    /**
     * @var string
     *
     * @ORM\Column(name="TxnAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $txnamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=10, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="IPAddress", type="string", length=15, nullable=true)
     */
    private $ipaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="PTxnId", type="string", length=50, nullable=true)
     */
    private $ptxnid;

    /**
     * @var string
     *
     * @ORM\Column(name="RefPTxnId", type="string", length=50, nullable=true)
     */
    private $refptxnid;

    /**
     * @var integer
     *
     * @ORM\Column(name="TxnType", type="integer", nullable=true)
     */
    private $txntype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TxnTimeStamp", type="datetime", nullable=true)
     */
    private $txntimestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlatformType", type="integer", nullable=true)
     */
    private $platformtype;

    /**
     * @var string
     *
     * @ORM\Column(name="GPCode", type="string", length=50, nullable=true)
     */
    private $gpcode;

    /**
     * @var string
     *
     * @ORM\Column(name="GameCode", type="string", length=50, nullable=true)
     */
    private $gamecode;

    /**
     * @var string
     *
     * @ORM\Column(name="GameName", type="string", length=200, nullable=true)
     */
    private $gamename;

    /**
     * @var integer
     *
     * @ORM\Column(name="GameType", type="integer", nullable=true)
     */
    private $gametype;

    /**
     * @var string
     *
     * @ORM\Column(name="ExternalGameId", type="string", length=50, nullable=true)
     */
    private $externalgameid;

    /**
     * @var string
     *
     * @ORM\Column(name="RoundId", type="string", length=50, nullable=true)
     */
    private $roundid;

    /**
     * @var string
     *
     * @ORM\Column(name="ExternalRoundId", type="string", length=50, nullable=true)
     */
    private $externalroundid;

    /**
     * @var string
     *
     * @ORM\Column(name="BetId", type="string", length=50, nullable=true)
     */
    private $betid;

    /**
     * @var string
     *
     * @ORM\Column(name="ExternalBetId", type="string", length=50, nullable=true)
     */
    private $externalbetid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SentOn", type="datetime", nullable=true)
     */
    private $senton;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsClosingRound", type="boolean", nullable=false)
     */
    private $isclosinground = true;

    /**
     * @var string
     *
     * @ORM\Column(name="GrossGamingRevenue", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $grossgamingrevenue = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TurnOver", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $turnover = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="UnsettledBet", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $unsettledbet = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletCode", type="string", length=50, nullable=true)
     */
    private $walletcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="BonusType", type="integer", nullable=true)
     */
    private $bonustype;

    /**
     * @var string
     *
     * @ORM\Column(name="TxnDesc", type="string", length=300, nullable=true)
     */
    private $txndesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $rollbaseid = '0';

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
     * @ORM\Column(name="BrandCode", type="string", length=20, nullable=true)
     */
    private $brandcode;

    /**
     * @var string
     *
     * @ORM\Column(name="BonusCode", type="string", length=50, nullable=true)
     */
    private $bonuscode;

    /**
     * @var integer
     *
     * @ORM\Column(name="TgpApiTxnStatus", type="integer", nullable=true)
     */
    private $tgpapitxnstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBetProcessed", type="boolean", nullable=false)
     */
    private $isbetprocessed = true;

    /**
     * @var string
     *
     * @ORM\Column(name="WalletCurrentBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $walletcurrentbalance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletNewBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $walletnewbalance = '0.0000';



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
     * Set tgpapitxntype
     *
     * @param integer $tgpapitxntype
     *
     * @return Tgptransactions
     */
    public function setTgpapitxntype($tgpapitxntype)
    {
        $this->tgpapitxntype = $tgpapitxntype;

        return $this;
    }

    /**
     * Get tgpapitxntype
     *
     * @return integer
     */
    public function getTgpapitxntype()
    {
        return $this->tgpapitxntype;
    }

    /**
     * Set testmode
     *
     * @param string $testmode
     *
     * @return Tgptransactions
     */
    public function setTestmode($testmode)
    {
        $this->testmode = $testmode;

        return $this;
    }

    /**
     * Get testmode
     *
     * @return string
     */
    public function getTestmode()
    {
        return $this->testmode;
    }

    /**
     * Set transactional
     *
     * @param boolean $transactional
     *
     * @return Tgptransactions
     */
    public function setTransactional($transactional)
    {
        $this->transactional = $transactional;

        return $this;
    }

    /**
     * Get transactional
     *
     * @return boolean
     */
    public function getTransactional()
    {
        return $this->transactional;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Tgptransactions
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
     * Set oauthtoken
     *
     * @param string $oauthtoken
     *
     * @return Tgptransactions
     */
    public function setOauthtoken($oauthtoken)
    {
        $this->oauthtoken = $oauthtoken;

        return $this;
    }

    /**
     * Get oauthtoken
     *
     * @return string
     */
    public function getOauthtoken()
    {
        return $this->oauthtoken;
    }

    /**
     * Set brnadcode
     *
     * @param string $brnadcode
     *
     * @return Tgptransactions
     */
    public function setBrnadcode($brnadcode)
    {
        $this->brnadcode = $brnadcode;

        return $this;
    }

    /**
     * Get brnadcode
     *
     * @return string
     */
    public function getBrnadcode()
    {
        return $this->brnadcode;
    }

    /**
     * Set txnamount
     *
     * @param string $txnamount
     *
     * @return Tgptransactions
     */
    public function setTxnamount($txnamount)
    {
        $this->txnamount = $txnamount;

        return $this;
    }

    /**
     * Get txnamount
     *
     * @return string
     */
    public function getTxnamount()
    {
        return $this->txnamount;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Tgptransactions
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
     * @return Tgptransactions
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
     * Set ptxnid
     *
     * @param string $ptxnid
     *
     * @return Tgptransactions
     */
    public function setPtxnid($ptxnid)
    {
        $this->ptxnid = $ptxnid;

        return $this;
    }

    /**
     * Get ptxnid
     *
     * @return string
     */
    public function getPtxnid()
    {
        return $this->ptxnid;
    }

    /**
     * Set refptxnid
     *
     * @param string $refptxnid
     *
     * @return Tgptransactions
     */
    public function setRefptxnid($refptxnid)
    {
        $this->refptxnid = $refptxnid;

        return $this;
    }

    /**
     * Get refptxnid
     *
     * @return string
     */
    public function getRefptxnid()
    {
        return $this->refptxnid;
    }

    /**
     * Set txntype
     *
     * @param integer $txntype
     *
     * @return Tgptransactions
     */
    public function setTxntype($txntype)
    {
        $this->txntype = $txntype;

        return $this;
    }

    /**
     * Get txntype
     *
     * @return integer
     */
    public function getTxntype()
    {
        return $this->txntype;
    }

    /**
     * Set txntimestamp
     *
     * @param \DateTime $txntimestamp
     *
     * @return Tgptransactions
     */
    public function setTxntimestamp($txntimestamp)
    {
        $this->txntimestamp = $txntimestamp;

        return $this;
    }

    /**
     * Get txntimestamp
     *
     * @return \DateTime
     */
    public function getTxntimestamp()
    {
        return $this->txntimestamp;
    }

    /**
     * Set platformtype
     *
     * @param integer $platformtype
     *
     * @return Tgptransactions
     */
    public function setPlatformtype($platformtype)
    {
        $this->platformtype = $platformtype;

        return $this;
    }

    /**
     * Get platformtype
     *
     * @return integer
     */
    public function getPlatformtype()
    {
        return $this->platformtype;
    }

    /**
     * Set gpcode
     *
     * @param string $gpcode
     *
     * @return Tgptransactions
     */
    public function setGpcode($gpcode)
    {
        $this->gpcode = $gpcode;

        return $this;
    }

    /**
     * Get gpcode
     *
     * @return string
     */
    public function getGpcode()
    {
        return $this->gpcode;
    }

    /**
     * Set gamecode
     *
     * @param string $gamecode
     *
     * @return Tgptransactions
     */
    public function setGamecode($gamecode)
    {
        $this->gamecode = $gamecode;

        return $this;
    }

    /**
     * Get gamecode
     *
     * @return string
     */
    public function getGamecode()
    {
        return $this->gamecode;
    }

    /**
     * Set gamename
     *
     * @param string $gamename
     *
     * @return Tgptransactions
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
     * Set gametype
     *
     * @param integer $gametype
     *
     * @return Tgptransactions
     */
    public function setGametype($gametype)
    {
        $this->gametype = $gametype;

        return $this;
    }

    /**
     * Get gametype
     *
     * @return integer
     */
    public function getGametype()
    {
        return $this->gametype;
    }

    /**
     * Set externalgameid
     *
     * @param string $externalgameid
     *
     * @return Tgptransactions
     */
    public function setExternalgameid($externalgameid)
    {
        $this->externalgameid = $externalgameid;

        return $this;
    }

    /**
     * Get externalgameid
     *
     * @return string
     */
    public function getExternalgameid()
    {
        return $this->externalgameid;
    }

    /**
     * Set roundid
     *
     * @param string $roundid
     *
     * @return Tgptransactions
     */
    public function setRoundid($roundid)
    {
        $this->roundid = $roundid;

        return $this;
    }

    /**
     * Get roundid
     *
     * @return string
     */
    public function getRoundid()
    {
        return $this->roundid;
    }

    /**
     * Set externalroundid
     *
     * @param string $externalroundid
     *
     * @return Tgptransactions
     */
    public function setExternalroundid($externalroundid)
    {
        $this->externalroundid = $externalroundid;

        return $this;
    }

    /**
     * Get externalroundid
     *
     * @return string
     */
    public function getExternalroundid()
    {
        return $this->externalroundid;
    }

    /**
     * Set betid
     *
     * @param string $betid
     *
     * @return Tgptransactions
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
     * Set externalbetid
     *
     * @param string $externalbetid
     *
     * @return Tgptransactions
     */
    public function setExternalbetid($externalbetid)
    {
        $this->externalbetid = $externalbetid;

        return $this;
    }

    /**
     * Get externalbetid
     *
     * @return string
     */
    public function getExternalbetid()
    {
        return $this->externalbetid;
    }

    /**
     * Set senton
     *
     * @param \DateTime $senton
     *
     * @return Tgptransactions
     */
    public function setSenton($senton)
    {
        $this->senton = $senton;

        return $this;
    }

    /**
     * Get senton
     *
     * @return \DateTime
     */
    public function getSenton()
    {
        return $this->senton;
    }

    /**
     * Set isclosinground
     *
     * @param boolean $isclosinground
     *
     * @return Tgptransactions
     */
    public function setIsclosinground($isclosinground)
    {
        $this->isclosinground = $isclosinground;

        return $this;
    }

    /**
     * Get isclosinground
     *
     * @return boolean
     */
    public function getIsclosinground()
    {
        return $this->isclosinground;
    }

    /**
     * Set grossgamingrevenue
     *
     * @param string $grossgamingrevenue
     *
     * @return Tgptransactions
     */
    public function setGrossgamingrevenue($grossgamingrevenue)
    {
        $this->grossgamingrevenue = $grossgamingrevenue;

        return $this;
    }

    /**
     * Get grossgamingrevenue
     *
     * @return string
     */
    public function getGrossgamingrevenue()
    {
        return $this->grossgamingrevenue;
    }

    /**
     * Set turnover
     *
     * @param string $turnover
     *
     * @return Tgptransactions
     */
    public function setTurnover($turnover)
    {
        $this->turnover = $turnover;

        return $this;
    }

    /**
     * Get turnover
     *
     * @return string
     */
    public function getTurnover()
    {
        return $this->turnover;
    }

    /**
     * Set unsettledbet
     *
     * @param string $unsettledbet
     *
     * @return Tgptransactions
     */
    public function setUnsettledbet($unsettledbet)
    {
        $this->unsettledbet = $unsettledbet;

        return $this;
    }

    /**
     * Get unsettledbet
     *
     * @return string
     */
    public function getUnsettledbet()
    {
        return $this->unsettledbet;
    }

    /**
     * Set walletcode
     *
     * @param string $walletcode
     *
     * @return Tgptransactions
     */
    public function setWalletcode($walletcode)
    {
        $this->walletcode = $walletcode;

        return $this;
    }

    /**
     * Get walletcode
     *
     * @return string
     */
    public function getWalletcode()
    {
        return $this->walletcode;
    }

    /**
     * Set bonustype
     *
     * @param integer $bonustype
     *
     * @return Tgptransactions
     */
    public function setBonustype($bonustype)
    {
        $this->bonustype = $bonustype;

        return $this;
    }

    /**
     * Get bonustype
     *
     * @return integer
     */
    public function getBonustype()
    {
        return $this->bonustype;
    }

    /**
     * Set txndesc
     *
     * @param string $txndesc
     *
     * @return Tgptransactions
     */
    public function setTxndesc($txndesc)
    {
        $this->txndesc = $txndesc;

        return $this;
    }

    /**
     * Get txndesc
     *
     * @return string
     */
    public function getTxndesc()
    {
        return $this->txndesc;
    }

    /**
     * Set rollbaseid
     *
     * @param integer $rollbaseid
     *
     * @return Tgptransactions
     */
    public function setRollbaseid($rollbaseid)
    {
        $this->rollbaseid = $rollbaseid;

        return $this;
    }

    /**
     * Get rollbaseid
     *
     * @return integer
     */
    public function getRollbaseid()
    {
        return $this->rollbaseid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Tgptransactions
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
     * @return Tgptransactions
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
     * @return Tgptransactions
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
     * @return Tgptransactions
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
     * @return Tgptransactions
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
     * Set brandcode
     *
     * @param string $brandcode
     *
     * @return Tgptransactions
     */
    public function setBrandcode($brandcode)
    {
        $this->brandcode = $brandcode;

        return $this;
    }

    /**
     * Get brandcode
     *
     * @return string
     */
    public function getBrandcode()
    {
        return $this->brandcode;
    }

    /**
     * Set bonuscode
     *
     * @param string $bonuscode
     *
     * @return Tgptransactions
     */
    public function setBonuscode($bonuscode)
    {
        $this->bonuscode = $bonuscode;

        return $this;
    }

    /**
     * Get bonuscode
     *
     * @return string
     */
    public function getBonuscode()
    {
        return $this->bonuscode;
    }

    /**
     * Set tgpapitxnstatus
     *
     * @param integer $tgpapitxnstatus
     *
     * @return Tgptransactions
     */
    public function setTgpapitxnstatus($tgpapitxnstatus)
    {
        $this->tgpapitxnstatus = $tgpapitxnstatus;

        return $this;
    }

    /**
     * Get tgpapitxnstatus
     *
     * @return integer
     */
    public function getTgpapitxnstatus()
    {
        return $this->tgpapitxnstatus;
    }

    /**
     * Set isbetprocessed
     *
     * @param boolean $isbetprocessed
     *
     * @return Tgptransactions
     */
    public function setIsbetprocessed($isbetprocessed)
    {
        $this->isbetprocessed = $isbetprocessed;

        return $this;
    }

    /**
     * Get isbetprocessed
     *
     * @return boolean
     */
    public function getIsbetprocessed()
    {
        return $this->isbetprocessed;
    }

    /**
     * Set walletcurrentbalance
     *
     * @param string $walletcurrentbalance
     *
     * @return Tgptransactions
     */
    public function setWalletcurrentbalance($walletcurrentbalance)
    {
        $this->walletcurrentbalance = $walletcurrentbalance;

        return $this;
    }

    /**
     * Get walletcurrentbalance
     *
     * @return string
     */
    public function getWalletcurrentbalance()
    {
        return $this->walletcurrentbalance;
    }

    /**
     * Set walletnewbalance
     *
     * @param string $walletnewbalance
     *
     * @return Tgptransactions
     */
    public function setWalletnewbalance($walletnewbalance)
    {
        $this->walletnewbalance = $walletnewbalance;

        return $this;
    }

    /**
     * Get walletnewbalance
     *
     * @return string
     */
    public function getWalletnewbalance()
    {
        return $this->walletnewbalance;
    }
}
