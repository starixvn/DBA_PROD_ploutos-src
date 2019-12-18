<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playerrebatequeue
 *
 * @ORM\Table(name="PlayerRebateQueue")
 * @ORM\Entity
 */
class Playerrebatequeue
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
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $playerprofileid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $currencyid = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsComputed", type="boolean", nullable=false)
     */
    private $iscomputed = true;

    /**
     * @var string
     *
     * @ORM\Column(name="UserAccountNo", type="string", length=100, nullable=true)
     */
    private $useraccountno;

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
     * Set playerprofileid
     *
     * @param integer $playerprofileid
     *
     * @return Playerrebatequeue
     */
    public function setPlayerprofileid($playerprofileid)
    {
        $this->playerprofileid = $playerprofileid;

        return $this;
    }

    /**
     * Get playerprofileid
     *
     * @return integer
     */
    public function getPlayerprofileid()
    {
        return $this->playerprofileid;
    }

    /**
     * Set currencyid
     *
     * @param integer $currencyid
     *
     * @return Playerrebatequeue
     */
    public function setCurrencyid($currencyid)
    {
        $this->currencyid = $currencyid;

        return $this;
    }

    /**
     * Get currencyid
     *
     * @return integer
     */
    public function getCurrencyid()
    {
        return $this->currencyid;
    }

    /**
     * Set iscomputed
     *
     * @param boolean $iscomputed
     *
     * @return Playerrebatequeue
     */
    public function setIscomputed($iscomputed)
    {
        $this->iscomputed = $iscomputed;

        return $this;
    }

    /**
     * Get iscomputed
     *
     * @return boolean
     */
    public function getIscomputed()
    {
        return $this->iscomputed;
    }

    /**
     * Set useraccountno
     *
     * @param string $useraccountno
     *
     * @return Playerrebatequeue
     */
    public function setUseraccountno($useraccountno)
    {
        $this->useraccountno = $useraccountno;

        return $this;
    }

    /**
     * Get useraccountno
     *
     * @return string
     */
    public function getUseraccountno()
    {
        return $this->useraccountno;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Playerrebatequeue
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
     * @return Playerrebatequeue
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
     * @return Playerrebatequeue
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
     * @return Playerrebatequeue
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
     * @return Playerrebatequeue
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
