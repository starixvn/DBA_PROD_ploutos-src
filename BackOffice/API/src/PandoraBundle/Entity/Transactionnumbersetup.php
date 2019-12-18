<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transactionnumbersetup
 *
 * @ORM\Table(name="TransactionNumberSetup")
 * @ORM\Entity
 */
class Transactionnumbersetup
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
     * @ORM\Column(name="TransactionType", type="string", length=100, nullable=true)
     */
    private $transactiontype;

    /**
     * @var string
     *
     * @ORM\Column(name="ResetType", type="string", length=100, nullable=true)
     */
    private $resettype;

    /**
     * @var string
     *
     * @ORM\Column(name="Prefix", type="string", length=100, nullable=true)
     */
    private $prefix;

    /**
     * @var string
     *
     * @ORM\Column(name="series", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $series;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastResetDate", type="datetime", nullable=true)
     */
    private $lastresetdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="PaddingSize", type="integer", nullable=true)
     */
    private $paddingsize;

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
     * Set transactiontype
     *
     * @param string $transactiontype
     *
     * @return Transactionnumbersetup
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
     * Set resettype
     *
     * @param string $resettype
     *
     * @return Transactionnumbersetup
     */
    public function setResettype($resettype)
    {
        $this->resettype = $resettype;

        return $this;
    }

    /**
     * Get resettype
     *
     * @return string
     */
    public function getResettype()
    {
        return $this->resettype;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     *
     * @return Transactionnumbersetup
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set series
     *
     * @param string $series
     *
     * @return Transactionnumbersetup
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set lastresetdate
     *
     * @param \DateTime $lastresetdate
     *
     * @return Transactionnumbersetup
     */
    public function setLastresetdate($lastresetdate)
    {
        $this->lastresetdate = $lastresetdate;

        return $this;
    }

    /**
     * Get lastresetdate
     *
     * @return \DateTime
     */
    public function getLastresetdate()
    {
        return $this->lastresetdate;
    }

    /**
     * Set paddingsize
     *
     * @param integer $paddingsize
     *
     * @return Transactionnumbersetup
     */
    public function setPaddingsize($paddingsize)
    {
        $this->paddingsize = $paddingsize;

        return $this;
    }

    /**
     * Get paddingsize
     *
     * @return integer
     */
    public function getPaddingsize()
    {
        return $this->paddingsize;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Transactionnumbersetup
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
     * @return Transactionnumbersetup
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
     * @return Transactionnumbersetup
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
     * @return Transactionnumbersetup
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
     * @return Transactionnumbersetup
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
