<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Stateprovinces
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="StateProvinceName")
 * @ORM\Table(name="StateProvinces")
 * @UniqueEntity(fields={"StateProvinceName", "CountryId"}, errorPath="StateProvinceName", message="State Province already exist in the same country.")
 * @ORM\Entity
 */
class Stateprovinces extends AbstractEntity
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
     * @ORM\Column(name="StateProvinceCode", type="string", length=100, nullable=true)
     */
    private $StateProvinceCode;

    /**
     * @var string
     *
     * @ORM\Column(name="StateProvinceName", type="string", length=100, nullable=true)
     */
    private $StateProvinceName;

    /**
     * @var string
     *
     * @ORM\Column(name="CountryCode", type="string", length=100, nullable=true)
     */
    private $CountryCode;

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
     * @ORM\Column(name="CountryId", type="bigint", nullable=false)
     */
    private $CountryId = '0';

    /**
     *
     * One State Province to One Country
     *
     * @ORM\OneToOne(targetEntity="Countrys")
     * @ORM\JoinColumn(name="CountryId", referencedColumnName="Id")
     */
	private $Country;

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
     * Set StateProvinceCode
     *
     * @param string $StateProvinceCode
     *
     * @return Stateprovinces
     */
    public function setStateProvinceCode($StateProvinceCode)
    {
        $this->StateProvinceCode = $StateProvinceCode;

        return $this;
    }

    /**
     * Get StateProvinceCode
     *
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->StateProvinceCode;
    }

    /**
     * Set StateProvinceName
     *
     * @param string $StateProvinceName
     *
     * @return Stateprovinces
     */
    public function setStateProvinceName($StateProvinceName)
    {
        $this->StateProvinceName = $StateProvinceName;

        return $this;
    }

    /**
     * Get StateProvinceName
     *
     * @return string
     */
    public function getStateProvinceName()
    {
        return $this->StateProvinceName;
    }

    /**
     * Set CountryCode
     *
     * @param string $CountryCode
     *
     * @return Stateprovinces
     */
    public function setCountryCode($CountryCode)
    {
        $this->CountryCode = $CountryCode;

        return $this;
    }

    /**
     * Get CountryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Stateprovinces
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
     * Set CountryId
     *
     * @param integer $CountryId
     *
     * @return Stateprovinces
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Stateprovinces
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
     * @return Stateprovinces
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
     * @return Stateprovinces
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
     * @return Stateprovinces
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
     * @return Stateprovinces
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
     * Set Country
     *
     * @param \PandoraBundle\Entity\Countrys $Country
     *
     * @return Stateprovinces
     */
    public function setCountry(\PandoraBundle\Entity\Countrys $Country = null)
    {
        $this->Country = $Country;
    
        return $this;
    }
    
    /**
     * Get Country
     *
     * @return \PandoraBundle\Entity\Countrys $Country
     */
    public function getCountry()
    {
        return $this->Country;
	}
}
