<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agbetrecords
 *
 * @ORM\Table(name="AGBetRecords")
 * @ORM\Entity
 */
class Agbetrecords
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;

    /**
     * @var string
     *
     * @ORM\Column(name="Dataype", type="string", length=50, nullable=true)
     */
    private $Dataype;

    /**
     * @var string
     *
     * @ORM\Column(name="BillNo", type="string", length=50, nullable=true)
     */
    private $BillNo;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerName", type="string", length=50, nullable=true)
     */
    private $PlayerName;

    /**
     * @var string
     *
     * @ORM\Column(name="AgentCode", type="string", length=30, nullable=true)
     */
    private $AgentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="GameCode", type="string", length=20, nullable=true)
     */
    private $GameCode;

    /**
     * @var string
     *
     * @ORM\Column(name="NetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $NetAmount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BetTime", type="datetime", nullable=true)
     */
    private $BetTime;

    /**
     * @var string
     *
     * @ORM\Column(name="GameType", type="string", length=50, nullable=true)
     */
    private $GameType;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BetAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="ValidBetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ValidBetAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="Flag", type="string", length=5, nullable=true)
     */
    private $Flag;

    /**
     * @var string
     *
     * @ORM\Column(name="FlayType", type="string", length=5, nullable=true)
     */
    private $FlayType;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=15, nullable=true)
     */
    private $Currency;

    /**
     * @var string
     *
     * @ORM\Column(name="TableCode", type="string", length=15, nullable=true)
     */
    private $TableCode;

    /**
     * @var string
     *
     * @ORM\Column(name="LoginIp", type="string", length=20, nullable=true)
     */
    private $LoginIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="RecalcuTime", type="datetime", nullable=true)
     */
    private $RecalcuTime;

    /**
     * @var string
     *
     * @ORM\Column(name="PlatformType", type="string", length=20, nullable=true)
     */
    private $PlatformType;

    /**
     * @var string
     *
     * @ORM\Column(name="Remark", type="string", length=150, nullable=true)
     */
    private $Remark;

    /**
     * @var string
     *
     * @ORM\Column(name="Round", type="string", length=15, nullable=true)
     */
    private $Round;

    /**
     * @var string
     *
     * @ORM\Column(name="Result", type="string", length=5000, nullable=true)
     */
    private $Result;

    /**
     * @var string
     *
     * @ORM\Column(name="BeforeCredit", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BeforeCredit;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmountBase", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BetAmountBase;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmountBonus", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BetAmountBonus;

    /**
     * @var string
     *
     * @ORM\Column(name="DeviceType", type="string", length=15, nullable=true)
     */
    private $DeviceType;

    /**
     * @var string
     *
     * @ORM\Column(name="MainBillNo", type="string", length=100, nullable=true)
     */
    private $MainBillNo;

    /**
     * @var string
     *
     * @ORM\Column(name="NetAmountBase", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $NetAmountBase;

    /**
     * @var string
     *
     * @ORM\Column(name="NetAmountBonus", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $NetAmountBonus;

    /**
     * @var string
     *
     * @ORM\Column(name="SlotType", type="string", length=10, nullable=true)
     */
    private $SlotType;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $CreatedById = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=50, nullable=true)
     */
    private $ModifiedById = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime", nullable=true)
     */
    private $DateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $DateModified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=false)
     */
    private $ActiveRecord = true;

    /**
     * @var string
     *
     * @ORM\Column(name="Cost", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Cost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreationTime", type="datetime", nullable=true)
     */
    private $CreationTime;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrentAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $CurrentAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="HunterBetId", type="string", length=50, nullable=true)
     */
    private $HunterBetId;

    /**
     * @var string
     *
     * @ORM\Column(name="Earn", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Earn;

    /**
     * @var string
     *
     * @ORM\Column(name="ExchangeRate", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ExchangeRate;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerIp", type="string", length=50, nullable=true)
     */
    private $PlayerIp;

    /**
     * @var string
     *
     * @ORM\Column(name="JackpotComm", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $JackpotComm;

    /**
     * @var string
     *
     * @ORM\Column(name="PreviousAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $PreviousAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="RoomBet", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $RoomBet;

    /**
     * @var string
     *
     * @ORM\Column(name="RoomId", type="string", length=50, nullable=true)
     */
    private $RoomId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SceneEndTime", type="datetime", nullable=true)
     */
    private $SceneEndTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SceneStartTime", type="datetime", nullable=true)
     */
    private $SceneStartTime;

    /**
     * @var string
     *
     * @ORM\Column(name="TransferAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TransferAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="TradeNo", type="string", length=100, nullable=true)
     */
    private $TradeNo;

    /**
     * @var string
     *
     * @ORM\Column(name="HunterPlayType", type="string", length=100, nullable=true)
     */
    private $HunterPlayType;

    /**
     * @var string
     *
     * @ORM\Column(name="SceneId", type="string", length=100, nullable=true)
     */
    private $SceneId;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set Dataype
     *
     * @param string $Dataype
     *
     * @return Agbetrecords
     */
    public function setDataype($Dataype)
    {
        $this->Dataype = $Dataype;

        return $this;
    }

    /**
     * Get Dataype
     *
     * @return string
     */
    public function getDataype()
    {
        return $this->Dataype;
    }

    /**
     * Set BillNo
     *
     * @param string $BillNo
     *
     * @return Agbetrecords
     */
    public function setBillNo($BillNo)
    {
        $this->BillNo = $BillNo;

        return $this;
    }

    /**
     * Get BillNo
     *
     * @return string
     */
    public function getBillNo()
    {
        return $this->BillNo;
    }

    /**
     * Set PlayerName
     *
     * @param string $PlayerName
     *
     * @return Agbetrecords
     */
    public function setPlayerName($PlayerName)
    {
        $this->PlayerName = $PlayerName;

        return $this;
    }

    /**
     * Get PlayerName
     *
     * @return string
     */
    public function getPlayerName()
    {
        return $this->PlayerName;
    }

    /**
     * Set AgentCode
     *
     * @param string $AgentCode
     *
     * @return Agbetrecords
     */
    public function setAgentCode($AgentCode)
    {
        $this->AgentCode = $AgentCode;

        return $this;
    }

    /**
     * Get AgentCode
     *
     * @return string
     */
    public function getAgentCode()
    {
        return $this->AgentCode;
    }

    /**
     * Set GameCode
     *
     * @param string $GameCode
     *
     * @return Agbetrecords
     */
    public function setGameCode($GameCodee)
    {
        $this->GameCode = $GameCodee;

        return $this;
    }

    /**
     * Get GameCode
     *
     * @return string
     */
    public function getGameCode()
    {
        return $this->GameCode;
    }

    /**
     * Set NetAmount
     *
     * @param string $NetAmount
     *
     * @return Agbetrecords
     */
    public function setNetAmount($NetAmount)
    {
        $this->NetAmount = $NetAmount;

        return $this;
    }

    /**
     * Get NetAmount
     *
     * @return string
     */
    public function getNetAmount()
    {
        return $this->NetAmount;
    }

    /**
     * Set BetTime
     *
     * @param \DateTime $BetTime
     *
     * @return Agbetrecords
     */
    public function setBetTime($BetTime)
    {
        $this->BetTime = $BetTime;

        return $this;
    }

    /**
     * Get BetTime
     *
     * @return \DateTime
     */
    public function getBetTime()
    {
        return $this->BetTime;
    }

    /**
     * Set GameType
     *
     * @param string $GameType
     *
     * @return Agbetrecords
     */
    public function setGameType($GameType)
    {
        $this->GameType = $GameType;

        return $this;
    }

    /**
     * Get GameType
     *
     * @return string
     */
    public function getGameType()
    {
        return $this->GameType;
    }

    /**
     * Set BetAmount
     *
     * @param string $BetAmount
     *
     * @return Agbetrecords
     */
    public function setBetAmount($BetAmount)
    {
        $this->BetAmount = $BetAmount;

        return $this;
    }

    /**
     * Get BetAmount
     *
     * @return string
     */
    public function getBetAmount()
    {
        return $this->BetAmount;
    }

    /**
     * Set ValidBetAmount
     *
     * @param string $ValidBetAmount
     *
     * @return Agbetrecords
     */
    public function setValidBetAmount($ValidBetAmount)
    {
        $this->ValidBetAmount = $ValidBetAmount;

        return $this;
    }

    /**
     * Get ValidBetAmount
     *
     * @return string
     */
    public function getValidBetAmount()
    {
        return $this->ValidBetAmount;
    }

    /**
     * Set Flag
     *
     * @param string $Flag
     *
     * @return Agbetrecords
     */
    public function setFlag($Flag)
    {
        $this->Flag = $Flag;

        return $this;
    }

    /**
     * Get Flag
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->Flag;
    }

    /**
     * Set FlayType
     *
     * @param string $FlayType
     *
     * @return Agbetrecords
     */
    public function setFlayType($FlayType)
    {
        $this->FlayType = $FlayType;

        return $this;
    }

    /**
     * Get FlayType
     *
     * @return string
     */
    public function getFlayType()
    {
        return $this->FlayType;
    }

    /**
     * Set Currency
     *
     * @param string $Currency
     *
     * @return Agbetrecords
     */
    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;

        return $this;
    }

    /**
     * Get Currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * Set TableCode
     *
     * @param string $TableCode
     *
     * @return Agbetrecords
     */
    public function setTableCode($TableCode)
    {
        $this->TableCode = $TableCode;

        return $this;
    }

    /**
     * Get TableCode
     *
     * @return string
     */
    public function getTableCode()
    {
        return $this->TableCode;
    }

    /**
     * Set LoginIp
     *
     * @param string $LoginIp
     *
     * @return Agbetrecords
     */
    public function setLoginIp($LoginIp)
    {
        $this->LoginIp = $LoginIp;

        return $this;
    }

    /**
     * Get LoginIp
     *
     * @return string
     */
    public function getLoginIp()
    {
        return $this->LoginIp;
    }

    /**
     * Set RecalcuTime
     *
     * @param \DateTime $RecalcuTime
     *
     * @return Agbetrecords
     */
    public function setRecalcuTime($RecalcuTime)
    {
        $this->RecalcuTime = $RecalcuTime;

        return $this;
    }

    /**
     * Get RecalcuTime
     *
     * @return \DateTime
     */
    public function getRecalcuTime()
    {
        return $this->RecalcuTime;
    }

    /**
     * Set PlatformType
     *
     * @param string $PlatformType
     *
     * @return Agbetrecords
     */
    public function setPlatformType($PlatformType)
    {
        $this->PlatformType = $PlatformType;

        return $this;
    }

    /**
     * Get PlatformType
     *
     * @return string
     */
    public function getPlatformType()
    {
        return $this->PlatformType;
    }

    /**
     * Set Remark
     *
     * @param string $Remark
     *
     * @return Agbetrecords
     */
    public function setRemark($Remark)
    {
        $this->Remark = $Remark;

        return $this;
    }

    /**
     * Get Remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->Remark;
    }

    /**
     * Set Round
     *
     * @param string $Round
     *
     * @return Agbetrecords
     */
    public function setRound($Round)
    {
        $this->Round = $Round;

        return $this;
    }

    /**
     * Get Round
     *
     * @return string
     */
    public function getRound()
    {
        return $this->Round;
    }

    /**
     * Set Result
     *
     * @param string $Result
     *
     * @return Agbetrecords
     */
    public function setResult($Result)
    {
        $this->Result = $Result;

        return $this;
    }

    /**
     * Get Result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->Result;
    }

    /**
     * Set BeforeCredit
     *
     * @param string $BeforeCredit
     *
     * @return Agbetrecords
     */
    public function setBeforeCredit($BeforeCredit)
    {
        $this->BeforeCredit = $BeforeCredit;

        return $this;
    }

    /**
     * Get BeforeCredit
     *
     * @return string
     */
    public function getBeforeCredit()
    {
        return $this->BeforeCredit;
    }

    /**
     * Set BetAmountBase
     *
     * @param string $BetAmountBase
     *
     * @return Agbetrecords
     */
    public function setBetAmountBase($BetAmountBase)
    {
        $this->BetAmountBase = $BetAmountBase;

        return $this;
    }

    /**
     * Get betamountbase
     *
     * @return string
     */
    public function getBetAmountBase()
    {
        return $this->BetAmountBase;
    }

    /**
     * Set BetAmountBonus
     *
     * @param string $BetAmountBonus
     *
     * @return Agbetrecords
     */
    public function setBetAmountBonus($BetAmountBonus)
    {
        $this->BetAmountBonus = $BetAmountBonus;

        return $this;
    }

    /**
     * Get BetAmountBonus
     *
     * @return string
     */
    public function getBetAmountBonus()
    {
        return $this->BetAmountBonus;
    }

    /**
     * Set DeviceType
     *
     * @param string $DeviceType
     *
     * @return Agbetrecords
     */
    public function setDeviceType($DeviceType)
    {
        $this->DeviceType = $DeviceType;

        return $this;
    }

    /**
     * Get DeviceType
     *
     * @return string
     */
    public function getDeviceType()
    {
        return $this->DeviceType;
    }

    /**
     * Set MainBillNo
     *
     * @param string $MainBillNo
     *
     * @return Agbetrecords
     */
    public function setMainBillNo($MainBillNo)
    {
        $this->MainBillNo = $MainBillNo;

        return $this;
    }

    /**
     * Get MainBillNo
     *
     * @return string
     */
    public function getMainBillNo()
    {
        return $this->MainBillNo;
    }

    /**
     * Set NetAmountBase
     *
     * @param string $NetAmountBase
     *
     * @return Agbetrecords
     */
    public function setNetAmountBase($NetAmountBase)
    {
        $this->NetAmountBase = $NetAmountBase;

        return $this;
    }

    /**
     * Get NetAmountBase
     *
     * @return string
     */
    public function getNetAmountBase()
    {
        return $this->NetAmountBase;
    }

    /**
     * Set NetAmountBonus
     *
     * @param string $NetAmountBonus
     *
     * @return Agbetrecords
     */
    public function setNetAmountBonus($NetAmountBonus)
    {
        $this->NetAmountBonus = $NetAmountBonus;

        return $this;
    }

    /**
     * Get NetAmountBonus
     *
     * @return string
     */
    public function getNetAmountBonus()
    {
        return $this->NetAmountBonus;
    }

    /**
     * Set SlotType
     *
     * @param string $SlotType
     *
     * @return Agbetrecords
     */
    public function setSlotType($SlotType)
    {
        $this->SlotType = $SlotType;

        return $this;
    }

    /**
     * Get SlotType
     *
     * @return string
     */
    public function getSlotType()
    {
        return $this->SlotType;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Agbetrecords
     */
    public function setCreatedById($CreatedById)
    {
        $this->CreatedById = $CreatedById;

        return $this;
    }

    /**
     * Get CreatedById
     *
     * @return string
     */
    public function getCreatedById()
    {
        return $this->CreatedById;
    }

    /**
     * Set ModifiedById
     *
     * @param string $ModifiedById
     *
     * @return Agbetrecords
     */
    public function setModifiedById($ModifiedById)
    {
        $this->ModifiedById = $ModifiedById;

        return $this;
    }

    /**
     * Get ModifiedById
     *
     * @return string
     */
    public function getModifiedById()
    {
        return $this->ModifiedById;
    }

    /**
     * Set DateCreated
     *
     * @param \DateTime $DateCreated
     *
     * @return Agbetrecords
     */
    public function setDateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;

        return $this;
    }

    /**
     * Get DateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->DateCreated;
    }

    /**
     * Set DateModified
     *
     * @param \DateTime $DateModified
     *
     * @return Agbetrecords
     */
    public function setDateModified($DateModified)
    {
        $this->DateModified = $DateModified;

        return $this;
    }

    /**
     * Get DateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->DateModified;
    }

    /**
     * Set ActiveRecord
     *
     * @param boolean $ActiveRecord
     *
     * @return Agbetrecords
     */
    public function setActiveRecord($ActiveRecord)
    {
        $this->ActiveRecord = $ActiveRecord;

        return $this;
    }

    /**
     * Get ActiveRecord
     *
     * @return boolean
     */
    public function getActiveRecord()
    {
        return $this->ActiveRecord;
    }

    /**
     * Set Cost
     *
     * @param string $Cost
     *
     * @return Agbetrecords
     */
    public function setCost($Cost)
    {
        $this->Cost = $Cost;

        return $this;
    }

    /**
     * Get Cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->Cost;
    }

    /**
     * Set CreationTime
     *
     * @param \DateTime $CreationTime
     *
     * @return Agbetrecords
     */
    public function setCreationtime($CreationTime)
    {
        $this->CreationTime = $CreationTime;

        return $this;
    }

    /**
     * Get CreationTime
     *
     * @return \DateTime
     */
    public function getCreationTime()
    {
        return $this->CreationTime;
    }

    /**
     * Set CurrentAmount
     *
     * @param string $CurrentAmount
     *
     * @return Agbetrecords
     */
    public function setCurrentamount($CurrentAmount)
    {
        $this->CurrentAmount = $CurrentAmount;

        return $this;
    }

    /**
     * Get CurrentAmount
     *
     * @return string
     */
    public function getCurrentAmount()
    {
        return $this->CurrentAmount;
    }

    /**
     * Set HunterBetId
     *
     * @param string $HunterBetId
     *
     * @return Agbetrecords
     */
    public function setHunterBetId($HunterBetId)
    {
        $this->HunterBetId = $HunterBetId;

        return $this;
    }

    /**
     * Get HunterBetId
     *
     * @return string
     */
    public function getHunterBetId()
    {
        return $this->HunterBetId;
    }

    /**
     * Set Earn
     *
     * @param string $Earn
     *
     * @return Agbetrecords
     */
    public function setEarn($Earn)
    {
        $this->Earn = $Earn;

        return $this;
    }

    /**
     * Get Earn
     *
     * @return string
     */
    public function getEarn()
    {
        return $this->Earn;
    }

    /**
     * Set ExchangeRate
     *
     * @param string $ExchangeRate
     *
     * @return Agbetrecords
     */
    public function setExchangeRate($ExchangeRate)
    {
        $this->ExchangeRate = $ExchangeRate;

        return $this;
    }

    /**
     * Get ExchangeRate
     *
     * @return string
     */
    public function getExchangeRate()
    {
        return $this->ExchangeRate;
    }

    /**
     * Set PlayerIp
     *
     * @param string $PlayerIp
     *
     * @return Agbetrecords
     */
    public function setPlayerIp($PlayerIp)
    {
        $this->PlayerIp = $PlayerIp;

        return $this;
    }

    /**
     * Get PlayerIp
     *
     * @return string
     */
    public function getPlayerIp()
    {
        return $this->PlayerIp;
    }

    /**
     * Set JackpotComm
     *
     * @param string $JackpotComm
     *
     * @return Agbetrecords
     */
    public function setJackpotComm($JackpotComm)
    {
        $this->JackpotComm = $JackpotComm;

        return $this;
    }

    /**
     * Get JackpotComm
     *
     * @return string
     */
    public function getJackpotComm()
    {
        return $this->JackpotComm;
    }

    /**
     * Set PreviousAmount
     *
     * @param string $PreviousAmount
     *
     * @return Agbetrecords
     */
    public function setPreviousAmount($PreviousAmount)
    {
        $this->PreviousAmount = $PreviousAmount;

        return $this;
    }

    /**
     * Get PreviousAmount
     *
     * @return string
     */
    public function getPreviousAmount()
    {
        return $this->PreviousAmount;
    }

    /**
     * Set RoomBet
     *
     * @param string $RoomBet
     *
     * @return Agbetrecords
     */
    public function setRoombet($RoomBet)
    {
        $this->RoomBet = $RoomBet;

        return $this;
    }

    /**
     * Get RoomBet
     *
     * @return string
     */
    public function getRoomBet()
    {
        return $this->RoomBet;
    }

    /**
     * Set RoomId
     *
     * @param string $RoomId
     *
     * @return Agbetrecords
     */
    public function setRoomId($RoomId)
    {
        $this->RoomId = $RoomId;

        return $this;
    }

    /**
     * Get RoomId
     *
     * @return string
     */
    public function getRoomId()
    {
        return $this->RoomId;
    }

    /**
     * Set SceneEndTime
     *
     * @param \DateTime $SceneEndTime
     *
     * @return Agbetrecords
     */
    public function setSceneEndTime($SceneEndTime)
    {
        $this->SceneEndTime = $SceneEndTime;

        return $this;
    }

    /**
     * Get SceneEndTime
     *
     * @return \DateTime
     */
    public function getSceneEndTime()
    {
        return $this->SceneEndTime;
    }

    /**
     * Set SceneStartTime
     *
     * @param \DateTime $SceneStartTime
     *
     * @return Agbetrecords
     */
    public function setSceneStartTime($SceneStartTime)
    {
        $this->SceneStartTime = $SceneStartTime;

        return $this;
    }

    /**
     * Get SceneStartTime
     *
     * @return \DateTime
     */
    public function getSceneStartTime()
    {
        return $this->SceneStartTime;
    }

    /**
     * Set TransferAmount
     *
     * @param string $TransferAmount
     *
     * @return Agbetrecords
     */
    public function setTransferAmount($TransferAmount)
    {
        $this->TransferAmount = $TransferAmount;

        return $this;
    }

    /**
     * Get TransferAmount
     *
     * @return string
     */
    public function getTransferAmount()
    {
        return $this->TransferAmount;
    }

    /**
     * Set TradeNo
     *
     * @param string $TradeNo
     *
     * @return Agbetrecords
     */
    public function setTradeNo($TradeNo)
    {
        $this->TradeNo = $TradeNo;

        return $this;
    }

    /**
     * Get TradeNo
     *
     * @return string
     */
    public function getTradeNo()
    {
        return $this->TradeNo;
    }

    /**
     * Set HunterPlayType
     *
     * @param string $HunterPlayType
     *
     * @return Agbetrecords
     */
    public function setHunterplaytype($HunterPlayType)
    {
        $this->HunterPlayType = $HunterPlayType;

        return $this;
    }

    /**
     * Get HunterPlayType
     *
     * @return string
     */
    public function getHunterPlayType()
    {
        return $this->HunterPlayType;
    }

    /**
     * Set SceneId
     *
     * @param string $SceneId
     *
     * @return Agbetrecords
     */
    public function setSceneid($SceneId)
    {
        $this->SceneId = $SceneId;

        return $this;
    }

    /**
     * Get SceneId
     *
     * @return string
     */
    public function getSceneId()
    {
        return $this->SceneId;
    }
}
