<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absettlehistory
 *
 * @ORM\Table(name="ABSettleHistory")
 * @ORM\Entity
 */
class Absettlehistory
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
     * @ORM\Column(name="PropertyId", type="string", length=100, nullable=true)
     */
    private $PropertyId;

    /**
     * @var string
     *
     * @ORM\Column(name="Random", type="string", length=100, nullable=true)
     */
    private $Random;

    /**
     * @var string
     *
     * @ORM\Column(name="TranId", type="string", length=100, nullable=true)
     */
    private $TranId;

    /**
     * @var string
     *
     * @ORM\Column(name="TranType", type="string", length=100, nullable=true)
     */
    private $TranType;

    /**
     * @var string
     *
     * @ORM\Column(name="BetNum", type="string", length=100, nullable=true)
     */
    private $BetNum;

    /**
     * @var string
     *
     * @ORM\Column(name="Client", type="string", length=100, nullable=true)
     */
    private $Client;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $BetAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="BetType", type="string", length=100, nullable=true)
     */
    private $BetType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BetTime", type="datetime", nullable=true)
     */
    private $BetTime;

    /**
     * @var string
     *
     * @ORM\Column(name="GameType", type="string", length=100, nullable=true)
     */
    private $GameType;

    /**
     * @var string
     *
     * @ORM\Column(name="GameRoundId", type="string", length=100, nullable=true)
     */
    private $GameRoundId;

    /**
     * @var string
     *
     * @ORM\Column(name="State", type="string", length=100, nullable=true)
     */
    private $State;

    /**
     * @var string
     *
     * @ORM\Column(name="GameResult", type="string", length=100, nullable=true)
     */
    private $GameResult;

    /**
     * @var string
     *
     * @ORM\Column(name="GameResult2", type="string", length=100, nullable=true)
     */
    private $GameResult2;

    /**
     * @var string
     *
     * @ORM\Column(name="ValidAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $ValidAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="WinOrLoss", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $WinOrLoss;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=100, nullable=true)
     */
    private $Currency;

    /**
     * @var string
     *
     * @ORM\Column(name="ExchangeRate", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ExchangeRate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GameRoundStartTime", type="datetime", nullable=true)
     */
    private $GameRoundStartTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GameRoundEndTime", type="datetime", nullable=true)
     */
    private $GameRoundEndTime;

    /**
     * @var string
     *
     * @ORM\Column(name="Commission", type="string", length=100, nullable=true)
     */
    private $Commission;

    /**
     * @var string
     *
     * @ORM\Column(name="Sign", type="string", length=100, nullable=true)
     */
    private $Sign;

    /**
     * @var string
     *
     * @ORM\Column(name="TableName", type="string", length=100, nullable=true)
     */
    private $TableName;

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
     * @ORM\Column(name="Ip", type="string", length=100, nullable=true)
     */
    private $Ip;

    /**
     * @var string
     *
     * @ORM\Column(name="Token", type="string", length=100, nullable=true)
     */
    private $Token;

    /**
     * @var integer
     *
     * @ORM\Column(name="ABBetHistoryId", type="bigint", nullable=false)
     */
    private $ABBetHistoryId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="TranTypeName", type="string", length=100, nullable=true)
     */
    private $TranTypeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="RefTranId", type="bigint", nullable=false)
     */
    private $RefTranId = '0';



    /**
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set PropertyId
     *
     * @param string $PropertyId
     *
     * @return Absettlehistory
     */
    public function setPropertyId($PropertyId)
    {
        $this->PropertyId = $PropertyId;

        return $this;
    }

    /**
     * Get PropertyId
     *
     * @return string
     */
    public function getPropertyId()
    {
        return $this->PropertyId;
    }

    /**
     * Set Random
     *
     * @param string $Random
     *
     * @return Absettlehistory
     */
    public function setRandom($Random)
    {
        $this->Random = $Random;

        return $this;
    }

    /**
     * Get Random
     *
     * @return string
     */
    public function getRandom()
    {
        return $this->Random;
    }

    /**
     * Set TranId
     *
     * @param string $TranId
     *
     * @return Absettlehistory
     */
    public function setTranId($TranId)
    {
        $this->TranId = $TranId;

        return $this;
    }

    /**
     * Get TranId
     *
     * @return string
     */
    public function getTranId()
    {
        return $this->TranId;
    }

    /**
     * Set TranType
     *
     * @param string $TranType
     *
     * @return Absettlehistory
     */
    public function setTranType($TranType)
    {
        $this->TranType = $TranType;

        return $this;
    }

    /**
     * Get TranType
     *
     * @return string
     */
    public function getTranType()
    {
        return $this->TranType;
    }

    /**
     * Set BetNum
     *
     * @param string $BetNum
     *
     * @return Absettlehistory
     */
    public function setBetNum($BetNum)
    {
        $this->BetNum = $BetNum;

        return $this;
    }

    /**
     * Get BetNum
     *
     * @return string
     */
    public function getBetNum()
    {
        return $this->BetNum;
    }

    /**
     * Set Client
     *
     * @param string $Client
     *
     * @return Absettlehistory
     */
    public function setClient($Client)
    {
        $this->Client = $Client;

        return $this;
    }

    /**
     * Get Client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->Client;
    }

    /**
     * Set BetAmount
     *
     * @param string $BetAmount
     *
     * @return Absettlehistory
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
     * Set BetType
     *
     * @param string $BetType
     *
     * @return Absettlehistory
     */
    public function setBetType($BetType)
    {
        $this->BetType = $BetType;

        return $this;
    }

    /**
     * Get BetType
     *
     * @return string
     */
    public function getBetType()
    {
        return $this->BetType;
    }

    /**
     * Set BetTime
     *
     * @param \DateTime $BetTime
     *
     * @return Absettlehistory
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
     * @return Absettlehistory
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
     * Set GameRoundId
     *
     * @param string $GameRoundId
     *
     * @return Absettlehistory
     */
    public function setGameRoundId($GameRoundId)
    {
        $this->GameRoundId = $GameRoundId;

        return $this;
    }

    /**
     * Get GameRoundId
     *
     * @return string
     */
    public function getGameRoundId()
    {
        return $this->GameRoundId;
    }

    /**
     * Set State
     *
     * @param string $State
     *
     * @return Absettlehistory
     */
    public function setState($State)
    {
        $this->State = $State;

        return $this;
    }

    /**
     * Get State
     *
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * Set GameResult
     *
     * @param string $GameResult
     *
     * @return Absettlehistory
     */
    public function setGameResult($GameResult)
    {
        $this->GameResult = $GameResult;

        return $this;
    }

    /**
     * Get GameResult
     *
     * @return string
     */
    public function getGameResult()
    {
        return $this->GameResult;
    }

    /**
     * Set GameResult2
     *
     * @param string $GameResult2
     *
     * @return Absettlehistory
     */
    public function setGameResult2($GameResult2)
    {
        $this->GameResult2 = $GameResult2;

        return $this;
    }

    /**
     * Get GameResult2
     *
     * @return string
     */
    public function getGameResult2()
    {
        return $this->GameResult2;
    }

    /**
     * Set ValidAmount
     *
     * @param string $ValidAmount
     *
     * @return Absettlehistory
     */
    public function setValidAmount($ValidAmount)
    {
        $this->ValidAmount = $ValidAmount;

        return $this;
    }

    /**
     * Get ValidAmount
     *
     * @return string
     */
    public function getValidAmount()
    {
        return $this->ValidAmount;
    }

    /**
     * Set WinOrLoss
     *
     * @param string $WinOrLoss
     *
     * @return Absettlehistory
     */
    public function setWinOrLoss($WinOrLoss)
    {
        $this->WinOrLoss = $WinOrLoss;

        return $this;
    }

    /**
     * Get WinOrLoss
     *
     * @return string
     */
    public function getWinOrLoss()
    {
        return $this->WinOrLoss;
    }

    /**
     * Set Currency
     *
     * @param string $Currency
     *
     * @return Absettlehistory
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
     * Set ExchangeRate
     *
     * @param string $ExchangeRate
     *
     * @return Absettlehistory
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
     * Set GameRoundStartTime
     *
     * @param \DateTime $GameRoundStartTime
     *
     * @return Absettlehistory
     */
    public function setGameRoundStartTime($GameRoundStartTime)
    {
        $this->GameRoundStartTime = $GameRoundStartTime;

        return $this;
    }

    /**
     * Get GameRoundStartTime
     *
     * @return \DateTime
     */
    public function getGameRoundStartTime()
    {
        return $this->GameRoundStartTime;
    }

    /**
     * Set GameRoundEndTime
     *
     * @param \DateTime $GameRoundEndTime
     *
     * @return Absettlehistory
     */
    public function setGameRoundEndTime($GameRoundEndTime)
    {
        $this->GameRoundEndTime = $GameRoundEndTime;

        return $this;
    }

    /**
     * Get GameRoundEndTime
     *
     * @return \DateTime
     */
    public function getGameRoundEndTime()
    {
        return $this->GameRoundEndTime;
    }

    /**
     * Set Commission
     *
     * @param string $Commission
     *
     * @return Absettlehistory
     */
    public function setCommission($Commission)
    {
        $this->Commission = $Commission;

        return $this;
    }

    /**
     * Get Commission
     *
     * @return string
     */
    public function getCommission()
    {
        return $this->Commission;
    }

    /**
     * Set Sign
     *
     * @param string $Sign
     *
     * @return Absettlehistory
     */
    public function setSign($Sign)
    {
        $this->Sign = $Sign;

        return $this;
    }

    /**
     * Get Sign
     *
     * @return string
     */
    public function getSign()
    {
        return $this->Sign;
    }

    /**
     * Set TableName
     *
     * @param string $TableName
     *
     * @return Absettlehistory
     */
    public function setTableName($TableName)
    {
        $this->TableName = $TableName;

        return $this;
    }

    /**
     * Get TableName
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->TableName;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Absettlehistory
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
     * @return Absettlehistory
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
    public function getMModifiedById()
    {
        return $this->ModifiedById;
    }

    /**
     * Set DateCreated
     *
     * @param \DateTime $DateCreated
     *
     * @return Absettlehistory
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
     * @return Absettlehistory
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
     * @return Absettlehistory
     */
    public function setActiveRecord($ActiveRecord)
    {
        $this->ActiveRecord = $ActiveRecord;

        return $this;
    }

    /**
     * Get activerecord
     *
     * @return boolean
     */
    public function getActiveRecord()
    {
        return $this->ActiveRecord;
    }

    /**
     * Set Ip
     *
     * @param string $Ip
     *
     * @return Absettlehistory
     */
    public function setIp($Ip)
    {
        $this->Ip = $Ip;

        return $this;
    }

    /**
     * Get Ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->Ip;
    }

    /**
     * Set Token
     *
     * @param string $Token
     *
     * @return Absettlehistory
     */
    public function setToken($Token)
    {
        $this->Token = $Token;

        return $this;
    }

    /**
     * Get Token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->Token;
    }

    /**
     * Set ABBetHistoryId
     *
     * @param integer $ABBetHistoryId
     *
     * @return Absettlehistory
     */
    public function setABBetHistoryId($ABBetHistoryId)
    {
        $this->ABBetHistoryId = $ABBetHistoryId;

        return $this;
    }

    /**
     * Get ABBetHistoryId
     *
     * @return integer
     */
    public function getABBetHistoryId()
    {
        return $this->ABBetHistoryId;
    }

    /**
     * Set TranTypeName
     *
     * @param string $TranTypeName
     *
     * @return Absettlehistory
     */
    public function setTranTypeName($TranTypeName)
    {
        $this->TranTypeName = $TranTypeName;

        return $this;
    }

    /**
     * Get TranTypeName
     *
     * @return string
     */
    public function getTranTypeName()
    {
        return $this->TranTypeName;
    }

    /**
     * Set RefTranId
     *
     * @param integer $RefTranId
     *
     * @return Absettlehistory
     */
    public function setReftranid($RefTranId)
    {
        $this->RefTranId = $RefTranId;

        return $this;
    }

    /**
     * Get RefTranId
     *
     * @return integer
     */
    public function getRefTranId()
    {
        return $this->RefTranId;
    }
}
