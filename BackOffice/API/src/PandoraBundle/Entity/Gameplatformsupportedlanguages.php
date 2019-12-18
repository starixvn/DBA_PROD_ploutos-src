<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gameplatformsupportedlanguages
 *
 * @ORM\Table(name="GamePlatformSupportedLanguages")
 * @ORM\Entity
 */
class Gameplatformsupportedlanguages
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
     * @ORM\Column(name="GamePlatformCode", type="string", length=100, nullable=true)
     */
    private $GamePlatformCode;

    /**
     * @var string
     *
     * @ORM\Column(name="LanguageCode", type="string", length=100, nullable=true)
     */
    private $LanguageCode;

    /**
     * @var string
     *
     * @ORM\Column(name="GamePlatformLanguageCode", type="string", length=100, nullable=true)
     */
    private $GamePlatformLanguageCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="GamePlatformId", type="bigint", nullable=false)
     */
    private $GamePlatformId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="LanguageId", type="bigint", nullable=false)
     */
    private $LanguageId = '0';

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
     * @return Gameplatformsupportedlanguages
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
     * Set LanguageCode
     *
     * @param string $LanguageCode
     *
     * @return Gameplatformsupportedlanguages
     */
    public function setLanguageCode($LanguageCode)
    {
        $this->LanguageCode = $LanguageCode;

        return $this;
    }

    /**
     * Get LanguageCode
     *
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->LanguageCode;
    }

    /**
     * Set GamePlatformLanguageCode
     *
     * @param string $GamePlatformLanguageCode
     *
     * @return Gameplatformsupportedlanguages
     */
    public function setGamePlatformLanguageCode($GamePlatformLanguageCode)
    {
        $this->GamePlatformLanguageCode = $GamePlatformLanguageCode;

        return $this;
    }

    /**
     * Get GamePlatformLanguageCode
     *
     * @return string
     */
    public function getGamePlatformLanguageCode()
    {
        return $this->GamePlatformLanguageCode;
    }

    /**
     * Set GamePlatformId
     *
     * @param integer $GamePlatformId
     *
     * @return Gameplatformsupportedlanguages
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
     * Set LanguageId
     *
     * @param integer $LanguageId
     *
     * @return Gameplatformsupportedlanguages
     */
    public function setLanguageId($LanguageId)
    {
        $this->LanguageId = $LanguageId;

        return $this;
    }

    /**
     * Get LanguageId
     *
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->LanguageId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Gameplatformsupportedlanguages
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
     * @return Gameplatformsupportedlanguages
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
     * @return Gameplatformsupportedlanguages
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
     * @return Gameplatformsupportedlanguages
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
     * @return Gameplatformsupportedlanguages
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
     * @return Gameplatformsupportedlanguages
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
