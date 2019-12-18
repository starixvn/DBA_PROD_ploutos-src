<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sbtechdebitcredithistory
 *
 * @ORM\Table(name="SBTechDebitCreditHistory")
 * @ORM\Entity
 */
class Sbtechdebitcredithistory
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
     * @ORM\Column(name="OperatorCode", type="string", length=100, nullable=true)
     */
    private $operatorcode;

    /**
     * @var string
     *
     * @ORM\Column(name="CustomerId", type="string", length=100, nullable=true)
     */
    private $customerid;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionType", type="string", length=100, nullable=true)
     */
    private $transactiontype;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $transactiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="RefId", type="string", length=100, nullable=true)
     */
    private $refid;

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
     * Set operatorcode
     *
     * @param string $operatorcode
     *
     * @return Sbtechdebitcredithistory
     */
    public function setOperatorcode($operatorcode)
    {
        $this->operatorcode = $operatorcode;

        return $this;
    }

    /**
     * Get operatorcode
     *
     * @return string
     */
    public function getOperatorcode()
    {
        return $this->operatorcode;
    }

    /**
     * Set customerid
     *
     * @param string $customerid
     *
     * @return Sbtechdebitcredithistory
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return string
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set transactiontype
     *
     * @param string $transactiontype
     *
     * @return Sbtechdebitcredithistory
     */
    public function setTransactiontype($transactiontype)
    {
        $this->transactiontype = $transactiontype;

        return $this;
    }

    /**
     * Get transactiontype
     *
     * @return string
     */
    public function getTransactiontype()
    {
        return $this->transactiontype;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Sbtechdebitcredithistory
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
     * Set transactiondate
     *
     * @param \DateTime $transactiondate
     *
     * @return Sbtechdebitcredithistory
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
     * Set refid
     *
     * @param string $refid
     *
     * @return Sbtechdebitcredithistory
     */
    public function setRefid($refid)
    {
        $this->refid = $refid;

        return $this;
    }

    /**
     * Get refid
     *
     * @return string
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Sbtechdebitcredithistory
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
     * @return Sbtechdebitcredithistory
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
     * @return Sbtechdebitcredithistory
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
     * @return Sbtechdebitcredithistory
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
     * @return Sbtechdebitcredithistory
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
