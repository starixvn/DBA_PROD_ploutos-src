<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Merchants
 *
 * @ORM\Table(name="Merchants")
 * @ORM\Entity
 */
class Merchants
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
     * @ORM\Column(name="MerchantCode", type="string", length=100, nullable=true)
     */
    private $MerchantCode;

    /**
     * @var string
     *
     * @ORM\Column(name="MerchantName", type="string", length=100, nullable=true)
     */
    private $MerchantName;

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
     * @ORM\Column(name="Role", type="string", length=100, nullable=true)
     */
    private $Role;

    /**
     * @var string
     *
     * @ORM\Column(name="AuthorizationKey", type="string", length=5000, nullable=true)
     */
    private $AuthorizationKey;

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
     * @var string
     *
     * @ORM\Column(name="ClientId", type="string", length=100, nullable=true)
     */
    private $ClientId;

    /**
     * @var string
     *
     * @ORM\Column(name="ClientSecret", type="string", length=100, nullable=true)
     */
    private $ClientSecret;



    /**
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * Set MerchantCode
     *
     * @param string $MerchantCode
     *
     * @return Merchants
     */
    public function setMerchantCode($MerchantCode)
    {
        $this->MerchantCode = $MerchantCode;

        return $this;
    }

    /**
     * Get MerchantCode
     *
     * @return string
     */
    public function getMerchantCode()
    {
        return $this->MerchantCode;
    }

    /**
     * Set MerchantName
     *
     * @param string $MerchantName
     *
     * @return Merchants
     */
    public function setMerchantName($MerchantName)
    {
        $this->MerchantName = $MerchantName;

        return $this;
    }

    /**
     * Get MerchantName
     *
     * @return string
     */
    public function getMerchantName()
    {
        return $this->MerchantName;
    }

    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Merchants
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
     * @return Merchants
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
     * Set Role
     *
     * @param string $Role
     *
     * @return Merchants
     */
    public function setRole($Role)
    {
        $this->role = $Role;

        return $this;
    }

    /**
     * Get Role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->Role;
    }

    /**
     * Set AuthorizationKey
     *
     * @param string $AuthorizationKey
     *
     * @return Merchants
     */
    public function setAuthorizationKey($AuthorizationKey)
    {
        $this->AuthorizationKey = $AuthorizationKey;

        return $this;
    }

    /**
     * Get AuthorizationKey
     *
     * @return string
     */
    public function getAuthorizationKey()
    {
        return $this->AuthorizationKey;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * @return Brands
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
     * Set ClientId
     *
     * @param string $ClientId
     *
     * @return Merchants
     */
    public function setClientId($ClientId)
    {
        $this->ClientId = $ClientId;

        return $this;
    }

    /**
     * Get ClientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->ClientId;
    }

    /**
     * Set ClientSecret
     *
     * @param string $ClientSecret
     *
     * @return Merchants
     */
    public function setClientSecret($ClientSecret)
    {
        $this->ClientSecret = $ClientSecret;

        return $this;
    }

    /**
     * Get ClientSecret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->ClientSecret;
    }
}
