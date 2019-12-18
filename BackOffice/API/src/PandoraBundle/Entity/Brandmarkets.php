<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Brandmarkets
 *
 * @ORM\Table(name="BrandMarkets")
 * @UniqueEntity(fields={"BrandId", "CurrencyId"}, errorPath="Brand and Currency", message="Duplicate entry for the same Brand and Currency.")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\BrandMarketRepository")
 */
class Brandmarkets extends AbstractEntity
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
     * @ORM\Column(name="BrandId", type="bigint", nullable=false)
     */
    private $BrandId = '0';
    
    /**
     *
     * One Brandmarket have one Brand
     *
     * @ORM\OneToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="CountryId", type="bigint", nullable=false)
     */
    private $CountryId = '0';
    
    /**
     *
     * One Brandmarket have one Country
     *
     * @ORM\OneToOne(targetEntity="Countrys")
     * @ORM\JoinColumn(name="CountryId", referencedColumnName="Id")
     */
    private $Country;
    
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
     * One Brandmarket have one Currency
     *
     * @ORM\OneToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
    private $Currency;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsDefault", type="boolean", nullable=false)
     */
    private $IsDefault = true;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="IsEnabled", type="boolean", nullable=false)
     */
    private $IsEnabled = true;
    
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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
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
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Brandmarkets
     */
    public function setBrandId($BrandId)
    {
        $this->BrandId = $BrandId;
        
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
     * Set CountryId
     *
     * @param integer $CountryId
     *
     * @return Brandmarkets
     */
    public function setCountryId($CountryId)
    {
        $this->CountryId = $CountryId;
        
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
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Brandmarkets
     */
    public function setCurrencyId($CurrencyId)
    {
        $this->CurrencyId = $CurrencyId;
        
        return $this;
    }
    
    /**
     * Get IsEnabled
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        return $this->IsEnabled;
    }
    
    /**
     * Set IsEnabled
     *
     * @param boolean $IsEnabled
     *
     * @return Brandmarkets
     */
    public function setIsEnabled($IsEnabled)
    {
        $this->IsEnabled = $IsEnabled;
        
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
     * Set IsDefault
     *
     * @param boolean $IsDefault
     *
     * @return Brandmarkets
     */
    public function setIsDefault($IsDefault)
    {
        $this->IsDefault = $IsDefault;
        
        return $this;
    }
    
    
    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Brandmarkets
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
     * @return Brandmarkets
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
     * @return Brandmarkets
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
     * @return Brandmarkets
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
     * @return Brandmarkets
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
     * @return Brandmarkets
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
     * @return Brandmarkets
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
    
    /**
     * Set Country
     *
     * @param \PandoraBundle\Entity\Countrys $Country
     *
     * @return Brandmarkets
     */
    public function setCountry(\PandoraBundle\Entity\Countrys $Country = null)
    {
        $this->Country = $Country;
        
        return $this;
    }
    
    /**
     * Get Country
     *
     * @return \PandoraBundle\Entity\Countrys
     */
    public function getCountry()
    {
        return $this->Country;
    }
    
    /**
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Brandmarkets
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
    
}
