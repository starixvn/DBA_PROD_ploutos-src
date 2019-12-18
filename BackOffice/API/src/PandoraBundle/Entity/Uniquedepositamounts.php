<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Uniquedepositamounts
 *
 * @ORM\Table(name="UniqueDepositAmounts")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\UniqueDepositAmountRepository")
 */
class Uniquedepositamounts
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
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="WalletId", type="bigint", nullable=false)
     */
    private $WalletId = '0';

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="WalletDepositId", type="bigint", nullable=false)
     */
    private $WalletDepositId = '0';

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="UniqueDepositAmountRuleId", type="bigint", nullable=false)
     */
    private $UniqueDepositAmountRuleId = '0';

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="DepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $DepositAmount;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="UDARuleValue", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $UDARuleValue;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="GeneratedUDA", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $GeneratedUDA;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="DateGenerated", type="datetime", nullable=true)
     */
    private $DateGenerated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ValidityDate", type="datetime", nullable=true)
     */
    private $ValidityDate;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="InUse", type="boolean", nullable=false)
     */
    private $InUse = false;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsReserved", type="boolean", nullable=false)
     */
    private $IsReserved = false;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=50, minMessage = "UpdateTag must be at least {{ limit }} characters long", maxMessage = "UpdateTag cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="UpdateTag", type="string", length=50, nullable=true)
     */
    private $UpdateTag = '0';

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
     * Set WalletId
     *
     * @param integer $WalletId
     *
     * @return Uniquedepositamounts
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
     * Set WalletDepositId
     *
     * @param integer $WalletDepositId
     *
     * @return Uniquedepositamounts
     */
    public function setWalletDepositId($WalletDepositId)
    {
        $this->WalletDepositId = $WalletDepositId;

        return $this;
    }

    /**
     * Get WalletDepositId
     *
     * @return integer
     */
    public function getWalletDepositId()
    {
        return $this->WalletDepositId;
    }

    /**
     * Set UniqueDepositAmountRuleId
     *
     * @param integer $UniqueDepositAmountRuleId
     *
     * @return Uniquedepositamounts
     */
    public function setUniqueDepositAmountRuleId($UniqueDepositAmountRuleId)
    {
        $this->UniqueDepositAmountRuleId = $UniqueDepositAmountRuleId;

        return $this;
    }

    /**
     * Get UniqueDepositAmountRuleId
     *
     * @return integer
     */
    public function getUniqueDepositAmountRuleId()
    {
        return $this->UniqueDepositAmountRuleId;
    }

    /**
     * Set DepositAmount
     *
     * @param string $DepositAmount
     *
     * @return Uniquedepositamounts
     */
    public function setDepositAmount($DepositAmount)
    {
        $this->DepositAmount = $DepositAmount;

        return $this;
    }

    /**
     * Get DepositAmount
     *
     * @return string
     */
    public function getDepositAmount()
    {
        return $this->DepositAmount;
    }

    /**
     * Set UDARuleValue
     *
     * @param string $UDARuleValue
     *
     * @return Uniquedepositamounts
     */
    public function setUDARuleValue($UDARuleValue)
    {
        $this->UDARuleValue = $UDARuleValue;

        return $this;
    }

    /**
     * Get UDARuleValue
     *
     * @return string
     */
    public function getUDARuleValue()
    {
        return $this->UDARuleValue;
    }

    /**
     * Set GeneratedUDA
     *
     * @param string $GeneratedUDA
     *
     * @return Uniquedepositamounts
     */
    public function setGeneratedUDA($GeneratedUDA)
    {
        $this->GeneratedUDA = $GeneratedUDA;

        return $this;
    }

    /**
     * Get GeneratedUDA
     *
     * @return string
     */
    public function getGeneratedUDA()
    {
        return $this->GeneratedUDA;
    }

    /**
     * Set DateGenerated
     *
     * @param \DateTime $DateGenerated
     *
     * @return Uniquedepositamounts
     */
    public function setDateGenerated($DateGenerated)
    {
        $this->DateGenerated = $DateGenerated;

        return $this;
    }

    /**
     * Get DateGenerated
     *
     * @return \DateTime
     */
    public function getDateGenerated()
    {
        return $this->DateGenerated;
    }

    /**
     * Set ValidityDate
     *
     * @param \DateTime $ValidityDate
     *
     * @return Uniquedepositamounts
     */
    public function setValidityDate($ValidityDate)
    {
        $this->ValidityDate = $ValidityDate;

        return $this;
    }

    /**
     * Get ValidityDate
     *
     * @return \DateTime
     */
    public function getValidityDate()
    {
        return $this->ValidityDate;
    }

    /**
     * Set InUse
     *
     * @param boolean $InUse
     *
     * @return Uniquedepositamounts
     */
    public function setInUse($InUse)
    {
        $this->InUse = $InUse;

        return $this;
    }

    /**
     * Get InUse
     *
     * @return boolean
     */
    public function getInUse()
    {
        return $this->InUse;
    }

    /**
     * Set IsReserved
     *
     * @param boolean $IsReserved
     *
     * @return Uniquedepositamounts
     */
    public function setIsReserved($IsReserved)
    {
        $this->IsReserved = $IsReserved;

        return $this;
    }

    /**
     * Get IsReserved
     *
     * @return boolean
     */
    public function getIsReserved()
    {
        return $this->IsReserved;
    }

    /**
     * Set UpdateTag
     *
     * @param string $UpdateTag
     *
     * @return Uniquedepositamounts
     */
    public function setUpdateTag($UpdateTag)
    {
        $this->UpdateTag = $UpdateTag;

        return $this;
    }

    /**
     * Get UpdateTag
     *
     * @return string
     */
    public function getUpdateTag()
    {
        return $this->UpdateTag;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Uniquedepositamounts
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
     * @return Uniquedepositamounts
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
     * @return Uniquedepositamounts
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
     * @return Uniquedepositamounts
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
     * @return Uniquedepositamounts
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
