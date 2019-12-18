<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Onlinebanksupportedcurrencies
 *
 * @ORM\Table(name="OnlineBankSupportedCurrencies")
 * @ORM\Entity
 */
class Onlinebanksupportedcurrencies extends AbstractEntity
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
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="OnlineBankId", type="bigint", nullable=true)
     */
    private $OnlineBankId;
    
    /**
     *
     * Many Online Bank Account Supported Currency to Online Bank
     *
     * @ORM\ManyToOne(targetEntity="Onlinebanks")
     * @ORM\JoinColumn(name="OnlineBankId", referencedColumnName="Id")
     */
    private $OnlineBank;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=true)
     */
    private $CurrencyId;
    
    /**
     *
     * Many Online Bank Account Supported Currency to One Currency
     *
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
    private $Currency;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="Active", type="boolean", nullable=false)
     */
    private $Active = true;
    
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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }
    
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
     * Set OnlineBankId
     *
     * @param integer $OnlineBankId
     *
     * @return Onlinebanksupportedcurrencies
     */
    public function setOnlineBankId($OnlineBankId)
    {
        $this->OnlineBankId = $OnlineBankId;

        return $this;
    }

    /**
     * Get OnlineBankId
     *
     * @return integer
     */
    public function getOnlineBankId()
    {
        return $this->OnlineBankId;
    }

    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Onlinebanksupportedcurrencies
     */
    public function setCurrencyId($CurrencyId)
    {
        $this->CurrencyId = $CurrencyId;

        return $this;
    }

    /**
     * Get CurrencyId
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->CurrencyId;
    }

    /**
     * Set Active
     *
     * @param boolean $Active
     *
     * @return Onlinebanksupportedcurrencies
     */
    public function setActive($Active)
    {
        $this->Active = $Active;

        return $this;
    }

    /**
     * Get Active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->Active;
    }

    
    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * @return Onlinebanktypes
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
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Onlinebanktypes
     */
    public function setCurrency(\PandoraBundle\Entity\Currencies $Currency = null)
    {
        $this->Currency = $Currency;
        
        return $this;
    }
    
    /**
     * Get Currency
     *
     * @return \PandoraBundle\Entity\Currencies
     */
    public function getCurrency()
    {
        return $this->Currency;
    }
    
    /**
     * Set OnlineBank
     *
     * @param \PandoraBundle\Entity\Onlinebanks $OnlineBank
     *
     * @return Onlinebanktypes
     */
    public function setOnlineBank(\PandoraBundle\Entity\Onlinebanks $OnlineBank = null)
    {
        $this->OnlineBank = $OnlineBank;
        
        return $this;
    }
    
    /**
     * Get OnlineBank
     *
     * @return \PandoraBundle\Entity\Onlinebanks
     */
    public function getOnlineBank()
    {
        return $this->OnlineBank;
    }
}
