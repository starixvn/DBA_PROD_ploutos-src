<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bsbonuswin
 *
 * @ORM\Table(name="BSBonusWin")
 * @ORM\Entity
 */
class Bsbonuswin
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
     * @ORM\Column(name="BonusId", type="string", length=100, nullable=true)
     */
    private $BonusId;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $Amount;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionId", type="string", length=100, nullable=true)
     */
    private $TransactionId;

    /**
     * @var string
     *
     * @ORM\Column(name="Hash", type="string", length=200, nullable=true)
     */
    private $Hash;

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
     * @return Bsbonuswin
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
     * @return Bsbonuswin
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
     * Set BonusId
     *
     * @param string $BonusId
     *
     * @return Bsbonuswin
     */
    public function setBonusId($BonusId)
    {
        $this->BonusId = $BonusId;

        return $this;
    }

    /**
     * Get BonusId
     *
     * @return string
     */
    public function getBonusId()
    {
        return $this->BonusId;
    }

    /**
     * Set Amount
     *
     * @param string $Amount
     *
     * @return Bsbonuswin
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;

        return $this;
    }

    /**
     * Get Amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * Set TransactionId
     *
     * @param string $TransactionId
     *
     * @return Bsbonuswin
     */
    public function setTransactionId($TransactionId)
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * Get TransactionId
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->TransactionId;
    }

    /**
     * Set Hash
     *
     * @param string $Hash
     *
     * @return Bsbonuswin
     */
    public function setHash($Hash)
    {
        $this->Hash = $Hash;

        return $this;
    }

    /**
     * Get Hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->Hash;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Bsbonuswin
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
     * @return Bsbonuswin
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
     * @return Bsbonuswin
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
     * @return Bsbonuswin
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
     * @return Bsbonuswin
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
