<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Countrys
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="CountryName")
 * @ORM\Table(name="Countrys", uniqueConstraints={@ORM\UniqueConstraint(name="CountryCode", columns={"CountryCode"})})
 * @UniqueEntity(fields={"CountryCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Countrys extends AbstractEntity
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
     * @Assert\Length(min=2, max=50, minMessage = "Country Code must be at least {{ limit }} characters long", maxMessage = "Country Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="CountryCode", type="string", length=50, nullable=true)
     */
    private $CountryCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50, minMessage = "Country Name must be at least {{ limit }} characters long", maxMessage = "Country Name cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="CountryName", type="string", length=50, nullable=true)
     */
    private $CountryName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50, minMessage = "Country Call Code must be at least {{ limit }} characters long", maxMessage = "Country Call Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="CountryCallCode", type="string", length=50, nullable=true)
     */
    private $CountryCallCode;

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
     * Set CountryCode
     *
     * @param string $CountryCode
     *
     * @return Countrys
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
     * Set CountryName
     *
     * @param string $CountryName
     *
     * @return Countrys
     */
    public function setCountryName($CountryName)
    {
        $this->CountryName = $CountryName;

        return $this;
    }

    /**
     * Get CountryName
     *
     * @return string
     */
    public function getCountryName()
    {
        return $this->CountryName;
    }

    /**
     * Set CountryCallCode
     *
     * @param string $CountryCallCode
     *
     * @return Countrys
     */
    public function setCountryCallCode($CountryCallCode)
    {
        $this->CountryCallCode = $CountryCallCode;

        return $this;
    }

    /**
     * Get CountryCallCode
     *
     * @return string
     */
    public function getCountryCallCode()
    {
        return $this->CountryCallCode;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Countrys
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
     * @return Countrys
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
     * @return Countrys
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
     * @return Countrys
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
     * @return Countrys
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
     * @return Countrys
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
}
