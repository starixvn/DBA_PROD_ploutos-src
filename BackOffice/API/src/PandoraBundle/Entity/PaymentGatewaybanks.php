<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * PaymentGatewaybanks
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="BankName")
 * @ORM\Table(name="PaymentGatewayBanks")
 * @ORM\Entity
 */
class PaymentGatewaybanks
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
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Bank Abb must be at least {{ limit }} characters long", maxMessage = "Bank Abb cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BankAbb", type="string", length=100, nullable=true)
     */
    private $BankAbb;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Bank Name must be at least {{ limit }} characters long", maxMessage = "Bank Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BankName", type="string", length=100, nullable=true)
     */
    private $BankName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Bank Name En must be at least {{ limit }} characters long", maxMessage = "Bank Name En cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BankNameEn", type="string", length=100, nullable=true)
     */
    private $BankNameEn;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=10, minMessage = "Brand Code must be at least {{ limit }} characters long", maxMessage = "Brand Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BrandCode", type="string", length=10, nullable=true)
     */
    private $BrandCode;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="PaymentGateway", type="integer", nullable=true)
     */
    private $PaymentGateway;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="DepositMode", type="integer", nullable=true)
     */
    private $DepositMode;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

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
     * @ORM\Column(name="BankTransactionType", type="integer", nullable=true)
     */
    private $BankTransactionType = '0';

    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsOnline", type="boolean", nullable=false)
     */
    private $IsOnline = true;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * 
     * @ORM\Column(name="WebSequence", type="integer", nullable=false)
     */
    private $WebSequence = '0';



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
     * @return PaymentGatewaybanks
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
     * Set BankAbb
     *
     * @param string $BankAbb
     *
     * @return PaymentGatewaybanks
     */
    public function setBankAbb($BankAbb)
    {
        $this->BankAbb = $BankAbb;

        return $this;
    }

    /**
     * Get BankAbb
     *
     * @return string
     */
    public function getBankAbb()
    {
        return $this->BankAbb;
    }

    /**
     * Set BankName
     *
     * @param string $BankName
     *
     * @return PaymentGatewaybanks
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
     * Set BankNameEn
     *
     * @param string $BankNameEn
     *
     * @return PaymentGatewaybanks
     */
    public function setBankNameEn($BankNameEn)
    {
        $this->BankNameEn = $BankNameEn;

        return $this;
    }

    /**
     * Get BankNameEn
     *
     * @return string
     */
    public function getBankNameEn()
    {
        return $this->BankNameEn;
    }

    /**
     * Set BrandCode
     *
     * @param string $BrandCode
     *
     * @return PaymentGatewaybanks
     */
    public function setBrandCode($BrandCode)
    {
        $this->BrandCode = $BrandCode;

        return $this;
    }

    /**
     * Get BrandCode
     *
     * @return string
     */
    public function getBrandCode()
    {
        return $this->BrandCode;
    }

    /**
     * Set PaymentGateway
     *
     * @param integer $PaymentGateway
     *
     * @return PaymentGatewaybanks
     */
    public function setPaymentGateway($PaymentGateway)
    {
        $this->PaymentGateway = $PaymentGateway;

        return $this;
    }

    /**
     * Get PaymentGateway
     *
     * @return integer
     */
    public function getPaymentGateway()
    {
        return $this->PaymentGateway;
    }

    /**
     * Set DepositMode
     *
     * @param integer $DepositMode
     *
     * @return PaymentGatewaybanks
     */
    public function setDepositMode($DepositMode)
    {
        $this->DepositMode = $DepositMode;

        return $this;
    }

    /**
     * Get DepositMode
     *
     * @return integer
     */
    public function getDepositMode()
    {
        return $this->DepositMode;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return PaymentGatewaybanks
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return PaymentGatewaybanks
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
     * @return PaymentGatewaybanks
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
     * @return PaymentGatewaybanks
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
     * @return PaymentGatewaybanks
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
     * @return PaymentGatewaybanks
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
     * Set BankTransactionType
     *
     * @param integer $BankTransactionType
     *
     * @return PaymentGatewaybanks
     */
    public function setBankTransactionType($BankTransactionType)
    {
        $this->BankTransactionType = $BankTransactionType;

        return $this;
    }

    /**
     * Get BankTransactionType
     *
     * @return integer
     */
    public function getBankTransactionType()
    {
        return $this->BankTransactionType;
    }

    /**
     * Set IsOnline
     *
     * @param boolean $IsOnline
     *
     * @return PaymentGatewaybanks
     */
    public function setIsOnline($IsOnline)
    {
        $this->IsOnline = $IsOnline;

        return $this;
    }

    /**
     * Get IsOnline
     *
     * @return boolean
     */
    public function getIsOnline()
    {
        return $this->IsOnline;
    }

    /**
     * Set WebSequence
     *
     * @param integer $WebSequence
     *
     * @return PaymentGatewaybanks
     */
    public function setWebSequence($WebSequence)
    {
        $this->WebSequence = $WebSequence;

        return $this;
    }

    /**
     * Get WebSequence
     *
     * @return integer
     */
    public function getWebSequence()
    {
        return $this->WebSequence;
    }
}
