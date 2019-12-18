<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Triggerrollbaseprocess
 *
 * @ORM\Table(name="TriggerRollbaseProcess")
 * @ORM\Entity
 */
class Triggerrollbaseprocess
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
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $rollbaseid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RBUserId", type="bigint", nullable=false)
     */
    private $rbuserid = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingProcess", type="boolean", nullable=false)
     */
    private $isbeingprocess = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="TriggerType", type="integer", nullable=true)
     */
    private $triggertype;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsInvalidData", type="boolean", nullable=false)
     */
    private $isinvaliddata = true;

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=100, nullable=true)
     */
    private $remarks = '0';

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
     * Set rollbaseid
     *
     * @param integer $rollbaseid
     *
     * @return Triggerrollbaseprocess
     */
    public function setRollbaseid($rollbaseid)
    {
        $this->rollbaseid = $rollbaseid;

        return $this;
    }

    /**
     * Get rollbaseid
     *
     * @return integer
     */
    public function getRollbaseid()
    {
        return $this->rollbaseid;
    }

    /**
     * Set rbuserid
     *
     * @param integer $rbuserid
     *
     * @return Triggerrollbaseprocess
     */
    public function setRbuserid($rbuserid)
    {
        $this->rbuserid = $rbuserid;

        return $this;
    }

    /**
     * Get rbuserid
     *
     * @return integer
     */
    public function getRbuserid()
    {
        return $this->rbuserid;
    }

    /**
     * Set isbeingprocess
     *
     * @param boolean $isbeingprocess
     *
     * @return Triggerrollbaseprocess
     */
    public function setIsbeingprocess($isbeingprocess)
    {
        $this->isbeingprocess = $isbeingprocess;

        return $this;
    }

    /**
     * Get isbeingprocess
     *
     * @return boolean
     */
    public function getIsbeingprocess()
    {
        return $this->isbeingprocess;
    }

    /**
     * Set triggertype
     *
     * @param integer $triggertype
     *
     * @return Triggerrollbaseprocess
     */
    public function setTriggertype($triggertype)
    {
        $this->triggertype = $triggertype;

        return $this;
    }

    /**
     * Get triggertype
     *
     * @return integer
     */
    public function getTriggertype()
    {
        return $this->triggertype;
    }

    /**
     * Set isinvaliddata
     *
     * @param boolean $isinvaliddata
     *
     * @return Triggerrollbaseprocess
     */
    public function setIsinvaliddata($isinvaliddata)
    {
        $this->isinvaliddata = $isinvaliddata;

        return $this;
    }

    /**
     * Get isinvaliddata
     *
     * @return boolean
     */
    public function getIsinvaliddata()
    {
        return $this->isinvaliddata;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     *
     * @return Triggerrollbaseprocess
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Triggerrollbaseprocess
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
     * @return Triggerrollbaseprocess
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
     * @return Triggerrollbaseprocess
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
     * @return Triggerrollbaseprocess
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
     * @return Triggerrollbaseprocess
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
