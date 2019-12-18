<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playerresetcodes
 *
 * @ORM\Table(name="PlayerResetCodes")
 * @ORM\Entity
 */
class Playerresetcodes
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
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="ResetCode", type="string", length=100, nullable=true)
     */
    private $resetcode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ValidityDate", type="datetime", nullable=true)
     */
    private $validitydate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GeneratedDate", type="datetime", nullable=true)
     */
    private $generateddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="DailyResetCount", type="integer", nullable=true)
     */
    private $dailyresetcount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ResetCodeType", type="integer", nullable=true)
     */
    private $resetcodetype = '0';

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
     * Set userid
     *
     * @param string $userid
     *
     * @return Playerresetcodes
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
     * @return Playerresetcodes
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
     * Set resetcode
     *
     * @param string $resetcode
     *
     * @return Playerresetcodes
     */
    public function setResetcode($resetcode)
    {
        $this->resetcode = $resetcode;

        return $this;
    }

    /**
     * Get resetcode
     *
     * @return string
     */
    public function getResetcode()
    {
        return $this->resetcode;
    }

    /**
     * Set validitydate
     *
     * @param \DateTime $validitydate
     *
     * @return Playerresetcodes
     */
    public function setValiditydate($validitydate)
    {
        $this->validitydate = $validitydate;

        return $this;
    }

    /**
     * Get validitydate
     *
     * @return \DateTime
     */
    public function getValiditydate()
    {
        return $this->validitydate;
    }

    /**
     * Set generateddate
     *
     * @param \DateTime $generateddate
     *
     * @return Playerresetcodes
     */
    public function setGenerateddate($generateddate)
    {
        $this->generateddate = $generateddate;

        return $this;
    }

    /**
     * Get generateddate
     *
     * @return \DateTime
     */
    public function getGenerateddate()
    {
        return $this->generateddate;
    }

    /**
     * Set dailyresetcount
     *
     * @param integer $dailyresetcount
     *
     * @return Playerresetcodes
     */
    public function setDailyresetcount($dailyresetcount)
    {
        $this->dailyresetcount = $dailyresetcount;

        return $this;
    }

    /**
     * Get dailyresetcount
     *
     * @return integer
     */
    public function getDailyresetcount()
    {
        return $this->dailyresetcount;
    }

    /**
     * Set resetcodetype
     *
     * @param integer $resetcodetype
     *
     * @return Playerresetcodes
     */
    public function setResetcodetype($resetcodetype)
    {
        $this->resetcodetype = $resetcodetype;

        return $this;
    }

    /**
     * Get resetcodetype
     *
     * @return integer
     */
    public function getResetcodetype()
    {
        return $this->resetcodetype;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Playerresetcodes
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
     * @return Playerresetcodes
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
     * @return Playerresetcodes
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
     * @return Playerresetcodes
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
     * @return Playerresetcodes
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
