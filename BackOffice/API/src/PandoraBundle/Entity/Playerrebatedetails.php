<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Playerrebatedetails
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="Id")
 * @ORM\Table(name="PlayerRebateDetails")
 * @ORM\Entity
 */
class Playerrebatedetails
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
     * @ORM\Column(name="TotalBetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalBetAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="RebateAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $RebateAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRebateId", type="bigint", nullable=false)
     */
    private $PlayerRebateId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RebateDetailId", type="bigint", nullable=false)
     */
    private $RebateDetailId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ProductId", type="bigint", nullable=false)
     */
    private $ProductId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

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
     * @ORM\Column(name="RebateRate", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $RebateRate;



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
     * Set TotalBetAmount
     *
     * @param string $TotalBetAmount
     *
     * @return Playerrebatedetails
     */
    public function setTotalBetAmount($TotalBetAmount)
    {
        $this->TotalBetAmount = $TotalBetAmount;

        return $this;
    }

    /**
     * Get TotalBetAmount
     *
     * @return string
     */
    public function getTotalBetAmount()
    {
        return $this->TotalBetAmount;
    }

    /**
     * Set RebateAmount
     *
     * @param string $RebateAmount
     *
     * @return Playerrebatedetails
     */
    public function setRebateAmount($RebateAmount)
    {
        $this->RebateAmount = $RebateAmount;

        return $this;
    }

    /**
     * Get RebateAmount
     *
     * @return string
     */
    public function getRebateAmount()
    {
        return $this->RebateAmount;
    }

    /**
     * Set PlayerRebateId
     *
     * @param integer $PlayerRebateId
     *
     * @return Playerrebatedetails
     */
    public function setPlayerRebateId($PlayerRebateId)
    {
        $this->PlayerRebateId = $PlayerRebateId;

        return $this;
    }

    /**
     * Get PlayerRebateId
     *
     * @return integer
     */
    public function getPlayerRebateId()
    {
        return $this->PlayerRebateId;
    }

    /**
     * Set RebateDetailId
     *
     * @param integer $RebateDetailId
     *
     * @return Playerrebatedetails
     */
    public function setRebateDetailId($RebateDetailId)
    {
        $this->RebateDetailId = $RebateDetailId;

        return $this;
    }

    /**
     * Get RebateDetailId
     *
     * @return integer
     */
    public function getRebateDetailId()
    {
        return $this->RebateDetailId;
    }

    /**
     * Set ProductId
     *
     * @param integer $ProductId
     *
     * @return Playerrebatedetails
     */
    public function setProductId($ProductId)
    {
        $this->ProductId = $ProductId;

        return $this;
    }

    /**
     * Get ProductId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->ProductId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Playerrebatedetails
     */
    public function setRollbaseid($RollbaseId)
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playerrebatedetails
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
     * @return Playerrebatedetails
     */
    public function setModifiedbyid($ModifiedById)
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
     * @return Playerrebatedetails
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
     * @return Playerrebatedetails
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
     * @return Playerrebatedetails
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
     * Set RebateRate
     *
     * @param string $RebateRate
     *
     * @return Playerrebatedetails
     */
    public function setRebateRate($RebateRate)
    {
        $this->RebateRate = $RebateRate;

        return $this;
    }

    /**
     * Get RebateRate
     *
     * @return string
     */
    public function getRebateRate()
    {
        return $this->RebateRate;
    }
}
