<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bankaccountpaymentmethods
 *
 * @ORM\Table(name="BankAccountPaymentMethods")
 * @ORM\Entity
 */
class Bankaccountpaymentmethods
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
     * @ORM\Column(name="BankAccountId", type="bigint", nullable=false)
     */
    private $BankAccountId = '0';
    
    /**
     *
     * Many Bank Accounts Payment Method to One Payment Method
     *
     * @ORM\ManyToOne(targetEntity="Bankaccounts")
     * @ORM\JoinColumn(name="BankAccountId", referencedColumnName="Id")
     */
    private $BankAccount;
    
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
     * Set BankAccountId
     *
     * @param integer $BankAccountId
     *
     * @return Bankaccountpaymentmethods
     */
    public function setBankAccountId($BankAccountId)
    {
        $this->BankAccountId = $BankAccountId;

        return $this;
    }

    /**
     * Get BankAccountId
     *
     * @return integer
     */
    public function getBankAccountId()
    {
        return $this->BankAccountId;
    }

    /**
     * Set PaymentMethodId
     *
     * @param integer $PaymentMethodId
     *
     * @return Bankaccountpaymentmethods
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
     * @return Bankaccountpaymentmethods
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
     * @return Bankaccountpaymentmethods
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
     * @return Bankaccountpaymentmethods
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
     * @return Bankaccountpaymentmethods
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
     * @return Bankaccountpaymentmethods
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
     * @return Bankaccountpaymentmethods
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
     * Set Bankaccounts
     *
     * @param \PandoraBundle\Entity\Bankaccounts $BankAccount
     *
     * @return Bankaccountpaymentmethods
     */
    public function setBankAccount(\PandoraBundle\Entity\Bankaccounts $BankAccount = null)
    {
        $this->BankAccount = $BankAccount;
        
        return $this;
    }
    
    /**
     * Get Bankaccounts
     *
     * @return \PandoraBundle\Entity\Bankaccounts
     */
    public function getBankAccount()
    {
        return $this->BankAccount;
    }
}
