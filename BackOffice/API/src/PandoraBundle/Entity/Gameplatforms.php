<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Gameplatforms
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="GamePlatformCode")
 * @ORM\Table(name="GamePlatforms")
 * @UniqueEntity(fields={"GamePlatformCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Gameplatforms extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Game Platform Code must be at least {{ limit }} characters long", maxMessage = "Game Platform Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="GamePlatformCode", type="string", length=100, nullable=true)
     */
    private $GamePlatformCode;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=100, minMessage = "Game Platform Name must be at least {{ limit }} characters long", maxMessage = "Game Platform Name cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="GamePlatformName", type="string", length=100, nullable=true)
     */
    private $GamePlatformName;

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
     * @ORM\Column(name="SequenceNo", type="integer", nullable=true)
     */
    private $SequenceNo;

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
     * One Game Platform to One Currency
     *
     * @ORM\OneToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
	private $Currency;
	
    /**
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="LanguageId", type="bigint", nullable=false)
     */
    private $LanguageId = '0';

    /**
     *
     * One Game Platform to One Language
     *
     * @ORM\OneToOne(targetEntity="Languages")
     * @ORM\JoinColumn(name="LanguageId", referencedColumnName="Id")
     */
	private $Language;
    
	
	/**
	 * @var string
	 *
	 * @Assert\Length(min=2, max=100, minMessage = "Service Provider Code must be at least {{ limit }} characters long", maxMessage = "Service Provider Code cannot be longer than {{ limit }} characters")
	 *
	 * @ORM\Column(name="ServiceProviderCode", type="string", length=100, nullable=true)
	 */
	private $ServiceProviderCode;
	
	
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
     * Set GamePlatformCode
     *
     * @param string $GamePlatformCode
     *
     * @return Gameplatforms
     */
    public function setGamePlatformCode($GamePlatformCode)
    {
        $this->GamePlatformCode = $GamePlatformCode;

        return $this;
    }

    /**
     * Get GamePlatformCode
     *
     * @return string
     */
    public function getGamePlatformCode()
    {
        return $this->GamePlatformCode;
    }
    
    /**
     * Set ServiceProviderCode
     *
     * @param string $ServiceProviderCode
     *
     * @return Gameplatforms
     */
    public function setServiceProviderCode($ServiceProviderCode)
    {
        $this->ServiceProviderCode = $ServiceProviderCode;
        
        return $this;
    }
    
    /**
     * Get ServiceProviderCode
     *
     * @return string
     */
    public function getServiceProviderCode()
    {
        return $this->ServiceProviderCode;
    }
    
    /**
     * Set GamePlatformName
     *
     * @param string $GamePlatformName
     *
     * @return Gameplatforms
     */
    public function setGamePlatformName($GamePlatformName)
    {
        $this->GamePlatformName = $GamePlatformName;

        return $this;
    }

    /**
     * Get GamePlatformName
     *
     * @return string
     */
    public function getGamePlatformName()
    {
        return $this->GamePlatformName;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Gameplatforms
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
     * @return Gameplatforms
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
     * @return Gameplatforms
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
     * @return Gameplatforms
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
     * @return Gameplatforms
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
     * @return Gameplatforms
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
     * @return Gameplatforms
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

//     /**
//      * Set ApiCode
//      *
//      * @param string $ApiCode
//      *
//      * @return Gameplatforms
//      */
//     public function setApiCode($ApiCode)
//     {
//         $this->ApiCode = $ApiCode;

//         return $this;
//     }

//     /**
//      * Get ApiCode
//      *
//      * @return string
//      */
//     public function getApiCode()
//     {
//         return $this->ApiCode;
//     }

    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Gameplatforms
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
     * Set LanguageId
     *
     * @param integer $LanguageId
     *
     * @return Gameplatforms
     */
    public function setLanguageId($LanguageId)
    {
        $this->LanguageId = $LanguageId;

        return $this;
    }

    /**
     * Get LanguageId
     *
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->LanguageId;
	}
	    
    /**
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Gameplatforms
     */
    public function setCurrency(\PandoraBundle\Entity\Currencies $Currency = null)
    {
        $this->Currency = $Currency;
    
        return $this;
    }
    
    /**
     * Get Currency
     *
     * @return \PandoraBundle\Entity\Currencies $Currency
     */
    public function getCurrency()
    {
        return $this->Currency;
	}
	    
    /**
     * Set Language
     *
     * @param \PandoraBundle\Entity\Languages $Language
     *
     * @return Gameplatforms
     */
    public function setLanguage(\PandoraBundle\Entity\Languages $Language = null)
    {
        $this->Language = $Language;
    
        return $this;
    }
    
    /**
     * Get Language
     *
     * @return \PandoraBundle\Entity\Languages $Language
     */
    public function getLanguage()
    {
        return $this->Language;
	}
}
