<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gdgametypes
 *
 * @ORM\Table(name="GDGameTypes", uniqueConstraints={@ORM\UniqueConstraint(name="GDGameTypeCode", columns={"GDGameTypeCode"})})
 * @ORM\Entity
 */
class Gdgametypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="GDGameTypeCode", type="string", length=100, nullable=true)
     */
    private $gdgametypecode;

    /**
     * @var string
     *
     * @ORM\Column(name="GDGameTypeName", type="string", length=100, nullable=true)
     */
    private $gdgametypename;

    /**
     * @var string
     *
     * @ORM\Column(name="GDGameTypeDesc", type="string", length=100, nullable=true)
     */
    private $gdgametypedesc;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $createdbyid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=50, nullable=true)
     */
    private $modifiedbyid = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime", nullable=true)
     */
    private $datecreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $datemodified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=false)
     */
    private $activerecord = true;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gdgametypecode
     *
     * @param string $gdgametypecode
     *
     * @return Gdgametypes
     */
    public function setGdgametypecode($gdgametypecode)
    {
        $this->gdgametypecode = $gdgametypecode;

        return $this;
    }

    /**
     * Get gdgametypecode
     *
     * @return string
     */
    public function getGdgametypecode()
    {
        return $this->gdgametypecode;
    }

    /**
     * Set gdgametypename
     *
     * @param string $gdgametypename
     *
     * @return Gdgametypes
     */
    public function setGdgametypename($gdgametypename)
    {
        $this->gdgametypename = $gdgametypename;

        return $this;
    }

    /**
     * Get gdgametypename
     *
     * @return string
     */
    public function getGdgametypename()
    {
        return $this->gdgametypename;
    }

    /**
     * Set gdgametypedesc
     *
     * @param string $gdgametypedesc
     *
     * @return Gdgametypes
     */
    public function setGdgametypedesc($gdgametypedesc)
    {
        $this->gdgametypedesc = $gdgametypedesc;

        return $this;
    }

    /**
     * Get gdgametypedesc
     *
     * @return string
     */
    public function getGdgametypedesc()
    {
        return $this->gdgametypedesc;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Gdgametypes
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }

    /**
     * Get createdbyid
     *
     * @return string
     */
    public function getCreatedbyid()
    {
        return $this->createdbyid;
    }

    /**
     * Set modifiedbyid
     *
     * @param string $modifiedbyid
     *
     * @return Gdgametypes
     */
    public function setModifiedbyid($modifiedbyid)
    {
        $this->modifiedbyid = $modifiedbyid;

        return $this;
    }

    /**
     * Get modifiedbyid
     *
     * @return string
     */
    public function getModifiedbyid()
    {
        return $this->modifiedbyid;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     *
     * @return Gdgametypes
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set datemodified
     *
     * @param \DateTime $datemodified
     *
     * @return Gdgametypes
     */
    public function setDatemodified($datemodified)
    {
        $this->datemodified = $datemodified;

        return $this;
    }

    /**
     * Get datemodified
     *
     * @return \DateTime
     */
    public function getDatemodified()
    {
        return $this->datemodified;
    }

    /**
     * Set activerecord
     *
     * @param boolean $activerecord
     *
     * @return Gdgametypes
     */
    public function setActiverecord($activerecord)
    {
        $this->activerecord = $activerecord;

        return $this;
    }

    /**
     * Get activerecord
     *
     * @return boolean
     */
    public function getActiverecord()
    {
        return $this->activerecord;
    }
}
