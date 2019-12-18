<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Gameplatformsupportedcurrencies
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="GamePlatformCode")
 * @ORM\Table(name="GamePlatformSupportedCurrencies")
 * @ORM\Entity
 */
class Gameplatformsupportedcurrencies extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Game Platform Code must be at least {{ limit }} characters long", maxMessage = "Game Platform Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="GamePlatformCode", type="string", length=100, nullable=true)
     */
    private $GamePlatformCode;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=100, minMessage = "Currency Code must be at least {{ limit }} characters long", maxMessage = "Currency Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="CurrencyCode", type="string", length=100, nullable=true)
     */
    private $CurrencyCode;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="GamePlatformId", type="bigint", nullable=false)
     */
    private $GamePlatformId = '0';

    /**
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $CurrencyId = '0';

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
     * Set GamePlatformCode
     *
     * @param string $GamePlatformCode
     *
     * @return Gameplatformsupportedcurrencies
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
     * Set CurrencyCode
     *
     * @param string $CurrencyCode
     *
     * @return Gameplatformsupportedcurrencies
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
     * Set GamePlatformId
     *
     * @param integer $GamePlatformId
     *
     * @return Gameplatformsupportedcurrencies
     */
    public function setGamePlatformId($GamePlatformId)
    {
        $this->GamePlatformId = $GamePlatformId;

        return $this;
    }

    /**
     * Get GamePlatformId
     *
     * @return integer
     */
    public function getGamePlatformId()
    {
        return $this->GamePlatformId;
    }

    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Gameplatformsupportedcurrencies
     */
    public function setCurrencyId($CurrencyId)
    {
        $this->CurrencyId = $CurrencyId;

        return $this;
    }

    /**
     * Get CurrencyId
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->CurrencyId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Gameplatformsupportedcurrencies
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
     * @return Gameplatformsupportedcurrencies
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
     * @return Gameplatformsupportedcurrencies
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
     * @return Gameplatformsupportedcurrencies
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
     * @return Gameplatformsupportedcurrencies
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
     * @return Gameplatformsupportedcurrencies
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
