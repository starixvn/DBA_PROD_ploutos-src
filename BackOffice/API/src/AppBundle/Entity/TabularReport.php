<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAccess
 *
 * @ORM\Table(name="tabular_reports")
 * @ORM\Entity
 */
class TabularReport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ReportName", type="string", length=100, nullable=false)
     */
    private $ReportName;

    /**
     * @var string
     *
     * @ORM\Column(name="ReportConfig", type="text", nullable=false)
     */
    private $ReportConfig;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Roles", type="string", length=1000, nullable=true)
     */
    private $Roles;
    
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
     * Set Roles
     *
     * @param string $Roles
     *
     * @return TabularReport
     */
    public function setRoles($Roles)
    {
        $this->Roles = $Roles;
        
        return $this;
    }
    
    /**
     * Get Roles
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->Roles;
    }
    
    /**
     * Set ReportName
     *
     * @param string $ReportName
     *
     * @return TabularReport
     */
    public function setReportName($ReportName)
    {
        $this->ReportName = $ReportName;

        return $this;
    }
    
    /**
     * Get ReportName
     *
     * @return string
     */
    public function getReportName()
    {
        return $this->ReportName;
    }
    
    
    /**
     * Set ReportConfig
     *
     * @param string $ReportConfig
     *
     * @return TabularReport
     */
    public function setReportConfig($ReportConfig)
    {
        $this->ReportConfig = $ReportConfig;

        return $this;
    }

    /**
     * Get ReportConfig
     *
     * @return string
     */
    public function getReportConfig()
    {
        return $this->ReportConfig;
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return TabularReport
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
     * @return TabularReport
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
     * @return TabularReport
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
     * @return TabularReport
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
     * @return TabularReport
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
