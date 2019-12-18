<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abbethistory
 *
 * @ORM\Table(name="ABBetHistory")
 * @ORM\Entity
 */
class Abbethistory
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
     * @ORM\Column(name="Token", type="string", length=100, nullable=true)
     */
    private $Token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BetTime", type="datetime", nullable=true)
     */
    private $BetTime;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $BetAmount;

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
     * @ORM\Column(name="BetType", type="string", length=100, nullable=true)
     */
    private $BetType;

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
     * @ORM\Column(name="Sign", type="string", length=100, nullable=true)
     */
    private $Sign;

    /**
     * @var string
     *
     * @ORM\Column(name="Commission", type="string", length=100, nullable=true)
     */
    private $Commission;

    /**
     * @var string
     *
     * @ORM\Column(name="Ip", type="string", length=100, nullable=true)
     */
    private $Ip;

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
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=100, nullable=true)
     */
    private $Status;

    /**
     * @var integer
     *
     * @ORM\Column(name="ABSettleId", type="bigint", nullable=false)
     */
    private $ABSettleId = '0';



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
     * @return Abbethistory
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
     * Set Token
     *
     * @param string $Token
     *
     * @return Abbethistory
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
     * Set BetTime
     *
     * @param \DateTime $BetTime
     *
     * @return Abbethistory
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
     * Set BetAmount
     *
     * @param string $BetAmount
     *
     * @return Abbethistory
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
     * Set Random
     *
     * @param string $Random
     *
     * @return Abbethistory
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
     * @return Abbethistory
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
     * @return Abbethistory
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
     * @return Abbethistory
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
     * @return Abbethistory
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
     * Set BetType
     *
     * @param string $BetType
     *
     * @return Abbethistory
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
     * Set GameType
     *
     * @param string $GameType
     *
     * @return Abbethistory
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
     * @return Abbethistory
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
     * Set Sign
     *
     * @param string $Sign
     *
     * @return Abbethistory
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
     * Set Commission
     *
     * @param string $Commission
     *
     * @return Abbethistory
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
     * Set Ip
     *
     * @param string $Ip
     *
     * @return Abbethistory
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
     * Set TableName
     *
     * @param string $TableName
     *
     * @return Abbethistory
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
     * @return Abbethistory
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
     * @return Abbethistory
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
     * @return Abbethistory
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
     * @return Abbethistory
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
     * @return Abbethistory
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
     * Set TranTypeName
     *
     * @param string $TranTypeName
     *
     * @return Abbethistory
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
     * @return Abbethistory
     */
    public function setRefTranId($RefTranId)
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

    /**
     * Set Status
     *
     * @param string $Status
     *
     * @return Abbethistory
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Set ABSettleId
     *
     * @param integer $ABSettleId
     *
     * @return Abbethistory
     */
    public function setABSettleId($ABSettleId)
    {
        $this->ABSettleId = $ABSettleId;

        return $this;
    }

    /**
     * Get ABSettleId
     *
     * @return integer
     */
    public function getABSettleId()
    {
        return $this->ABSettleId;
    }
}
