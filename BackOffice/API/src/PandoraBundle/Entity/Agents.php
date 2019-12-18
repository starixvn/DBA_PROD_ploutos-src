<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Agents
 * 
 * @ORM\Table(name="Agents")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgentRepository")
 */
class Agents
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
     *
     * One Agent have One Wallet
     * @ORM\OneToOne(targetEntity="Wallets")
     * @ORM\JoinColumn(name="WalletId", referencedColumnName="Id")
     */
    private $Wallet;
    
    /**
     * @var string
     *
     * @ORM\Column(name="DefaultPassword", type="string", length=100, nullable=true)
     */
    private $DefaultPassword;

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
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Agents
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
     * @return Agents
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
     * Set DefaultPassword
     *
     * @param string $DefaultPassword
     *
     * @return Agents
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * @return Agents
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
     * Set Wallet
     *
     * @param \AppBundle\Entity\Wallets $Wallet
     *
     * @return Agents
     */
    public function setWallet(\PandoraBundle\Entity\Wallets $Wallet = null)
    {
        $this->Wallet = $Wallet;

        return $this;
    }

    /**
     * Get Wallet
     *
     * @return \AppBundle\Entity\Wallets
     */
    public function getWallet()
    {
        return $this->Wallet;
    }
}
