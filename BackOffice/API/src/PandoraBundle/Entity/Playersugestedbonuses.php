<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playersugestedbonuses
 *
 * @ORM\Table(name="PlayerSugestedBonuses")
 * @ORM\Entity
 */
class Playersugestedbonuses
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
     * @var integer
     *
     * @ORM\Column(name="BonusId", type="bigint", nullable=false)
     */
    private $bonusid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusCode", type="string", length=50, nullable=true)
     */
    private $bonuscode;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $playerprofileid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=50, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $username;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Hide", type="boolean", nullable=false)
     */
    private $hide = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ValidEndDate", type="datetime", nullable=true)
     */
    private $validenddate;

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
     * Set bonusid
     *
     * @param integer $bonusid
     *
     * @return Playersugestedbonuses
     */
    public function setBonusid($bonusid)
    {
        $this->bonusid = $bonusid;

        return $this;
    }

    /**
     * Get bonusid
     *
     * @return integer
     */
    public function getBonusid()
    {
        return $this->bonusid;
    }

    /**
     * Set bonuscode
     *
     * @param string $bonuscode
     *
     * @return Playersugestedbonuses
     */
    public function setBonuscode($bonuscode)
    {
        $this->bonuscode = $bonuscode;

        return $this;
    }

    /**
     * Get bonuscode
     *
     * @return string
     */
    public function getBonuscode()
    {
        return $this->bonuscode;
    }

    /**
     * Set playerprofileid
     *
     * @param integer $playerprofileid
     *
     * @return Playersugestedbonuses
     */
    public function setPlayerprofileid($playerprofileid)
    {
        $this->playerprofileid = $playerprofileid;

        return $this;
    }

    /**
     * Get playerprofileid
     *
     * @return integer
     */
    public function getPlayerprofileid()
    {
        return $this->playerprofileid;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return Playersugestedbonuses
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Playersugestedbonuses
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set hide
     *
     * @param boolean $hide
     *
     * @return Playersugestedbonuses
     */
    public function setHide($hide)
    {
        $this->hide = $hide;

        return $this;
    }

    /**
     * Get hide
     *
     * @return boolean
     */
    public function getHide()
    {
        return $this->hide;
    }

    /**
     * Set validenddate
     *
     * @param \DateTime $validenddate
     *
     * @return Playersugestedbonuses
     */
    public function setValidenddate($validenddate)
    {
        $this->validenddate = $validenddate;

        return $this;
    }

    /**
     * Get validenddate
     *
     * @return \DateTime
     */
    public function getValidenddate()
    {
        return $this->validenddate;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Playersugestedbonuses
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
     * @return Playersugestedbonuses
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
     * @return Playersugestedbonuses
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
     * @return Playersugestedbonuses
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
     * @return Playersugestedbonuses
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
