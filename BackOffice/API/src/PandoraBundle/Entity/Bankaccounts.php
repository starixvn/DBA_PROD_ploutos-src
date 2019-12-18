<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Bankaccounts
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="BankName")
 * @ORM\Table(name="BankAccounts", uniqueConstraints={@ORM\UniqueConstraint(name="AccountNo", columns={"AccountNo"})})
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\BankAccountRepository")
 */
class Bankaccounts extends AbstractEntity
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
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Bank Code must be at least {{ limit }} characters long", maxMessage = "Bank Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BankCode", type="string", length=100, nullable=true)
     */
    private $BankCode;

    /**
     * @var string
     *
     * @ORM\Column(name="BankName", type="string", length=100, nullable=true)
     */
    private $BankName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Account Name must be at least {{ limit }} characters long", maxMessage = "Account Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="AccountName", type="string", length=100, nullable=true)
     */
    private $AccountName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Account No must be at least {{ limit }} characters long", maxMessage = "Account No cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="AccountNo", type="string", length=100, nullable=true)
     */
    private $AccountNo;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="AccountType", type="integer", nullable=true)
     */
    private $AccountType;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="BankId", type="bigint", nullable=false)
     */
    private $BankId = '0';
    
    /**
     *
     * Many Bank Accounts to One Bank
     *
     * @ORM\ManyToOne(targetEntity="Banks")
     * @ORM\JoinColumn(name="BankId", referencedColumnName="Id")
     */
    private $Bank;
    
    /**
     * @var boolean
    * 
     * @ORM\Column(name="IsDefault", type="boolean", nullable=false)
     */
    private $IsDefault = false;

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
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $CurrencyId = '0';
    
    /**
     *
     * Many Bank Accounts to One Currency
     *
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
    private $Currency;
    
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Internet Banking Url must be at least {{ limit }} characters long", maxMessage = "Internet Banking Url cannot be longer than {{ limit }} characters")
     * 
	 * 
     * @ORM\Column(name="InternetBankingUrl", type="string", length=100, nullable=true)
     */
    private $InternetBankingUrl;
    
    /**
     * @var decimal
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="BalanceCeiling", type="decimal", length=100, nullable=true)
     */
    private $BalanceCeiling;
    
    /**
     * Many Bank Accounts have Many Payment Methods.
     * @ORM\ManyToMany(targetEntity="Paymentmethods")
     * @ORM\JoinTable(name="BankAccountPaymentMethods",
     *      joinColumns={@ORM\JoinColumn(name="BankAccountId", referencedColumnName="Id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="PaymentMethodId", referencedColumnName="Id")}
     * )
     */
    private $BankAccountPaymentMethod;    


    public function __construct()
    {
        $this->BankAccountPaymentMethod = new ArrayCollection();
    }

    public function getBankAccountPaymentMethod()
    {
        return $this->BankAccountPaymentMethod;
    }
    
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
     * Set BankCode
     *
     * @param string $BankCode
     *
     * @return Bankaccounts
     */
    public function setBankCode($BankCode)
    {
        $this->BankCode = $BankCode;

        return $this;
    }

    /**
     * Get BankCode
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->BankCode;
    }

    /**
     * Set BankName
     *
     * @param string $BankName
     *
     * @return Bankaccounts
     */
    public function setBankName($BankName)
    {
        $this->BankName = $BankName;

        return $this;
    }

    /**
     * Get BankName
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->BankName;
    }

    /**
     * Set AccountName
     *
     * @param string $AccountName
     *
     * @return Bankaccounts
     */
    public function setAccountName($AccountName)
    {
        $this->AccountName = $AccountName;

        return $this;
    }

    /**
     * Get AccountName
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->AccountName;
    }

    /**
     * Set AccountNo
     *
     * @param string $AccountNo
     *
     * @return Bankaccounts
     */
    public function setAccountNo($AccountNo)
    {
        $this->AccountNo = $AccountNo;

        return $this;
    }

    /**
     * Get AccountNo
     *
     * @return string
     */
    public function getAccountNo()
    {
        return $this->AccountNo;
    }

    /**
     * Set AccountType
     *
     * @param string $AccountType
     *
     * @return Bankaccounts
     */
    public function setAccountType($AccountType)
    {
        $this->AccountType = $AccountType;

        return $this;
    }

    /**
     * Get AccountType
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->AccountType;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Bankaccounts
     */
    public function setRollbaseId($RollbaseId)
    {
        $this->RollbaseId = $RollbaseId;

        return $this;
    }

    /**
     * Get RollbaseId
     *
     * @return integer
     */
    public function getRollbaseId()
    {
        return $this->RollbaseId;
    }

    /**
     * Set BankId
     *
     * @param integer $BankId
     *
     * @return Bankaccounts
     */
    public function setBankId($BankId)
    {
        $this->BankId = $BankId;

        return $this;
    }

    /**
     * Get BankId
     *
     * @return integer
     */
    public function getBankId()
    {
        return $this->BankId;
    }

    /**
     * Set IsDefault
     *
     * @param boolean $IsDefault
     *
     * @return Bankaccounts
     */
    public function setIsDefault($IsDefault)
    {
        $this->IsDefault = $IsDefault;

        return $this;
    }

    /**
     * Get IsDefault
     *
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->IsDefault;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Bankaccounts
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
     * @return Bankaccounts
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
     * @return Bankaccounts
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
     * @return Bankaccounts
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
     * @return Bankaccounts
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
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Bankaccounts
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
     * Set InternetBankingUrl
     *
     * @param string $InternetBankingUrl
     *
     * @return Bankaccounts
     */
    public function setInternetBankingUrl($InternetBankingUrl)
    {
        $this->InternetBankingUrl = $InternetBankingUrl;

        return $this;
    }

    /**
     * Get InternetBankingUrl
     *
     * @return string
     */
    public function getInternetBankingUrl()
    {
        return $this->InternetBankingUrl;
    }
    /**
     * Set BalanceCeiling
     *
     * @param decimal $BalanceCeiling
     *
     * @return Bankaccounts
     */
    public function setBalanceCeiling($BalanceCeiling)
    {
        $this->BalanceCeiling = $BalanceCeiling;

        return $this;
    }

    /**
     * Get BalanceCeiling
     *
     * @return string
     */
    public function getBalanceCeiling()
    {
        return $this->BalanceCeiling;
    }
    
    /**
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Bankaccounts
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
     * Set Bank
     *
     * @param \PandoraBundle\Entity\Banks $Bank
     *
     * @return Bankaccounts
     */
    public function setBank(\PandoraBundle\Entity\Banks $Bank = null)
    {
        $this->Bank = $Bank;
        
        return $this;
    }
    
    /**
     * Get Bank
     *
     * @return \PandoraBundle\Entity\Banks
     */
    public function getBank()
    {
        return $this->Bank;
    }
}
