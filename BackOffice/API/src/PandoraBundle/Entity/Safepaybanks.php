<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Safepaybanks
 *
 * @ORM\Table(name="SafePayBanks", uniqueConstraints={@ORM\UniqueConstraint(name="BankCode", columns={"BankCode"})})
 * @ORM\Entity
 */
class Safepaybanks
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
     * @var string
     *
     * @ORM\Column(name="BankCode", type="string", length=100, nullable=true)
     */
    private $bankcode;

    /**
     * @var string
     *
     * @ORM\Column(name="BankName", type="string", length=100, nullable=true)
     */
    private $bankname;

    /**
     * @var string
     *
     * @ORM\Column(name="BankNameEN", type="string", length=100, nullable=true)
     */
    private $banknameen;

    /**
     * @var integer
     *
     * @ORM\Column(name="DepositMode", type="integer", nullable=true)
     */
    private $depositmode;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $rollbaseid = '0';

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
     * Set bankcode
     *
     * @param string $bankcode
     *
     * @return Safepaybanks
     */
    public function setBankcode($bankcode)
    {
        $this->bankcode = $bankcode;

        return $this;
    }

    /**
     * Get bankcode
     *
     * @return string
     */
    public function getBankcode()
    {
        return $this->bankcode;
    }

    /**
     * Set bankname
     *
     * @param string $bankname
     *
     * @return Safepaybanks
     */
    public function setBankname($bankname)
    {
        $this->bankname = $bankname;

        return $this;
    }

    /**
     * Get bankname
     *
     * @return string
     */
    public function getBankname()
    {
        return $this->bankname;
    }

    /**
     * Set banknameen
     *
     * @param string $banknameen
     *
     * @return Safepaybanks
     */
    public function setBanknameen($banknameen)
    {
        $this->banknameen = $banknameen;

        return $this;
    }

    /**
     * Get banknameen
     *
     * @return string
     */
    public function getBanknameen()
    {
        return $this->banknameen;
    }

    /**
     * Set depositmode
     *
     * @param integer $depositmode
     *
     * @return Safepaybanks
     */
    public function setDepositmode($depositmode)
    {
        $this->depositmode = $depositmode;

        return $this;
    }

    /**
     * Get depositmode
     *
     * @return integer
     */
    public function getDepositmode()
    {
        return $this->depositmode;
    }

    /**
     * Set rollbaseid
     *
     * @param integer $rollbaseid
     *
     * @return Safepaybanks
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
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Safepaybanks
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
     * @return Safepaybanks
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
     * @return Safepaybanks
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
     * @return Safepaybanks
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
     * @return Safepaybanks
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
