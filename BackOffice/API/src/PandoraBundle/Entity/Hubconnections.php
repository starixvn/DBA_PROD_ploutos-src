<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hubconnections
 *
 * @ORM\Table(name="HubConnections")
 * @ORM\Entity
 */
class Hubconnections
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
     * @ORM\Column(name="ConnectionId", type="string", length=300, nullable=true)
     */
    private $connectionid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserSignalRTokenId", type="string", length=100, nullable=true)
     */
    private $usersignalrtokenid;

    /**
     * @var string
     *
     * @ORM\Column(name="TokenId", type="string", length=100, nullable=true)
     */
    private $tokenid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $userid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeConnected", type="datetime", nullable=true)
     */
    private $timeconnected;

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
     * Set connectionid
     *
     * @param string $connectionid
     *
     * @return Hubconnections
     */
    public function setConnectionid($connectionid)
    {
        $this->connectionid = $connectionid;

        return $this;
    }

    /**
     * Get connectionid
     *
     * @return string
     */
    public function getConnectionid()
    {
        return $this->connectionid;
    }

    /**
     * Set usersignalrtokenid
     *
     * @param string $usersignalrtokenid
     *
     * @return Hubconnections
     */
    public function setUsersignalrtokenid($usersignalrtokenid)
    {
        $this->usersignalrtokenid = $usersignalrtokenid;

        return $this;
    }

    /**
     * Get usersignalrtokenid
     *
     * @return string
     */
    public function getUsersignalrtokenid()
    {
        return $this->usersignalrtokenid;
    }

    /**
     * Set tokenid
     *
     * @param string $tokenid
     *
     * @return Hubconnections
     */
    public function setTokenid($tokenid)
    {
        $this->tokenid = $tokenid;

        return $this;
    }

    /**
     * Get tokenid
     *
     * @return string
     */
    public function getTokenid()
    {
        return $this->tokenid;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Hubconnections
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
     * Set userid
     *
     * @param string $userid
     *
     * @return Hubconnections
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
     * Set timeconnected
     *
     * @param \DateTime $timeconnected
     *
     * @return Hubconnections
     */
    public function setTimeconnected($timeconnected)
    {
        $this->timeconnected = $timeconnected;

        return $this;
    }

    /**
     * Get timeconnected
     *
     * @return \DateTime
     */
    public function getTimeconnected()
    {
        return $this->timeconnected;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Hubconnections
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
     * @return Hubconnections
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
     * @return Hubconnections
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
     * @return Hubconnections
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
     * @return Hubconnections
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
