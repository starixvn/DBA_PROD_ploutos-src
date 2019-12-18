<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filemanaged
 *
 * @ORM\Table(name="FileManaged")
 * @ORM\Entity
 */
class Filemanaged
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
     * @var integer
     *
     * @ORM\Column(name="SourceObject", type="integer", nullable=true)
     */
    private $SourceObject;

    /**
     * @var integer
     *
     * @ORM\Column(name="SourceObjectId", type="integer", nullable=true)
     */
    private $SourceObjectId;

    /**
     * @var string
     *
     * @ORM\Column(name="FileName", type="string", length=255, nullable=true)
     */
    private $FileName;

    /**
     * @var string
     *
     * @ORM\Column(name="Uri", type="string", length=255, nullable=false)
     */
    private $Uri;

    /**
     * @var string
     *
     * @ORM\Column(name="FileMime", type="string", length=255, nullable=true)
     */
    private $FileMime;

    /**
     * @var integer
     *
     * @ORM\Column(name="FileSize", type="integer", nullable=true)
     */
    private $FileSize;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="JsArrayLoc", type="integer", nullable=true)
     */
    private $JsArrayLoc;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="Status", type="boolean", nullable=false)
     */
    private $Status = true;

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
     * Set SourceObject
     *
     * @param integer $SourceObject
     *
     * @return Filemanaged
     */
    public function setSourceObject($SourceObject)
    {
        $this->SourceObject = $SourceObject;

        return $this;
    }

    /**
     * Get SourceObject
     *
     * @return integer
     */
    public function getSourceObject()
    {
        return $this->SourceObject;
    }

    /**
     * Set SourceObjectId
     *
     * @param integer $SourceObjectId
     *
     * @return Filemanaged
     */
    public function setSourceObjectId($SourceObjectId)
    {
        $this->SourceObjectId = $SourceObjectId;

        return $this;
    }

    /**
     * Get SourceObjectId
     *
     * @return integer
     */
    public function getSourceObjectId()
    {
        return $this->SourceObjectId;
    }

    /**
     * Set FileName
     *
     * @param string $FileName
     *
     * @return Filemanaged
     */
    public function setFileName($FileName)
    {
        $this->FileName = $FileName;

        return $this;
    }

    /**
     * Get FileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->FileName;
    }

    /**
     * Set Uri
     *
     * @param string $Uri
     *
     * @return Filemanaged
     */
    public function setUri($Uri)
    {
        $this->Uri = $Uri;

        return $this;
    }

    /**
     * Get Uri
     *
     * @return string
     */
    public function getUri()
    {
        return $this->Uri;
    }

    /**
     * Set FileMime
     *
     * @param string $FileMime
     *
     * @return Filemanaged
     */
    public function setFileMime($FileMime)
    {
        $this->FileMime = $FileMime;

        return $this;
    }

    /**
     * Get FileMime
     *
     * @return string
     */
    public function getFileMime()
    {
        return $this->FileMime;
    }

    /**
     * Set FileSize
     *
     * @param integer $FileSize
     *
     * @return Filemanaged
     */
    public function setFileSize($FileSize)
    {
        $this->FileSize = $FileSize;

        return $this;
    }

    /**
     * Get FileSize
     *
     * @return integer
     */
    public function getFileSize()
    {
        return $this->FileSize;
    }

    /**
     * Set Status
     *
     * @param boolean $Status
     *
     * @return Filemanaged
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return boolean
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
     * @return Filemanaged
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
     * @return Filemanaged
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
     * @return Filemanaged
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
     * @return Filemanaged
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
     * @return Filemanaged
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
     * Set JsArrayLoc
     *
     * @param boolean $JsArrayLoc
     *
     * @return Filemanaged
     */
    public function setJsArrayLoc($JsArrayLoc)
    {
        $this->JsArrayLoc = $JsArrayLoc;
        
        return $this;
    }
    
    /**
     * Get JsArrayLoc
     *
     * @return boolean
     */
    public function getJsArrayLoc()
    {
        return $this->JsArrayLoc;
    }
}
