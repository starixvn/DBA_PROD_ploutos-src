<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Brandmarketemailnotificationsetups
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="EmailTemplateCode")
 * @ORM\Table(name="BrandMarketEmailNotificationSetups")
 * @UniqueEntity(fields={"EmailTemplateCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Brandmarketemailnotificationsetups extends AbstractEntity
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
     * @ORM\Column(name="BrandMarketId", type="bigint", nullable=false)
     */
    private $BrandMarketId = '0';
    
    /**
     *
     * One Brandmarketemailnotification have one Brandmarket
     *
     * @ORM\OneToOne(targetEntity="Brandmarkets")
     * @ORM\JoinColumn(name="BrandMarketId", referencedColumnName="Id")
     */
    private $BrandMarket;
    
    /**
     * @var integer
     * 
     * @EnumFieldAnnotation(eNumClass="BrandMarketEmailNotificationTypeEnum")
     * @ORM\Column(name="EmailNotificationType", type="integer", nullable=false)
     */
    private $EmailNotificationType = '0';

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=50, minMessage = "Email Template Code must be at least {{ limit }} characters long", maxMessage = "Email Template Code cannot be longer than {{ limit }} characters")
     *
     * @ORM\Column(name="EmailTemplateCode", type="string", length=50, nullable=false)
     */
    private $EmailTemplateCode = '0';

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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }
    
    /**
     * Set BrandMarketId
     *
     * @param integer $BrandMarketId
     *
     * @return Brandmarketemailnotificationsetups
     */
    public function setBrandMarketId($BrandMarketId)
    {
        $this->BrandMarketId = $BrandMarketId;
        
        return $this;
    }
    
    /**
     * Get BrandMarketId
     *
     * @return integer
     */
    public function getBrandMarketId()
    {
        return $this->BrandMarketId;
    }
    
    /**
     * Set EmailNotificationType
     *
     * @param integer $EmailNotificationType
     *
     * @return Brandmarketemailnotificationsetups
     */
    public function setEmailNotificationType($EmailNotificationType)
    {
        $this->EmailNotificationType = $EmailNotificationType;
        
        return $this;
    }
    
    /**
     * Get EmailNotificationType
     *
     * @return integer
     */
    public function getEmailNotificationType()
    {
        return $this->EmailNotificationType;
    }
    
    /**
     * Set EmailTemplateCode
     *
     * @param string $EmailTemplateCode
     *
     * @return Brandmarketemailnotificationsetups
     */
    public function setEmailTemplateCode($EmailTemplateCode)
    {
        $this->EmailTemplateCode = $EmailTemplateCode;
        
        return $this;
    }
    
    /**
     * Get EmailTemplateCode
     *
     * @return string
     */
    public function getEmailTemplateCode()
    {
        return $this->EmailTemplateCode;
    }
    
    /**
     * Set rollbaseid
     *
     * @param integer $rollbaseid
     *
     * @return Brandmarketemailnotificationsetups
     */
    public function setRollbaseid($rollbaseid)
    {
        $this->rollbaseid = $rollbaseid;
        
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
     * @return Brandmarketemailnotificationsetups
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
     * @return Brandmarketemailnotificationsetups
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
     * @return Brandmarketemailnotificationsetups
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
     * @return Brandmarketemailnotificationsetups
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
     * @return Brandmarketemailnotificationsetups
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
     * Set BrandMarket
     *
     * @param \PandoraBundle\Entity\Brandmarkets $BrandMarket
     *
     * @return Brandmarkets
     */
    public function setBrandMarket(\PandoraBundle\Entity\Brandmarkets $BrandMarket = null)
    {
        $this->BrandMarket = $BrandMarket;
        
        return $this;
    }
    
    /**
     * Get BrandMarket
     *
     * @return \PandoraBundle\Entity\Brandmarkets
     */
    public function getBrandMarket()
    {
        return $this->BrandMarket;
    }
}

