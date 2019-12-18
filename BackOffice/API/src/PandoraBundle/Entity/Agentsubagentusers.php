<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agentsubagentusers
 *
 * @ORM\Table(name="AgentSubAgentUsers")
 * @ORM\Entity
 */
class Agentsubagentusers
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
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=100, nullable=true)
     */
    private $UserName;

    /**
     * @var string
     *
     * @ORM\Column(name="AgentSubAgentUserCode", type="string", length=100, nullable=true)
     */
    private $AgentSubAgentUserCode;

    /**
     * @var string
     *
     * @ORM\Column(name="FullName", type="string", length=100, nullable=true)
     */
    private $FullName;

    /**
     * @var integer
     *
     * @ORM\Column(name="AgentId", type="bigint", nullable=false)
     */
    private $AgentId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="SubAgentId", type="bigint", nullable=false)
     */
    private $SubAgentId= '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="CanCreatePlayer", type="boolean", nullable=false)
     */
    private $CanCreatePlayer = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CanTransactPlayer", type="boolean", nullable=false)
     */
    private $CanTransactPlayer = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CanViewPlayerReport", type="boolean", nullable=false)
     */
    private $CanViewPlayerReport = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsSubAgentUser", type="boolean", nullable=false)
     */
    private $IsSubAgentUser = true;

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
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Agentsubagentusers
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set UserName
     *
     * @param string $UserName
     *
     * @return Agentsubagentusers
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * Set AgentSubAgentUserCode
     *
     * @param string $AgentSubAgentUserCode
     *
     * @return Agentsubagentusers
     */
    public function setAgentSubAgentUserCode($AgentSubAgentUserCode)
    {
        $this->AgentSubAgentUserCode = $AgentSubAgentUserCode;

        return $this;
    }

    /**
     * Get agentsubagentusercode
     *
     * @return string
     */
    public function getAgentSubAgentUserCode()
    {
        return $this->AgentSubAgentUserCode;
    }

    /**
     * Set FullName
     *
     * @param string $FullName
     *
     * @return Agentsubagentusers
     */
    public function setFullName($FullName)
    {
        $this->FullName = $FullName;

        return $this;
    }

    /**
     * Get FullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->FullName;
    }

    /**
     * Set AgentId
     *
     * @param integer $AgentId
     *
     * @return Agentsubagentusers
     */
    public function setAgentId($AgentId)
    {
        $this->AgentId = $AgentId;

        return $this;
    }

    /**
     * Get AgentId
     *
     * @return integer
     */
    public function getAgentId()
    {
        return $this->AgentId;
    }

    /**
     * Set SubAgentId
     *
     * @param integer $SubAgentId
     *
     * @return Agentsubagentusers
     */
    public function setSubAgentId($SubAgentId)
    {
        $this->SubAgentId = $SubAgentId;

        return $this;
    }

    /**
     * Get SubAgentId
     *
     * @return integer
     */
    public function getSubAgentId()
    {
        return $this->SubAgentId;
    }

    /**
     * Set CanCreatePlayer
     *
     * @param boolean $CanCreatePlayer
     *
     * @return Agentsubagentusers
     */
    public function setCanCreatePlayer($CanCreatePlayer)
    {
        $this->CanCreatePlayer = $CanCreatePlayer;

        return $this;
    }

    /**
     * Get CanCreatePlayer
     *
     * @return boolean
     */
    public function getCanCreatePlayer()
    {
        return $this->CanCreatePlayer;
    }

    /**
     * Set CanTransactPlayer
     *
     * @param boolean $CanTransactPlayer
     *
     * @return Agentsubagentusers
     */
    public function setCanTransactPlayer($CanTransactPlayer)
    {
        $this->CanTransactPlayer = $CanTransactPlayer;

        return $this;
    }

    /**
     * Get CanTransactPlayer
     *
     * @return boolean
     */
    public function getCanTransactPlayer()
    {
        return $this->CanTransactPlayer;
    }

    /**
     * Set CanViewPlayerReport
     *
     * @param boolean $CanViewPlayerReport
     *
     * @return Agentsubagentusers
     */
    public function setCanViewPlayerReport($CanViewPlayerReport)
    {
        $this->CanViewPlayerReport = $CanViewPlayerReport;

        return $this;
    }

    /**
     * Get CanViewPlayerReport
     *
     * @return boolean
     */
    public function getCanViewPlayerReport()
    {
        return $this->CanViewPlayerReport;
    }

    /**
     * Set IsSubAgentUser
     *
     * @param boolean $IsSubAgentUser
     *
     * @return Agentsubagentusers
     */
    public function setIsSubAgentUser($IsSubAgentUser)
    {
        $this->IsSubAgentUser = $IsSubAgentUser;

        return $this;
    }

    /**
     * Get IsSubAgentUser
     *
     * @return boolean
     */
    public function getIsSubAgentUser()
    {
        return $this->IsSubAgentUser;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Agentsubagentusers
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
     * @return Agentsubagentusers
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
     * @return Agentsubagentusers
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
     * @return Agentsubagentusers
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
     * @return Agentsubagentusers
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
