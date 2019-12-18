<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Fraudrisklevels
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="FraudRiskLevelCode")
 * @ORM\Table(name="FraudRiskLevels", uniqueConstraints={@ORM\UniqueConstraint(name="FraudRiskLevelCode", columns={"FraudRiskLevelCode"})})
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\FraudRiskLevelRepository")
 */
class Fraudrisklevels extends AbstractEntity
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
     * @Assert\Length(min=3, max=100, minMessage = "Fraud Risk Level Code must be at least {{ limit }} characters long", maxMessage = "Fraud Risk Level Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="FraudRiskLevelCode", type="string", length=100, nullable=true)
     */
    private $FraudRiskLevelCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Fraud Risk Level Name must be at least {{ limit }} characters long", maxMessage = "Fraud Risk Level Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="FraudRiskLevelName", type="string", length=100, nullable=true)
     */
    private $FraudRiskLevelName;

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
     * One Bank has One Brand
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
     * Set FraudRiskLevelCode
     *
     * @param string $FraudRiskLevelCode
     *
     * @return Fraudrisklevels
     */
    public function setFraudRiskLevelCode($FraudRiskLevelCode)
    {
        $this->FraudRiskLevelCode = $FraudRiskLevelCode;

        return $this;
    }

    /**
     * Get FraudRiskLevelCode
     *
     * @return string
     */
    public function getFraudRiskLevelCode()
    {
        return $this->FraudRiskLevelCode;
    }

    /**
     * Set FraudRiskLevelName
     *
     * @param string $FraudRiskLevelName
     *
     * @return Fraudrisklevels
     */
    public function setFraudRiskLevelName($FraudRiskLevelName)
    {
        $this->FraudRiskLevelName = $FraudRiskLevelName;

        return $this;
    }

    /**
     * Get FraudRiskLevelName
     *
     * @return string
     */
    public function getFraudRiskLevelName()
    {
        return $this->FraudRiskLevelName;
    }

    /**
     * Set IsDefault
     *
     * @param boolean $IsDefault
     *
     * @return Fraudrisklevels
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
     * @return Fraudrisklevels
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
     * @return Fraudrisklevels
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
     * @return Fraudrisklevels
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
     * @return Fraudrisklevels
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
     * @return Fraudrisklevels
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
     * @return Fraudrisklevels
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
     * @return Fraudrisklevels
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
     * @return Banks
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
