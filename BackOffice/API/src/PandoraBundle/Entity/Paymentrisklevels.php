<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Paymentrisklevels
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="PaymentRiskLevelName")
 * @ORM\Table(name="PaymentRiskLevels")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\PaymentRiskLevelRepository")
 */
class Paymentrisklevels extends AbstractEntity
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
     * @Assert\Length(min=3, max=100, minMessage = "Payment Risk Level Code must be at least {{ limit }} characters long", maxMessage = "Payment Risk Level Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PaymentRiskLevelCode", type="string", length=100, nullable=true)
     */
    private $PaymentRiskLevelCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Payment Risk Level Name must be at least {{ limit }} characters long", maxMessage = "Payment Risk Level Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="PaymentRiskLevelName", type="string", length=100, nullable=true)
     */
    private $PaymentRiskLevelName;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsDefault", type="boolean", nullable=false)
     */
    private $IsDefault = true;

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
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';

    /**
     *
     * One Payment Risk Level has One Brand
     * 
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;

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
     * @ORM\Column(name="SequenceNo", type="integer", nullable=false)
     */
    private $SequenceNo = '0';



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
     * Set PaymentRiskLevelCode
     *
     * @param string $PaymentRiskLevelCode
     *
     * @return Paymentrisklevels
     */
    public function setPaymentRiskLevelCode($PaymentRiskLevelCode)
    {
        $this->PaymentRiskLevelCode = $PaymentRiskLevelCode;

        return $this;
    }

    /**
     * Get PaymentRiskLevelCode
     *
     * @return string
     */
    public function getPaymentRiskLevelCode()
    {
        return $this->PaymentRiskLevelCode;
    }

    /**
     * Set PaymentRiskLevelName
     *
     * @param string $PaymentRiskLevelName
     *
     * @return Paymentrisklevels
     */
    public function setPaymentRiskLevelName($PaymentRiskLevelName)
    {
        $this->PaymentRiskLevelName = $PaymentRiskLevelName;

        return $this;
    }

    /**
     * Get PaymentRiskLevelName
     *
     * @return string
     */
    public function getPaymentRiskLevelName()
    {
        return $this->PaymentRiskLevelName;
    }

    /**
     * Set IsDefault
     *
     * @param boolean $IsDefault
     *
     * @return Paymentrisklevels
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Paymentrisklevels
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
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Paymentrisklevels
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Paymentrisklevels
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
     * @return Paymentrisklevels
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
     * @return Paymentrisklevels
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
     * @return Paymentrisklevels
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
     * @return Paymentrisklevels
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
     * Set SequenceNo
     *
     * @param integer $SequenceNo
     *
     * @return Paymentrisklevels
     */
    public function setSequenceNo($SequenceNo)
    {
        $this->SequenceNo = $SequenceNo;

        return $this;
    }

    /**
     * Get SequenceNo
     *
     * @return integer
     */
    public function getSequenceNo()
    {
        return $this->SequenceNo;
    }
    
    /**
     * Set Brand
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Paymentrisklevels
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
