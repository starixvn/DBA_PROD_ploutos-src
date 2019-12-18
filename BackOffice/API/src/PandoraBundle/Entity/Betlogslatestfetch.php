<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Betlogslatestfetch
 *
 * @ORM\Table(name="BetLogsLatestFetch")
 * @ORM\Entity
 */
class Betlogslatestfetch
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
     * @ORM\Column(name="GamePlatformCode", type="string", length=5, nullable=true)
     */
    private $GamePlatformCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LatestExecutionDate", type="datetime", nullable=true)
     */
    private $LatestExecutionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GPServerDate", type="datetime", nullable=true)
     */
    private $GPServerDate;

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
     * @return Betlogslatestfetch
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
     * Set LatestExecutionDate
     *
     * @param \DateTime $LatestExecutionDate
     *
     * @return Betlogslatestfetch
     */
    public function setLatestExecutionDate($LatestExecutionDate)
    {
        $this->LatestExecutionDate = $LatestExecutionDate;

        return $this;
    }

    /**
     * Get LatestExecutionDate
     *
     * @return \DateTime
     */
    public function getLatestExecutionDate()
    {
        return $this->LatestExecutionDate;
    }

    /**
     * Set GPServerDate
     *
     * @param \DateTime $GPServerDate
     *
     * @return Betlogslatestfetch
     */
    public function setGPServerDate($GPServerDate)
    {
        $this->GPServerDate = $GPServerDate;

        return $this;
    }

    /**
     * Get GPServerDate
     *
     * @return \DateTime
     */
    public function getGPServerDate()
    {
        return $this->GPServerDate;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Betlogslatestfetch
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
     * @return Betlogslatestfetch
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
     * @return Betlogslatestfetch
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
     * @return Betlogslatestfetch
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
     * @return Betlogslatestfetch
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
