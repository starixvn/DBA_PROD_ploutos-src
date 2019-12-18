<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Gamebetlimitsettings
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="BetLimitSettingCode")
 * @ORM\Table(name="GameBetLimitSettings", indexes={@ORM\Index(name="INDX_BTLMTSTN_CODE", columns={"BetLimitSettingCode"}), @ORM\Index(name="INDX_BTLMTSTN_RBID", columns={"RollbaseId"})})
 * @UniqueEntity(fields={"BetLimitSettingCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Gamebetlimitsettings extends AbstractEntity
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
     * @Assert\Length(min=2, max=50, minMessage = "Bet Limit Setting Code must be at least {{ limit }} characters long", maxMessage = "Bet Limit Setting Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="BetLimitSettingCode", type="string", length=50, nullable=true)
     */
    private $BetLimitSettingCode;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=100, minMessage = "Bet Limit Setting Desc must be at least {{ limit }} characters long", maxMessage = "Bet Limit Setting Desc cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="BetLimitSettingDesc", type="string", length=100, nullable=true)
     */
    private $BetLimitSettingDesc;

    /**
     * @var float
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MinBet", type="float", precision=10, scale=0, nullable=true)
     */
    private $MinBet = '0';

    /**
     * @var float
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="MaxBet", type="float", precision=10, scale=0, nullable=true)
     */
    private $MaxBet = '0';

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=50, minMessage = "Game Platform Code must be at least {{ limit }} characters long", maxMessage = "Game Platform Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="GamePlatformCode", type="string", length=50, nullable=true)
     */
    private $GamePlatformCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="GameType", type="integer", nullable=true)
     */
    private $GameType;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=20, minMessage = "Currency Code must be at least {{ limit }} characters long", maxMessage = "Currency Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="CurrencyCode", type="string", length=20, nullable=true)
     */
    private $CurrencyCode;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="BetLimitLevelId", type="bigint", nullable=false)
     */
    private $BetLimitLevelId = '0';
    
    /**
     *
     * One Game Bet Limit Settings to One Game Bet Limit Levels
     *
     * @ORM\OneToOne(targetEntity="Gamebetlimitlevels")
     * @ORM\JoinColumn(name="BetLimitLevelId", referencedColumnName="Id")
     */
    private $BetLimitLevel;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

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
     * Set BetLimitSettingCode
     *
     * @param string $BetLimitSettingCode
     *
     * @return Gamebetlimitsettings
     */
    public function setBetLimitSettingCode($BetLimitSettingCode)
    {
        $this->BetLimitSettingCode = $BetLimitSettingCode;

        return $this;
    }

    /**
     * Get BetLimitSettingCode
     *
     * @return string
     */
    public function getBetLimitSettingCode()
    {
        return $this->BetLimitSettingCode;
    }

    /**
     * Set BetLimitSettingDesc
     *
     * @param string $BetLimitSettingDesc
     *
     * @return Gamebetlimitsettings
     */
    public function setBetLimitSettingDesc($BetLimitSettingDesc)
    {
        $this->BetLimitSettingDesc = $BetLimitSettingDesc;

        return $this;
    }

    /**
     * Get BetLimitSettingDesc
     *
     * @return string
     */
    public function getBetLimitSettingDesc()
    {
        return $this->BetLimitSettingDesc;
    }

    /**
     * Set MinBet
     *
     * @param float $MinBet
     *
     * @return Gamebetlimitsettings
     */
    public function setMinBet($MinBet)
    {
        $this->MinBet = $MinBet;

        return $this;
    }

    /**
     * Get MinBet
     *
     * @return float
     */
    public function getMinBet()
    {
        return $this->MinBet;
    }

    /**
     * Set MaxBet
     *
     * @param float $MaxBet
     *
     * @return Gamebetlimitsettings
     */
    public function setMaxBet($MaxBet)
    {
        $this->MaxBet = $MaxBet;

        return $this;
    }

    /**
     * Get MaxBet
     *
     * @return float
     */
    public function getMaxBet()
    {
        return $this->MaxBet;
    }

    /**
     * Set GamePlatformCode
     *
     * @param string $GamePlatformCode
     *
     * @return Gamebetlimitsettings
     */
    public function setGamePlatformCode($GamePlatformCode)
    {
        $this->GamePlatformCode = $GamePlatformCode;

        return $this;
    }

    /**
     * Get GamePlatformCode
     *
     * @return string
     */
    public function getGamePlatformCode()
    {
        return $this->GamePlatformCode;
    }

    /**
     * Set GameType
     *
     * @param string $GameType
     *
     * @return Gamebetlimitsettings
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
     * Set CurrencyCode
     *
     * @param string $CurrencyCode
     *
     * @return Gamebetlimitsettings
     */
    public function setCurrencyCode($CurrencyCode)
    {
        $this->CurrencyCode = $CurrencyCode;

        return $this;
    }

    /**
     * Get CurrencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->CurrencyCode;
    }

    /**
     * Set BetLimitLevelId
     *
     * @param integer $BetLimitLevelId
     *
     * @return Gamebetlimitsettings
     */
    public function setBetLimitLevelId($BetLimitLevelId)
    {
        $this->BetLimitLevelId = $BetLimitLevelId;

        return $this;
    }

    /**
     * Get BetLimitLevelId
     *
     * @return integer
     */
    public function getBetLimitLevelId()
    {
        return $this->BetLimitLevelId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Gamebetlimitsettings
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Gamebetlimitsettings
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
     * @return Gamebetlimitsettings
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
     * @return Gamebetlimitsettings
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
     * @return Gamebetlimitsettings
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
     * @return Gamebetlimitsettings
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
     * Set BetLimitLevel
     *
     * @param \PandoraBundle\Entity\Gamebetlimitlevels $BetLimitLevel
     *
     * @return Gamebetlimitsettings
     */
    public function setBetLimitLevel(\PandoraBundle\Entity\Gamebetlimitlevels $BetLimitLevel = null)
    {
        $this->BetLimitLevel = $BetLimitLevel;
    
        return $this;
    }
    
    /**
     * Get BetLimitLevel
     *
     * @return \PandoraBundle\Entity\Gamebetlimitlevels $BetLimitLevel
     */
    public function getBetLimitLevel()
    {
        return $this->BetLimitLevel;
	}
}
