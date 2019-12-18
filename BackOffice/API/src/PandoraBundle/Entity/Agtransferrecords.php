<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agtransferrecords
 *
 * @ORM\Table(name="AGTransferRecords")
 * @ORM\Entity
 */
class Agtransferrecords
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
     * @ORM\Column(name="AGId", type="string", length=100, nullable=true)
     */
    private $AGId;

    /**
     * @var string
     *
     * @ORM\Column(name="AgentCode", type="string", length=50, nullable=true)
     */
    private $AgentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="TransferId", type="string", length=100, nullable=true)
     */
    private $TransferId;

    /**
     * @var string
     *
     * @ORM\Column(name="TradeNo", type="string", length=50, nullable=true)
     */
    private $TradeNo;

    /**
     * @var string
     *
     * @ORM\Column(name="PlatformType", type="string", length=50, nullable=true)
     */
    private $PlatformType;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerName", type="string", length=50, nullable=true)
     */
    private $PlayerName;

    /**
     * @var string
     *
     * @ORM\Column(name="TransferType", type="string", length=50, nullable=true)
     */
    private $TransferType;

    /**
     * @var string
     *
     * @ORM\Column(name="TransferAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TransferAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="PreviousAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $PreviousAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="CurrentAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $CurrentAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=15, nullable=true)
     */
    private $Currency;

    /**
     * @var string
     *
     * @ORM\Column(name="ExchangeRate", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ExchangeRate;

    /**
     * @var string
     *
     * @ORM\Column(name="IpAddress", type="string", length=20, nullable=true)
     */
    private $IpAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="Flag", type="string", length=5, nullable=true)
     */
    private $Flag;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreationTime", type="datetime", nullable=true)
     */
    private $CreationTime;

    /**
     * @var string
     *
     * @ORM\Column(name="GameCode", type="string", length=20, nullable=true)
     */
    private $GameCode;

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
     * @ORM\Column(name="HunterBetId", type="string", length=50, nullable=true)
     */
    private $HunterBetId;

    /**
     * @var string
     *
     * @ORM\Column(name="Remark", type="string", length=500, nullable=true)
     */
    private $Remark;



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
     * Set Dataype
     *
     * @param string $Dataype
     *
     * @return Agtransferrecords
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
     * Set AGId
     *
     * @param string $AGId
     *
     * @return Agtransferrecords
     */
    public function setAGId($AGId)
    {
        $this->AGId = $AGId;

        return $this;
    }

    /**
     * Get AGId
     *
     * @return string
     */
    public function getAGId()
    {
        return $this->AGId;
    }

    /**
     * Set AgentCode
     *
     * @param string $AgentCode
     *
     * @return Agtransferrecords
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
     * Set TransferId
     *
     * @param string $TransferId
     *
     * @return Agtransferrecords
     */
    public function setTransferId($TransferId)
    {
        $this->TransferId = $TransferId;

        return $this;
    }

    /**
     * Get TransferId
     *
     * @return string
     */
    public function getTransferId()
    {
        return $this->TransferId;
    }

    /**
     * Set TradeNo
     *
     * @param string $TradeNo
     *
     * @return Agtransferrecords
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
     * Set PlatformType
     *
     * @param string $PlatformType
     *
     * @return Agtransferrecords
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
     * Set PlayerName
     *
     * @param string $PlayerName
     *
     * @return Agtransferrecords
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
     * Set TransferType
     *
     * @param string $TransferType
     *
     * @return Agtransferrecords
     */
    public function setTransferType($TransferType)
    {
        $this->TransferType = $TransferType;

        return $this;
    }

    /**
     * Get TransferType
     *
     * @return string
     */
    public function getTransferType()
    {
        return $this->TransferType;
    }

    /**
     * Set TransferAmount
     *
     * @param string $TransferAmount
     *
     * @return Agtransferrecords
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
     * Set PreviousAmount
     *
     * @param string $PreviousAmount
     *
     * @return Agtransferrecords
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
     * Set CurrentAmount
     *
     * @param string $CurrentAmount
     *
     * @return Agtransferrecords
     */
    public function setCurrentAmount($CurrentAmount)
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
     * Set Currency
     *
     * @param string $Currency
     *
     * @return Agtransferrecords
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
     * @return Agtransferrecords
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
     * Set IpAddress
     *
     * @param string $IpAddress
     *
     * @return Agtransferrecords
     */
    public function setIpAddress($IpAddress)
    {
        $this->IpAddress = $IpAddress;

        return $this;
    }

    /**
     * Get IpAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->IpAddress;
    }

    /**
     * Set Flag
     *
     * @param string $Flag
     *
     * @return Agtransferrecords
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
     * Set CreationTime
     *
     * @param \DateTime $CreationTime
     *
     * @return Agtransferrecords
     */
    public function setCreationTime($CreationTime)
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
     * Set GameCode
     *
     * @param string $GameCode
     *
     * @return Agtransferrecords
     */
    public function setGameCode($GameCode)
    {
        $this->GameCode = $GameCode;

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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Agtransferrecords
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
     * @return Agtransferrecords
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
     * @return Agtransferrecords
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
     * @return Agtransferrecords
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
     * @return Agtransferrecords
     */
    public function setActiverecord($ActiveRecord)
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
     * Set HunterBetId
     *
     * @param string $HunterBetId
     *
     * @return Agtransferrecords
     */
    public function setHunterbetid($HunterBetId)
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
     * Set Remark
     *
     * @param string $Remark
     *
     * @return Agtransferrecords
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
}
