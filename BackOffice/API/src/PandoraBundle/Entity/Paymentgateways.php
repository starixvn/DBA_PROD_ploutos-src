<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Paymentgateways
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="PaymentGatewayName")
 * @ORM\Table(name="PaymentGateways", uniqueConstraints={@ORM\UniqueConstraint(name="PaymentGatewayCode", columns={"PaymentGatewayCode"})})
 * @UniqueEntity(fields={"PaymentGatewayCode", "Id"}, message="Code already exist.", repositoryMethod="findUniqueViolation")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\PaymentGatewayRepository")
 */
class Paymentgateways extends AbstractEntity
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
     * @Assert\Length(min=2, max=50, minMessage = "Code must be at least {{ limit }} characters long", maxMessage = "Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PaymentGatewayCode", type="string", length=50, nullable=true)
     */
    private $PaymentGatewayCode;
    
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Name must be at least {{ limit }} characters long", maxMessage = "Name cannot be longer than {{ limit }} characters")
     * @ORM\Column(name="PaymentGatewayName", type="string", length=100, nullable=true)
     */
    private $PaymentGatewayName;
    
    /**
     * @var string
     *
     * @Assert\Length(max=200, maxMessage = "Description cannot be longer than {{ limit }} characters")
     * @ORM\Column(name="PaymentGatewayDesc", type="string", length=200, nullable=true)
     */
    private $PaymentGatewayDesc;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';
    
    /**
     *
     * One Payment Gateway to One Brand
     *
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;
    
    /**
     * @var boolean
     *
     * @Assert\NotNull()
     * @ORM\Column(name="IsActive", type="boolean", nullable=false)
     */
    private $IsActive = false;
    
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
     * Set PaymentGatewayCode
     *
     * @param string $PaymentGatewayCode
     *
     * @return Paymentgateways
     */
    public function setPaymentGatewayCode($PaymentGatewayCode)
    {
        $this->PaymentGatewayCode = $PaymentGatewayCode;
        
        return $this;
    }
    
    /**
     * Get PaymentGatewayCode
     *
     * @return string
     */
    public function getPaymentGatewayCode()
    {
        return $this->PaymentGatewayCode;
    }
    
    /**
     * Set PaymentGatewayName
     *
     * @param string $PaymentGatewayName
     *
     * @return Paymentgateways
     */
    public function setPaymentGatewayName($PaymentGatewayName)
    {
        $this->PaymentGatewayName = $PaymentGatewayName;
        
        return $this;
    }
    
    /**
     * Get PaymentGatewayName
     *
     * @return string
     */
    public function getPaymentGatewayName()
    {
        return $this->PaymentGatewayName;
    }
    
    /**
     * Set PaymentGatewayDesc
     *
     * @param string $PaymentGatewayDesc
     *
     * @return Paymentgateways
     */
    public function setPaymentGatewayDesc($PaymentGatewayDesc)
    {
        $this->PaymentGatewayDesc = $PaymentGatewayDesc;
        
        return $this;
    }
    
    /**
     * Get PaymentGatewayDesc
     *
     * @return string
     */
    public function getPaymentGatewayDesc()
    {
        return $this->PaymentGatewayDesc;
    }
    
    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Paymentgateways
     */
    public function setBrandId($BrandId)
    {
        $this->BrandId = $BrandId;
        
        return $this;
    }
    
    /**
     * Get BrandId
     *
     * @return integer
     */
    public function getBrandId()
    {
        return $this->BrandId;
    }
    
    /**
     * Set IsActive
     *
     * @param boolean $IsActive
     *
     * @return Paymentgateways
     */
    public function setIsActive($IsActive)
    {
        $this->IsActive = $IsActive;
        
        return $this;
    }
    
    /**
     * Get IsActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }
    
    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Paymentgateways
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
     * @return Paymentgateways
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
     * @return Paymentgateways
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
     * @return Paymentgateways
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
     * @return Paymentgateways
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
     * Set Brand
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Paymentgateways
     */
    public function setBrand(\PandoraBundle\Entity\Brands $Brand = null)
    {
        $this->Brand = $Brand;
        
        return $this;
    }
    
    /**
     * Get Brand
     *
     * @return \PandoraBundle\Entity\Brands
     */
    public function getBrand()
    {
        return $this->Brand;
    }
}