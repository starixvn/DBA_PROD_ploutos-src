<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bggameevents
 *
 * @ORM\Table(name="BGGameEvents")
 * @ORM\Entity
 */
class Bggameevents
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
     * @ORM\Column(name="SessionId", type="string", length=100, nullable=true)
     */
    private $SessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerId", type="string", length=100, nullable=true)
     */
    private $PlayerId;

    /**
     * @var string
     *
     * @ORM\Column(name="RoundId", type="string", length=100, nullable=true)
     */
    private $RoundId;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=100, nullable=true)
     */
    private $Type;

    /**
     * @var string
     *
     * @ORM\Column(name="Bet", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Bet;

    /**
     * @var string
     *
     * @ORM\Column(name="Win", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Win;

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
     * @ORM\Column(name="Status", type="string", length=50, nullable=true)
     */
    private $Status;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $TransactionNo;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=100, nullable=true)
     */
    private $GameId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $TransactionDate;



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
     * Set SessionId
     *
     * @param string $SessionId
     *
     * @return Bggameevents
     */
    public function setSessionId($SessionId)
    {
        $this->SessionId = $SessionId;

        return $this;
    }

    /**
     * Get SessionId
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->SessionId;
    }

    /**
     * Set PlayerId
     *
     * @param string $PlayerId
     *
     * @return Bggameevents
     */
    public function setPlayerId($PlayerId)
    {
        $this->PlayerId = $PlayerId;

        return $this;
    }

    /**
     * Get PlayerId
     *
     * @return string
     */
    public function getPlayerId()
    {
        return $this->PlayerId;
    }

    /**
     * Set RoundId
     *
     * @param string $RoundId
     *
     * @return Bggameevents
     */
    public function setRoundId($RoundId)
    {
        $this->RoundId = $RoundId;

        return $this;
    }

    /**
     * Get RoundId
     *
     * @return string
     */
    public function getRoundId()
    {
        return $this->RoundId;
    }

    /**
     * Set Type
     *
     * @param string $Type
     *
     * @return Bggameevents
     */
    public function setType($Type)
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * Get Type
     *
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Set Bet
     *
     * @param string $Bet
     *
     * @return Bggameevents
     */
    public function setBet($Bet)
    {
        $this->Bet = $Bet;

        return $this;
    }

    /**
     * Get Bet
     *
     * @return string
     */
    public function getBet()
    {
        return $this->Bet;
    }

    /**
     * Set Win
     *
     * @param string $Win
     *
     * @return Bggameevents
     */
    public function setWin($Win)
    {
        $this->Win = $Win;

        return $this;
    }

    /**
     * Get Win
     *
     * @return string
     */
    public function getWin()
    {
        return $this->Win;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Bggameevents
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
     * @return Bggameevents
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
     * @return Bggameevents
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
     * @return Bggameevents
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
     * @return Bggameevents
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
     * Set Status
     *
     * @param string $Status
     *
     * @return Bggameevents
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
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Bggameevents
     */
    public function setTransactionNo($TransactionNo)
    {
        $this->TransactionNo = $TransactionNo;

        return $this;
    }

    /**
     * Get TransactionNo
     *
     * @return string
     */
    public function getTransactionNo()
    {
        return $this->TransactionNo;
    }

    /**
     * Set GameId
     *
     * @param string $GameId
     *
     * @return Bggameevents
     */
    public function setGameId($GameId)
    {
        $this->GameId = $GameId;

        return $this;
    }

    /**
     * Get GameId
     *
     * @return string
     */
    public function getGameId()
    {
        return $this->GameId;
    }

    /**
     * Set TransactionDate
     *
     * @param \DateTime $TransactionDate
     *
     * @return Bggameevents
     */
    public function setTransactionDate($TransactionDate)
    {
        $this->TransactionDate = $TransactionDate;

        return $this;
    }

    /**
     * Get TransactionDate
     *
     * @return \DateTime
     */
    public function getTransactionDate()
    {
        return $this->TransactionDate;
    }
}
