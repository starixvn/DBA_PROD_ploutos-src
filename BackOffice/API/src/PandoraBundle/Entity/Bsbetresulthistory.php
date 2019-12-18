<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bsbetresulthistory
 *
 * @ORM\Table(name="BSBetResultHistory")
 * @ORM\Entity
 */
class Bsbetresulthistory
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
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="ExtTransactionId", type="string", length=100, nullable=true)
     */
    private $ExtTransactionId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionTime", type="datetime", nullable=true)
     */
    private $TransactionTime;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $BetAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="BetId", type="string", length=100, nullable=true)
     */
    private $BetId;

    /**
     * @var string
     *
     * @ORM\Column(name="WinAmount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $WinAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="WinTransactionId", type="string", length=100, nullable=true)
     */
    private $WinTransactionId;

    /**
     * @var string
     *
     * @ORM\Column(name="RoundId", type="string", length=100, nullable=true)
     */
    private $RoundId;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=100, nullable=true)
     */
    private $GameId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsRoundFinished", type="boolean", nullable=false)
     */
    private $IsRoundFinished = true;

    /**
     * @var string
     *
     * @ORM\Column(name="Hash", type="string", length=200, nullable=true)
     */
    private $Hash;

    /**
     * @var string
     *
     * @ORM\Column(name="GameSessionId", type="string", length=100, nullable=true)
     */
    private $GameSessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="NegativeBet", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $NegativeBet;

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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Bsbetresulthistory
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set ExtTransactionId
     *
     * @param string $ExtTransactionId
     *
     * @return Bsbetresulthistory
     */
    public function setExtTransactionId($ExtTransactionId)
    {
        $this->ExtTransactionId = $ExtTransactionId;

        return $this;
    }

    /**
     * Get ExtTransactionId
     *
     * @return string
     */
    public function getExtTransactionId()
    {
        return $this->ExtTransactionId;
    }

    /**
     * Set TransactionTime
     *
     * @param \DateTime $TransactionTime
     *
     * @return Bsbetresulthistory
     */
    public function setTransactionTime($TransactionTime)
    {
        $this->TransactionTime = $TransactionTime;

        return $this;
    }

    /**
     * Get TransactionTime
     *
     * @return \DateTime
     */
    public function getTransactionTime()
    {
        return $this->TransactionTime;
    }

    /**
     * Set BetAmount
     *
     * @param string $BetAmount
     *
     * @return Bsbetresulthistory
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
     * Set BetId
     *
     * @param string $BetId
     *
     * @return Bsbetresulthistory
     */
    public function setBetId($BetId)
    {
        $this->BetId = $BetId;

        return $this;
    }

    /**
     * Get BetId
     *
     * @return string
     */
    public function getBetId()
    {
        return $this->BetId;
    }

    /**
     * Set WinAmount
     *
     * @param string $WinAmount
     *
     * @return Bsbetresulthistory
     */
    public function setWinAmount($WinAmount)
    {
        $this->WinAmount = $WinAmount;

        return $this;
    }

    /**
     * Get WinAmount
     *
     * @return string
     */
    public function getWinAmount()
    {
        return $this->WinAmount;
    }

    /**
     * Set WinTransactionId
     *
     * @param string $WinTransactionId
     *
     * @return Bsbetresulthistory
     */
    public function setWinTransactionId($WinTransactionId)
    {
        $this->WinTransactionId = $WinTransactionId;

        return $this;
    }

    /**
     * Get WinTransactionId
     *
     * @return string
     */
    public function getWinTransactionId()
    {
        return $this->WinTransactionId;
    }

    /**
     * Set RoundId
     *
     * @param string $RoundId
     *
     * @return Bsbetresulthistory
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
     * Set GameId
     *
     * @param string $GameId
     *
     * @return Bsbetresulthistory
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
     * Set IsRoundFinished
     *
     * @param boolean $IsRoundFinished
     *
     * @return Bsbetresulthistory
     */
    public function setIsRoundFinished($IsRoundFinished)
    {
        $this->IsRoundFinished = $IsRoundFinished;

        return $this;
    }

    /**
     * Get IsRoundFinished
     *
     * @return boolean
     */
    public function getIsRoundFinished()
    {
        return $this->IsRoundFinished;
    }

    /**
     * Set Hash
     *
     * @param string $Hash
     *
     * @return Bsbetresulthistory
     */
    public function setHash($Hash)
    {
        $this->Hash = $Hash;

        return $this;
    }

    /**
     * Get Hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->Hash;
    }

    /**
     * Set GameSessionId
     *
     * @param string $GameSessionId
     *
     * @return Bsbetresulthistory
     */
    public function setGameSessionId($GameSessionId)
    {
        $this->GameSessionId = $GameSessionId;

        return $this;
    }

    /**
     * Get GameSessionId
     *
     * @return string
     */
    public function getGameSessionId()
    {
        return $this->GameSessionId;
    }

    /**
     * Set NegativeBet
     *
     * @param string $NegativeBet
     *
     * @return Bsbetresulthistory
     */
    public function setNegativeBet($NegativeBet)
    {
        $this->NegativeBet = $NegativeBet;

        return $this;
    }

    /**
     * Get NegativeBet
     *
     * @return string
     */
    public function getNegativeBet()
    {
        return $this->NegativeBet;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Bsbetresulthistory
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
     * @return Bsbetresulthistory
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
     * @return Bsbetresulthistory
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
     * @return Bsbetresulthistory
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
     * @return Bsbetresulthistory
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
}
