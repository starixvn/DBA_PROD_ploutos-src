<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Subagents
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="UserName")
 * @ORM\Table(name="SubAgents")
 * @ORM\Entity
 */
class Subagents
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
     * @ORM\Column(name="AgentCode", type="string", length=100, nullable=true)
     */
    private $AgentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="BusinessName", type="string", length=100, nullable=true)
     */
    private $BusinessName;

    /**
     * @var string
     *
     * @ORM\Column(name="BrandCode", type="string", length=100, nullable=true)
     */
    private $BrandCode;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=10, nullable=true)
     */
    private $Currency;

    /**
     * @var integer
     *
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ParentAgentId", type="bigint", nullable=false)
     */
    private $ParentAgentId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="AgentId", type="bigint", nullable=false)
     */
    private $AgentId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletId", type="bigint", nullable=false)
     */
    private $WalletId = '0';

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
     * @var integer
     *
     * @ORM\Column(name="SubAgentStatus", type="integer", nullable=false)
     */
    private $SubAgentStatus = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="DefaultPassword", type="string", length=100, nullable=true)
     */
    private $DefaultPassword;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedPasswordChange", type="boolean", nullable=false)
     */
    private $NeedPasswordChange = true;

    /**
     * @var string
     *
     * @ORM\Column(name="AmountChanged", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $AmountChanged = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsIncrease", type="boolean", nullable=false)
     */
    private $IsIncrease = true;



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
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Subagents
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
     * @return Subagents
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;

        return $this;
    }

    /**
     * Get UserName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * Set AgentCode
     *
     * @param string $AgentCode
     *
     * @return Subagents
     */
    public function setAgentCode($AgentCode)
    {
        $this->AgentCode = $AgentCode;

        return $this;
    }

    /**
     * Get AgentCode
     *
     * @return string
     */
    public function getAgentCode()
    {
        return $this->AgentCode;
    }

    /**
     * Set BusinessName
     *
     * @param string $BusinessName
     *
     * @return Subagents
     */
    public function setBusinessName($BusinessName)
    {
        $this->BusinessName = $BusinessName;

        return $this;
    }

    /**
     * Get BusinessName
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->BusinessName;
    }

    /**
     * Set BrandCode
     *
     * @param string $BrandCode
     *
     * @return Subagents
     */
    public function setBrandCode($BrandCode)
    {
        $this->BrandCode = $BrandCode;

        return $this;
    }

    /**
     * Get BrandCode
     *
     * @return string
     */
    public function getBrandCode()
    {
        return $this->BrandCode;
    }

    /**
     * Set Currency
     *
     * @param string $Currency
     *
     * @return Subagents
     */
    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;

        return $this;
    }

    /**
     * Get Currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Subagents
     */
    public function setBrandId($BrandId)
    {
        $this->BrandId = $BrandId;

        return $this;
    }

    /**
     * Get BrandId
     *
     * @return integer
     */
    public function getBrandId()
    {
        return $this->BrandId;
    }

    /**
     * Set ParentAgentId
     *
     * @param integer $ParentAgentId
     *
     * @return Subagents
     */
    public function setParentAgentId($ParentAgentId)
    {
        $this->ParentAgentId = $ParentAgentId;

        return $this;
    }

    /**
     * Get ParentAgentId
     *
     * @return integer
     */
    public function getParentAgentId()
    {
        return $this->ParentAgentId;
    }

    /**
     * Set AgentId
     *
     * @param integer $AgentId
     *
     * @return Subagents
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Subagents
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
     * Set WalletId
     *
     * @param integer $WalletId
     *
     * @return Subagents
     */
    public function setWalletId($WalletId)
    {
        $this->WalletId = $WalletId;

        return $this;
    }

    /**
     * Get WalletId
     *
     * @return integer
     */
    public function getWalletId()
    {
        return $this->WalletId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Subagents
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
     * @return Subagents
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
     * @return Subagents
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
     * @return Subagents
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
     * @return Subagents
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
     * Set SubAgentStatus
     *
     * @param integer $SubAgentStatus
     *
     * @return Subagents
     */
    public function setSubAgentStatus($SubAgentStatus)
    {
        $this->SubAgentStatus = $SubAgentStatus;

        return $this;
    }

    /**
     * Get SubAgentStatus
     *
     * @return integer
     */
    public function getSubAgentStatus()
    {
        return $this->SubAgentStatus;
    }

    /**
     * Set DefaultPassword
     *
     * @param string $DefaultPassword
     *
     * @return Subagents
     */
    public function setDefaultPassword($DefaultPassword)
    {
        $this->DefaultPassword = $DefaultPassword;

        return $this;
    }

    /**
     * Get DefaultPassword
     *
     * @return string
     */
    public function getDefaultPassword()
    {
        return $this->DefaultPassword;
    }

    /**
     * Set NeedPasswordChange
     *
     * @param boolean $NeedPasswordChange
     *
     * @return Subagents
     */
    public function setNeedPasswordChange($NeedPasswordChange)
    {
        $this->NeedPasswordChange = $NeedPasswordChange;

        return $this;
    }

    /**
     * Get NeedPasswordChange
     *
     * @return boolean
     */
    public function getNeedPasswordChange()
    {
        return $this->NeedPasswordChange;
    }

    /**
     * Set AmountChanged
     *
     * @param string $AmountChanged
     *
     * @return Subagents
     */
    public function setAmountChanged($AmountChanged)
    {
        $this->AmountChanged = $AmountChanged;

        return $this;
    }

    /**
     * Get AmountChanged
     *
     * @return string
     */
    public function getAmountChanged()
    {
        return $this->AmountChanged;
    }

    /**
     * Set IsIncrease
     *
     * @param boolean $IsIncrease
     *
     * @return Subagents
     */
    public function setIsIncrease($IsIncrease)
    {
        $this->IsIncrease = $IsIncrease;

        return $this;
    }

    /**
     * Get IsIncrease
     *
     * @return boolean
     */
    public function getIsIncrease()
    {
        return $this->IsIncrease;
    }
}
