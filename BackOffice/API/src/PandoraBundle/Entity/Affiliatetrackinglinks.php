<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Affiliatetrackinglinks
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="AffiliateTrackingLinkCode")
 * @ORM\Table(name="AffiliateTrackingLinks")
 * @ORM\Entity
 */
class Affiliatetrackinglinks extends AbstractEntity
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
     * @Assert\NotBlank()
     * @ORM\Column(name="AffiliateId", type="bigint", nullable=false)
     */
    private $AffiliateId = '0';
    
    /**
     *
     * One Affiliate Tracking Link have one Affiliate
     *
     * @Assert\NotBlank()
     * @ORM\OneToOne(targetEntity="Affiliates")
     * @ORM\JoinColumn(name="AffiliateId", referencedColumnName="Id")
     */
    private $Affiliate;
    
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="LanguageId", type="bigint", nullable=false)
     */
    private $LanguageId = '0';
    
    /**
     *
     * One Affiliate Tracking Link have one Language
     *
     * @Assert\NotBlank()
     * @ORM\OneToOne(targetEntity="Languages")
     * @ORM\JoinColumn(name="LanguageId", referencedColumnName="Id")
     */
    private $Language;
    
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=100, minMessage = "Affiliate Tracking Link Code must be at least {{ limit }} characters long", maxMessage = "Affiliate Tracking Link Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="AffiliateTrackingLinkCode", type="string", length=100, nullable=true)
     */
    private $AffiliateTrackingLinkCode;

    /**
     * @var string
     * 
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=200, minMessage = "Website URL must be at least {{ limit }} characters long", maxMessage = "Website URL cannot be longer than {{ limit }} characters")
     *
     * @ORM\Column(name="WebsiteUrl", type="string", length=200, nullable=true)
     */
    private $WebsiteUrl;

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
     * Set AffiliateId
     *
     * @param integer $AffiliateId
     *
     * @return Affiliatetrackinglinks
     */
    public function setAffiliateId($AffiliateId)
    {
        $this->AffiliateId = $AffiliateId;

        return $this;
    }

    /**
     * Get AffiliateId
     *
     * @return integer
     */
    public function getAffiliateId()
    {
        return $this->AffiliateId;
    }

    /**
     * Set LanguageId
     *
     * @param integer $LanguageId
     *
     * @return Affiliatetrackinglinks
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
     * Set AffiliateTrackingLinkCode
     *
     * @param string $AffiliateTrackingLinkCode
     *
     * @return Affiliatetrackinglinks
     */
    public function setAffiliateTrackingLinkCode($AffiliateTrackingLinkCode)
    {
        $this->AffiliateTrackingLinkCode = $AffiliateTrackingLinkCode;

        return $this;
    }

    /**
     * Get AffiliateTrackingLinkCode
     *
     * @return string
     */
    public function getAffiliateTrackingLinkCode()
    {
        return $this->AffiliateTrackingLinkCode;
    }

    /**
     * Set WebsiteUrl
     *
     * @param string $WebsiteUrl
     *
     * @return Affiliatetrackinglinks
     */
    public function setWebsiteUrl($WebsiteUrl)
    {
        $this->WebsiteUrl = $WebsiteUrl;

        return $this;
    }

    /**
     * Get WebsiteUrl
     *
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->WebsiteUrl;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Affiliatetrackinglinks
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
     * @return Affiliatetrackinglinks
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
     * @return Affiliatetrackinglinks
     */
    public function setDatecreated($DateCreated)
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
     * @return Affiliatetrackinglinks
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
     * @return Affiliatetrackinglinks
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
     * Set Affiliate
     *
     * @param \PandoraBundle\Entity\Affiliates $Affiliate
     *
     * @return Affiliatetrackinglinks
     */
    public function setAffiliate(\PandoraBundle\Entity\Affiliates $Affiliate = null)
    {
        $this->Affiliate = $Affiliate;
        
        return $this;
    }
    
    /**
     * Get Affiliate
     *
     * @return \PandoraBundle\Entity\Affiliates
     */
    public function getAffiliate()
    {
        return $this->Affiliate;
    }
    
    /**
     * Set Language
     *
     * @param \PandoraBundle\Entity\Languages $Language
     *
     * @return Affiliatetrackinglinks
     */
    public function setLanguage(\PandoraBundle\Entity\Languages $Language = null)
    {
        $this->Language = $Language;
        
        return $this;
    }
    
    /**
     * Get Language
     *
     * @return \PandoraBundle\Entity\Languages
     */
    public function getLanguage()
    {
        return $this->Language;
    }
}
