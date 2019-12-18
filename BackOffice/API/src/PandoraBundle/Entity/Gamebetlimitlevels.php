<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Gamebetlimitlevels
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="BetLimitLevelCode")
 * @ORM\Table(name="GameBetLimitLevels", indexes={@ORM\Index(name="INDX_BTLMTSTN_CODE", columns={"BetLimitLevelCode"}), @ORM\Index(name="INDX_BTLMTSTN_RBID", columns={"RollbaseId"})})
 * @UniqueEntity(fields={"BetLimitLevelCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Gamebetlimitlevels extends AbstractEntity
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
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=50, minMessage = "BetLimit Level Code must be at least {{ limit }} characters long", maxMessage = "BetLimit Level Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="BetLimitLevelCode", type="string", length=50, nullable=true)
     */
    private $BetLimitLevelCode;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=100, minMessage = "Bet Limit Level Desc must be at least {{ limit }} characters long", maxMessage = "Bet Limit Level Desc cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="BetLimitLevelDesc", type="string", length=100, nullable=true)
     */
    private $BetLimitLevelDesc;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsDefault", type="boolean", nullable=false)
     */
    private $IsDefault = true;

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
     * Set BetLimitLevelCode
     *
     * @param string $BetLimitLevelCode
     *
     * @return Gamebetlimitlevels
     */
    public function setBetLimitLevelCode($BetLimitLevelCode)
    {
        $this->BetLimitLevelCode = $BetLimitLevelCode;

        return $this;
    }

    /**
     * Get BetLimitLevelCode
     *
     * @return string
     */
    public function getBetLimitLevelCode()
    {
        return $this->BetLimitLevelCode;
    }

    /**
     * Set BetLimitLevelDesc
     *
     * @param string $BetLimitLevelDesc
     *
     * @return Gamebetlimitlevels
     */
    public function setBetLimitLevelDesc($BetLimitLevelDesc)
    {
        $this->BetLimitLevelDesc = $BetLimitLevelDesc;

        return $this;
    }

    /**
     * Get BetLimitLevelDesc
     *
     * @return string
     */
    public function getBetLimitLevelDesc()
    {
        return $this->BetLimitLevelDesc;
    }

    /**
     * Set IsDefault
     *
     * @param boolean $IsDefault
     *
     * @return Gamebetlimitlevels
     */
    public function setIsDefault($IsDefault)
    {
        $this->IsDefault = $IsDefault;

        return $this;
    }

    /**
     * Get IsDefault
     *
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->IsDefault;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Gamebetlimitlevels
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
     * @return Gamebetlimitlevels
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
     * @return Gamebetlimitlevels
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
     * @return Gamebetlimitlevels
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
     * @return Gamebetlimitlevels
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
     * @return Gamebetlimitlevels
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
