<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playerfingerprinthits
 *
 * @ORM\Table(name="PlayerFingerPrintHits")
 * @ORM\Entity
 */
class Playerfingerprinthits
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
     * @ORM\Column(name="UserName", type="string", length=200, nullable=true)
     */
    private $UserName;

    /**
     * @var string
     *
     * @ORM\Column(name="FingerPrint", type="string", length=200, nullable=true)
     */
    private $FingerPrint;

    /**
     * @var integer
     *
     * @ORM\Column(name="FingerPrintId", type="bigint", nullable=false)
     */
    private $FingerPrintId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FingerPrintRBId", type="bigint", nullable=false)
     */
    private $FingerPrintRBId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRegistrationId", type="bigint", nullable=false)
     */
    private $PlayerRegistrationId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRBId", type="bigint", nullable=false)
     */
    private $PlayerRBId = '0';

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
     * Set UserName
     *
     * @param string $UserName
     *
     * @return Playerfingerprinthits
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
     * Set FingerPrint
     *
     * @param string $FingerPrint
     *
     * @return Playerfingerprinthits
     */
    public function setFingerPrint($FingerPrint)
    {
        $this->FingerPrint = $FingerPrint;

        return $this;
    }

    /**
     * Get FingerPrint
     *
     * @return string
     */
    public function getFingerPrint()
    {
        return $this->FingerPrint;
    }

    /**
     * Set FingerPrintId
     *
     * @param integer $FingerPrintId
     *
     * @return Playerfingerprinthits
     */
    public function setFingerPrintId($FingerPrintId)
    {
        $this->FingerPrintId = $FingerPrintId;

        return $this;
    }

    /**
     * Get FingerPrintId
     *
     * @return integer
     */
    public function getFingerPrintId()
    {
        return $this->FingerPrintId;
    }

    /**
     * Set FingerPrintRBId
     *
     * @param integer $FingerPrintRBId
     *
     * @return Playerfingerprinthits
     */
    public function setFingerPrintRBId($FingerPrintRBId)
    {
        $this->FingerPrintRBId = $FingerPrintRBId;

        return $this;
    }

    /**
     * Get FingerPrintRBId
     *
     * @return integer
     */
    public function getFingerPrintRBId()
    {
        return $this->FingerPrintRBId;
    }

    /**
     * Set PlayerRegistrationId
     *
     * @param integer $PlayerRegistrationId
     *
     * @return Playerfingerprinthits
     */
    public function setPlayerRegistrationId($PlayerRegistrationId)
    {
        $this->PlayerRegistrationId = $PlayerRegistrationId;

        return $this;
    }

    /**
     * Get PlayerRegistrationId
     *
     * @return integer
     */
    public function getPlayerRegistrationId()
    {
        return $this->PlayerRegistrationId;
    }

    /**
     * Set PlayerRBId
     *
     * @param integer $PlayerRBId
     *
     * @return Playerfingerprinthits
     */
    public function setPlayerRBId($PlayerRBId)
    {
        $this->PlayerRBId = $PlayerRBId;

        return $this;
    }

    /**
     * Get PlayerRBId
     *
     * @return integer
     */
    public function getPlayerRBId()
    {
        return $this->PlayerRBId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Playerfingerprinthits
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playerfingerprinthits
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
     * @return Playerfingerprinthits
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
     * @return Playerfingerprinthits
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
     * @return Playerfingerprinthits
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
     * @return Playerfingerprinthits
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
