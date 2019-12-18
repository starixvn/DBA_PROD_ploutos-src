<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Countrypaymentmethods
 *
 * @ORM\Table(name="CountryPaymentMethods")
 * @ORM\Entity
 */
class Countrypaymentmethods
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
     * @ORM\Column(name="CountryId", type="bigint", nullable=false)
     */
    private $CountryId = '0';
    
    /**
     *
     * Many Country Payment Method to One Payment Method
     *
     * @ORM\ManyToOne(targetEntity="Countrys")
     * @ORM\JoinColumn(name="CountryId", referencedColumnName="Id")
     */
    private $Country;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="PaymentMethodId", type="bigint", nullable=false)
     */
    private $PaymentMethodId = '0';
    
    /**
     *
     * Many Bank Accounts Payment Method to One Payment Method
     *
     * @ORM\ManyToOne(targetEntity="Paymentmethods")
     * @ORM\JoinColumn(name="PaymentMethodId", referencedColumnName="Id")
     */
    private $PaymentMethod;
    
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
     * Set CountryId
     *
     * @param integer $CountryId
     *
     * @return Countrypaymentmethods
     */
    public function setCountryId($CountryId)
    {
        $this->CountryId = $CountryId;

        return $this;
    }

    /**
     * Get CountryId
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->CountryId;
    }

    /**
     * Set PaymentMethodId
     *
     * @param integer $PaymentMethodId
     *
     * @return Countrypaymentmethods
     */
    public function setPaymentMethodId($PaymentMethodId)
    {
        $this->PaymentMethodId = $PaymentMethodId;

        return $this;
    }

    /**
     * Get PaymentMethodId
     *
     * @return integer
     */
    public function getPaymentMethodId()
    {
        return $this->PaymentMethodId;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Countrypaymentmethods
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
     * @return Countrypaymentmethods
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
     * @return Countrypaymentmethods
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
     * @return Countrypaymentmethods
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
     * @return Countrypaymentmethods
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
     * Set Paymentmethod
     *
     * @param \PandoraBundle\Entity\Paymentmethods $PaymentMethod
     *
     * @return Countrypaymentmethods
     */
    public function setPaymentMethod(\PandoraBundle\Entity\Paymentmethods $PaymentMethod = null)
    {
        $this->PaymentMethod = $PaymentMethod;
        
        return $this;
    }
    
    /**
     * Get PaymentMethod
     *
     * @return \PandoraBundle\Entity\Paymentmethods
     */
    public function getPaymentMethod()
    {
        return $this->PaymentMethod;
    }
    
    
    /**
     * Set Countrys
     *
     * @param \PandoraBundle\Entity\Countrys $Country
     *
     * @return Countrypaymentmethods
     */
    public function setCountry(\PandoraBundle\Entity\Bankaccounts $Country = null)
    {
        $this->Country = $Country;
        
        return $this;
    }
    
    /**
     * Get Countrys
     *
     * @return \PandoraBundle\Entity\Countrys
     */
    public function getCountry()
    {
        return $this->Country;
    }
}
