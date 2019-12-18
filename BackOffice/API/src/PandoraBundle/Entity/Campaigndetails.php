<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campaigndetails
 *
 * @ORM\Table(name="CampaignDetails")
 * @ORM\Entity
 */
class Campaigndetails
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
     * @ORM\Column(name="BonusId", type="bigint", nullable=false)
     */
    private $BonusId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CampaignLevelId", type="bigint", nullable=false)
     */
    private $CampaignLevelId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BonusAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="WageringAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CampaignDetailLevelId", type="bigint", nullable=true)
     */
    private $CampaignDetailLevelId;

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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set BonusId
     *
     * @param integer $BonusId
     *
     * @return Campaigndetails
     */
    public function setBonusId($BonusId)
    {
        $this->BonusId = $BonusId;

        return $this;
    }

    /**
     * Get BonusId
     *
     * @return integer
     */
    public function getBonusId()
    {
        return $this->BonusId;
    }

    /**
     * Set CampaignLevelId
     *
     * @param integer $CampaignLevelId
     *
     * @return Campaigndetails
     */
    public function setCampaignLevelId($CampaignLevelId)
    {
        $this->CampaignLevelId = $CampaignLevelId;

        return $this;
    }

    /**
     * Get CampaignLevelId
     *
     * @return integer
     */
    public function getCampaignLevelId()
    {
        return $this->CampaignLevelId;
    }

    /**
     * Set BonusAmount
     *
     * @param string $BonusAmount
     *
     * @return Campaigndetails
     */
    public function setBonusAmount($BonusAmount)
    {
        $this->BonusAmount = $BonusAmount;

        return $this;
    }

    /**
     * Get BonusAmount
     *
     * @return string
     */
    public function getBonusAmount()
    {
        return $this->BonusAmount;
    }

    /**
     * Set WageringAmount
     *
     * @param string $WageringAmount
     *
     * @return Campaigndetails
     */
    public function setWageringAmount($WageringAmount)
    {
        $this->WageringAmount = $WageringAmount;

        return $this;
    }

    /**
     * Get WageringAmount
     *
     * @return string
     */
    public function getWageringAmount()
    {
        return $this->WageringAmount;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Campaigndetails
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
     * Set CampaignDetailLevelId
     *
     * @param integer $CampaignDetailLevelId
     *
     * @return Campaigndetails
     */
    public function setCampaignDetailLevelId($CampaignDetailLevelId)
    {
        $this->CampaignDetailLevelId = $CampaignDetailLevelId;

        return $this;
    }

    /**
     * Get CampaignDetailLevelId
     *
     * @return integer
     */
    public function getCampaignDetailLevelId()
    {
        return $this->CampaignDetailLevelId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Campaigndetails
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
     * @return Campaigndetails
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
     * @return Campaigndetails
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
     * @return Campaigndetails
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
     * @return Campaigndetails
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
