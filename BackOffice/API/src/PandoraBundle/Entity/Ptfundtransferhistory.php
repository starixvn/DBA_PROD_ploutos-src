<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ptfundtransferhistory
 *
 * @ORM\Table(name="PTFundTransferHistory")
 * @ORM\Entity
 */
class Ptfundtransferhistory
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
     * @ORM\Column(name="MemberCode", type="string", length=100, nullable=true)
     */
    private $membercode;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionId", type="string", length=100, nullable=true)
     */
    private $transactionid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $transactiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="FundTransferType", type="string", length=100, nullable=true)
     */
    private $fundtransfertype;

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
     * @var string
     *
     * @ORM\Column(name="PTTransactionId", type="string", length=100, nullable=true)
     */
    private $pttransactionid;



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
     * Set membercode
     *
     * @param string $membercode
     *
     * @return Ptfundtransferhistory
     */
    public function setMembercode($membercode)
    {
        $this->membercode = $membercode;

        return $this;
    }

    /**
     * Get membercode
     *
     * @return string
     */
    public function getMembercode()
    {
        return $this->membercode;
    }

    /**
     * Set transactionid
     *
     * @param string $transactionid
     *
     * @return Ptfundtransferhistory
     */
    public function setTransactionid($transactionid)
    {
        $this->transactionid = $transactionid;

        return $this;
    }

    /**
     * Get transactionid
     *
     * @return string
     */
    public function getTransactionid()
    {
        return $this->transactionid;
    }

    /**
     * Set transactiondate
     *
     * @param \DateTime $transactiondate
     *
     * @return Ptfundtransferhistory
     */
    public function setTransactiondate($transactiondate)
    {
        $this->transactiondate = $transactiondate;

        return $this;
    }

    /**
     * Get transactiondate
     *
     * @return \DateTime
     */
    public function getTransactiondate()
    {
        return $this->transactiondate;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Ptfundtransferhistory
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set fundtransfertype
     *
     * @param string $fundtransfertype
     *
     * @return Ptfundtransferhistory
     */
    public function setFundtransfertype($fundtransfertype)
    {
        $this->fundtransfertype = $fundtransfertype;

        return $this;
    }

    /**
     * Get fundtransfertype
     *
     * @return string
     */
    public function getFundtransfertype()
    {
        return $this->fundtransfertype;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Ptfundtransferhistory
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
     * @return Ptfundtransferhistory
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
     * @return Ptfundtransferhistory
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
     * @return Ptfundtransferhistory
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
     * @return Ptfundtransferhistory
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

    /**
     * Set pttransactionid
     *
     * @param string $pttransactionid
     *
     * @return Ptfundtransferhistory
     */
    public function setPttransactionid($pttransactionid)
    {
        $this->pttransactionid = $pttransactionid;

        return $this;
    }

    /**
     * Get pttransactionid
     *
     * @return string
     */
    public function getPttransactionid()
    {
        return $this->pttransactionid;
    }
}
