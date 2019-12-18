<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Messages
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="MessageNumber")
 * @ORM\Table(name="Messages")
 * @ORM\Entity
 */
class Messages extends AbstractEntity
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
     * @ORM\Column(name="MessageNumber", type="string", length=100, nullable=true)
     */
    private $MessageNumber;

    /**
     * @var boolean
     *
     * @ORM\Column(name="SentToAll", type="boolean", nullable=false)
     */
    private $SentToAll = true;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="BrandId", type="bigint", nullable=true)
     */
    private $BrandId = '0';

    /**
     *
     * Many Messages has One Brand
     *
     * @ORM\ManyToOne(targetEntity="Brands")
     * @ORM\JoinColumn(name="BrandId", referencedColumnName="Id")
     */
    private $Brand;

    /**
     * @var integer
     *
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=true)
     */
    private $CurrencyId = '0';

    /**
     *
     * Many Messages has One Currency
     *
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
    private $Currency;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="MessageType", type="integer", nullable=false)
     */
    private $MessageType = '0';
        
    /**
     * @var boolean
     *
     * @ORM\Column(name="IsFromPlayer", type="boolean", nullable=false)
     */
    private $IsFromPlayer = true;

    /**
     * @var string
     *
     * @ORM\Column(name="MessageContent", type="text", length=65535, nullable=true)
     */
    private $MessageContent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SendDate", type="datetime", nullable=true)
     */
    private $SendDate;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="PlayerMessagesStatusTypeEnum")
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $Status = '0';

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
     * Set MessageNumber
     *
     * @param string $MessageNumber
     *
     * @return Messages
     */
    public function setMessageNumber($MessageNumber)
    {
        $this->MessageNumber = $MessageNumber;

        return $this;
    }

    /**
     * Get MessageNumber
     *
     * @return string
     */
    public function getMessageNumber()
    {
        return $this->MessageNumber;
    }


    /**
     * Set SentToAll
     *
     * @param boolean $SentToAll
     *
     * @return Messages
     */
    public function setSentToAll($SentToAll)
    {
        $this->SentToAll = $SentToAll;

        return $this;
    }

    /**
     * Get SentToAll
     *
     * @return boolean
     */
    public function getSentToAll()
    {
        return $this->SentToAll;
    }

    /**
     * Set BrandId
     *
     * @param integer $BrandId
     *
     * @return Messages
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
     * Set Brand
     *
     * @param \PandoraBundle\Entity\Brands $Brand
     *
     * @return Messages
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
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Messages
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
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Messages
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
     * Set MessageType
     *
     * @param string $MessageType
     *
     * @return Messages
     */
    public function setMessageType($MessageType)
    {
        $this->MessageType = $MessageType;

        return $this;
    }

    /**
     * Get MessageType
     *
     * @return string
     */
    public function getMessageType()
    {
        return $this->MessageType;
    }

    /**
     * Set IsFromPlayer
     *
     * @param string $IsFromPlayer
     *
     * @return Messages
     */
    public function setIsFromPlayer($IsFromPlayer)
    {
        $this->IsFromPlayer = $IsFromPlayer;

        return $this;
    }

    /**
     * Get IsFromPlayer
     *
     * @return string
     */
    public function getIsFromPlayer()
    {
        return $this->IsFromPlayer;
    }

    /**
     * Set MessageContent
     *
     * @param string $MessageContent
     *
     * @return Messages
     */
    public function setMessageContent($MessageContent)
    {
        $this->MessageContent = $MessageContent;

        return $this;
    }

    /**
     * Get MessageContent
     *
     * @return string
     */
    public function getMessageContent()
    {
        return $this->MessageContent;
    }
    
    /**
     * Set SendDate
     *
     * @param string $SendDate
     *
     * @return Messages
     */
    public function setSendDate($SendDate)
    {
        $this->SendDate = $SendDate;

        return $this;
    }

    /**
     * Get SendDate
     *
     * @return string
     */
    public function getSendDate()
    {
        return $this->SendDate;
    }
    
    /**
     * Set Status
     *
     * @param integer $Status
     *
     * @return Messages
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Messages
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
     * @return Messages
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
     * @return Messages
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
     * @return Messages
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
     * @return Messages
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
