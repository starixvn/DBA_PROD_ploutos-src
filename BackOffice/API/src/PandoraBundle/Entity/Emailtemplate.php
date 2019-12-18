<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Emailtemplate
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TemplateName")
 * @ORM\Table(name="EmailTemplate")
 * @UniqueEntity(fields={"TemplateCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Emailtemplate extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Code must be at least {{ limit }} characters long", maxMessage = "Code cannot be longer than {{ limit }} characters")
     * @ORM\Column(name="TemplateCode", type="string", length=100, nullable=true)
     */
    private $TemplateCode;
    
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100, minMessage = "Name must be at least {{ limit }} characters long", maxMessage = "Name cannot be longer than {{ limit }} characters")
     * @ORM\Column(name="TemplateName", type="string", length=100, nullable=true)
     */
    private $TemplateName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Subject", type="string", length=200, nullable=true)
     */
    private $Subject;
    
    /**
     * @var string
     *
     * @ORM\Column(name="MsgBody", type="text", nullable=true)
     */
    private $MsgBody;
    
    /**
     * @var string
     *
     * @ORM\Column(name="FromEmail", type="string", length=200, nullable=true)
     */
    private $FromEmail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="FromName", type="string", length=200, nullable=true)
     */
    private $FromName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=150, nullable=true)
     */
    private $Language;
    
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
     * @var boolean
     *
     * @ORM\Column(name="IsActive", type="boolean", nullable=false)
     */
    private $IsActive = true;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Header", type="text", nullable=true)
     */
    private $Header;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Footer", type="text", nullable=true)
     */
    private $Footer;
    
    /**
     * @var string
     *
     * @ORM\Column(name="JsonBody", type="text", nullable=true)
     */
    private $JsonBody;
    
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
     * Set TemplateCode
     *
     * @param string $TemplateCode
     *
     * @return Emailtemplate
     */
    public function setTemplateCode($TemplateCode)
    {
        $this->TemplateCode = $TemplateCode;
        
        return $this;
    }
    
    /**
     * Get TemplateCode
     *
     * @return string
     */
    public function getTemplateCode()
    {
        return $this->TemplateCode;
    }
    
    /**
     * Set TemplateName
     *
     * @param string $TemplateName
     *
     * @return Emailtemplate
     */
    public function setTemplateName($TemplateName)
    {
        $this->TemplateName = $TemplateName;
        
        return $this;
    }
    
    /**
     * Get TemplateName
     *
     * @return string
     */
    public function getTemplateName()
    {
        return $this->TemplateName;
    }
    
    /**
     * Set Subject
     *
     * @param string $Subject
     *
     * @return Emailtemplate
     */
    public function setSubject($Subject)
    {
        $this->Subject = $Subject;
        
        return $this;
    }
    
    /**
     * Get Subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->Subject;
    }
    
    /**
     * Set MsgBody
     *
     * @param string $MsgBody
     *
     * @return Emailtemplate
     */
    public function setMsgBody($MsgBody)
    {
        $this->MsgBody = $MsgBody;
        
        return $this;
    }
    
    /**
     * Get MsgBody
     *
     * @return string
     */
    public function getMsgBody()
    {
        return $this->MsgBody;
    }
    
    /**
     * Set FromEmail
     *
     * @param string $FromEmail
     *
     * @return Emailtemplate
     */
    public function setFromEmail($FromEmail)
    {
        $this->FromEmail = $FromEmail;
        
        return $this;
    }
    
    /**
     * Get FromEmail
     *
     * @return string
     */
    public function getFromEmail()
    {
        return $this->FromEmail;
    }
    
    /**
     * Set FromName
     *
     * @param string $FromName
     *
     * @return Emailtemplate
     */
    public function setFromName($FromName)
    {
        $this->FromName = $FromName;
        
        return $this;
    }
    
    /**
     * Get FromName
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->FromName;
    }
    
    /**
     * Set Language
     *
     * @param string $Language
     *
     * @return Emailtemplate
     */
    public function setLanguage($Language)
    {
        $this->Language = $Language;
        
        return $this;
    }
    
    /**
     * Get Language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->Language;
    }
    
    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Emailtemplate
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
     * @return Emailtemplate
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
     * @return Emailtemplate
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
     * @return Emailtemplate
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
     * @return Emailtemplate
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
     * Set IsActive
     *
     * @param boolean $IsActive
     *
     * @return Emailtemplate
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
     * Set Header
     *
     * @param string $Header
     *
     * @return Emailtemplate
     */
    public function setHeader($Header)
    {
        $this->Header = $Header;
        
        return $this;
    }
    
    /**
     * Get Header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->Header;
    }
    
    /**
     * Set Footer
     *
     * @param string $Footer
     *
     * @return Emailtemplate
     */
    public function setFooter($Footer)
    {
        $this->Footer = $Footer;
        
        return $this;
    }
    
    /**
     * Get Footer
     *
     * @return string
     */
    public function getFooter()
    {
        return $this->Footer;
    }
    
    
    
    
    
    
    /**
     * Set JsonBody
     *
     * @param string $JsonBody
     *
     * @return Emailtemplate
     */
    public function setJsonBody($JsonBody)
    {
        $this->JsonBody = $JsonBody;
        
        return $this;
    }
    
    /**
     * Get JsonBody
     *
     * @return string
     */
    public function getJsonBody()
    {
        return $this->JsonBody;
    }
}