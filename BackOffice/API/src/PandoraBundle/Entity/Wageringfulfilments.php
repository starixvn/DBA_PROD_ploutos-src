<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Wageringfulfilments
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="WageringFulfilmentName")
 * @ORM\Table(name="WageringFulfilments")
 * @ORM\Entity
 */
class Wageringfulfilments extends AbstractEntity
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
     * @ORM\Column(name="WageringFulfilmentName", type="string", length=100, nullable=true)
     */
    private $WageringFulfilmentName;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BetAmount = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerBetId", type="bigint", nullable=false)
     */
    private $PlayerBetId = '0';

    /**
     *
     * One PlayerBetId has One PlayerBetName
     *
     * @ORM\ManyToOne(targetEntity="Playerbets")
     * @ORM\JoinColumn(name="PlayerBetId", referencedColumnName="Id")
     */
    private $PlayerBet;

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletDepositId", type="bigint", nullable=false)
     */
    private $WalletDepositId = '0';

    /**
     *
     * One WalletDepositId has One BankName
     *
     * @ORM\ManyToOne(targetEntity="Walletdeposits")
     * @ORM\JoinColumn(name="WalletDepositId", referencedColumnName="Id")
     */
	private $WalletDeposit;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingPushed", type="boolean", nullable=false)
     */
    private $IsBeingPushed = true;

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
     * Set Id
     *
     * @param integer $Id
     *
     * @return integer
     */
    public function setId($Id)
    {
        return $this->Id = $Id;
    }

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
     * Set WageringFulfilmentName
     *
     * @param string $WageringFulfilmentName
     *
     * @return Wageringfulfilments
     */
    public function setWageringFulfilmentName($WageringFulfilmentName)
    {
        $this->WageringFulfilmentName = $WageringFulfilmentName;

        return $this;
    }

    /**
     * Get WageringFulfilmentName
     *
     * @return string
     */
    public function getWageringFulfilmentName()
    {
        return $this->WageringFulfilmentName;
    }

    /**
     * Set BetAmount
     *
     * @param string $BetAmount
     *
     * @return Wageringfulfilments
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
     * Set PlayerBetId
     *
     * @param integer $PlayerBetId
     *
     * @return Wageringfulfilments
     */
    public function setPlayerBetId($PlayerBetId)
    {
        $this->PlayerBetId = $PlayerBetId;

        return $this;
    }

    /**
     * Get PlayerBetId
     *
     * @return integer
     */
    public function getPlayerBetId()
    {
        return $this->PlayerBetId;
    }

    /**
     * Set WalletDepositId
     *
     * @param integer $WalletDepositId
     *
     * @return Wageringfulfilments
     */
    public function setWalletDepositId($WalletDepositId)
    {
        $this->WalletDepositId = $WalletDepositId;

        return $this;
    }

    /**
     * Get WalletDepositId
     *
     * @return integer
     */
    public function getWalletDepositId()
    {
        return $this->WalletDepositId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Wageringfulfilments
     */
    public function setRollbaseId($RollbaseId)
    {
        $this->RollbaseId = $RollbaseId;

        return $this;
    }

    /**
     * Get RollbaseId
     *
     * @return integer
     */
    public function getRollbaseId()
    {
        return $this->RollbaseId;
    }

    /**
     * Set IsBeingPushed
     *
     * @param boolean $IsBeingPushed
     *
     * @return Wageringfulfilments
     */
    public function setIsBeingPushed($IsBeingPushed)
    {
        $this->IsBeingPushed = $IsBeingPushed;

        return $this;
    }

    /**
     * Get IsBeingPushed
     *
     * @return boolean
     */
    public function getIsBeingPushed()
    {
        return $this->IsBeingPushed;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Wageringfulfilments
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
     * @return Wageringfulfilments
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
     * @return Wageringfulfilments
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
     * @return Wageringfulfilments
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
     * @return Wageringfulfilments
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
     * Set PlayerBet
     *
     * @param \PandoraBundle\Entity\Playerbets $PlayerBet
     *
     * @return Wageringfulfilments
     */
    public function setPlayerBet(\PandoraBundle\Entity\Playerbets $PlayerBet = null)
    {
        $this->PlayerBet = $PlayerBet;
        
        return $this;
    }
    
    /**
     * Get PlayerBet
     *
     * @return \PandoraBundle\Entity\Playerbets
     */
    public function getPlayerBet()
    {
        return $this->PlayerBet;
	}
	

    /**
     * Set WalletDeposit
     *
     * @param \PandoraBundle\Entity\Walletdeposits $WalletDeposit
     *
     * @return Wageringfulfilments
     */
    public function setWalletDeposit(\PandoraBundle\Entity\Walletdeposits $WalletDeposit = null)
    {
        $this->WalletDeposit = $WalletDeposit;
        
        return $this;
    }
    
    /**
     * Get WalletDeposit
     *
     * @return \PandoraBundle\Entity\Walletdeposits
     */
    public function getWalletDeposit()
    {
        return $this->WalletDeposit;
	}
	
}
