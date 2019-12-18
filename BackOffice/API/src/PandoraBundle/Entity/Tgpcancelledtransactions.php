<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tgpcancelledtransactions
 *
 * @ORM\Table(name="TgpCancelledTransactions")
 * @ORM\Entity
 */
class Tgpcancelledtransactions
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
     * @ORM\Column(name="UserId", type="string", length=60, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="BrandCode", type="string", length=30, nullable=true)
     */
    private $brandcode;

    /**
     * @var string
     *
     * @ORM\Column(name="RefPTxnId", type="string", length=50, nullable=true)
     */
    private $refptxnid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TxnTimeStamp", type="datetime", nullable=true)
     */
    private $txntimestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="WalletCode", type="string", length=50, nullable=true)
     */
    private $walletcode;

    /**
     * @var string
     *
     * @ORM\Column(name="Desc", type="string", length=300, nullable=true)
     */
    private $desc;

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
     * Set userid
     *
     * @param string $userid
     *
     * @return Tgpcancelledtransactions
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set brandcode
     *
     * @param string $brandcode
     *
     * @return Tgpcancelledtransactions
     */
    public function setBrandcode($brandcode)
    {
        $this->brandcode = $brandcode;

        return $this;
    }

    /**
     * Get brandcode
     *
     * @return string
     */
    public function getBrandcode()
    {
        return $this->brandcode;
    }

    /**
     * Set refptxnid
     *
     * @param string $refptxnid
     *
     * @return Tgpcancelledtransactions
     */
    public function setRefptxnid($refptxnid)
    {
        $this->refptxnid = $refptxnid;

        return $this;
    }

    /**
     * Get refptxnid
     *
     * @return string
     */
    public function getRefptxnid()
    {
        return $this->refptxnid;
    }

    /**
     * Set txntimestamp
     *
     * @param \DateTime $txntimestamp
     *
     * @return Tgpcancelledtransactions
     */
    public function setTxntimestamp($txntimestamp)
    {
        $this->txntimestamp = $txntimestamp;

        return $this;
    }

    /**
     * Get txntimestamp
     *
     * @return \DateTime
     */
    public function getTxntimestamp()
    {
        return $this->txntimestamp;
    }

    /**
     * Set walletcode
     *
     * @param string $walletcode
     *
     * @return Tgpcancelledtransactions
     */
    public function setWalletcode($walletcode)
    {
        $this->walletcode = $walletcode;

        return $this;
    }

    /**
     * Get walletcode
     *
     * @return string
     */
    public function getWalletcode()
    {
        return $this->walletcode;
    }

    /**
     * Set desc
     *
     * @param string $desc
     *
     * @return Tgpcancelledtransactions
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set rollbaseid
     *
     * @param integer $rollbaseid
     *
     * @return Tgpcancelledtransactions
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
     * @return Tgpcancelledtransactions
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
     * @return Tgpcancelledtransactions
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
     * @return Tgpcancelledtransactions
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
     * @return Tgpcancelledtransactions
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
     * @return Tgpcancelledtransactions
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
