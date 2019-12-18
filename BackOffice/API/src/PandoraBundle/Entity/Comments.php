<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comments
 *
 * @ORM\Table(name="Comments")
 * @ORM\Entity
 */
class Comments
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
     * @ORM\Column(name="SourceObject", type="string", length=100, nullable=true)
     */
    private $SourceObject;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(name="SourceObjectId", type="bigint", nullable=false)
     */
    private $SourceObjectId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="SourceObjectName", type="string", length=100, nullable=true)
     */
    private $SourceObjectName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="CommentedBy", type="string", length=100, nullable=true)
     */
    private $CommentedBy;
    
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="Note", type="string", length=2000, nullable=true)
     */
    private $Note;

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
     * Set SourceObject
     *
     * @param string $SourceObject
     *
     * @return Comments
     */
    public function setSourceObject($SourceObject)
    {
        $this->SourceObject = $SourceObject;

        return $this;
    }

    /**
     * Get SourceObject
     *
     * @return string
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
     * @return Comments
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
     * Set SourceObjectName
     *
     * @param string $SourceObjectName
     *
     * @return Comments
     */
    public function setSourceObjectName($SourceObjectName)
    {
        $this->SourceObjectName = $SourceObjectName;

        return $this;
    }

    /**
     * Get SourceObjectName
     *
     * @return string
     */
    public function getSourceObjectName()
    {
        return $this->SourceObjectName;
    }
    
    /**
     * Set CommentedBy
     *
     * @param string $CommentedBy
     *
     * @return Comments
     */
    public function setCommentedBy($CommentedBy)
    {
        $this->CommentedBy = $CommentedBy;
        
        return $this;
    }
    
    /**
     * Get CommentedBy
     *
     * @return string
     */
    public function getCommentedBy()
    {
        return $this->CommentedBy;
    }
    
    /**
     * Set Note
     *
     * @param string $Note
     *
     * @return Comments
     */
    public function setNote($Note)
    {
        $this->Note = $Note;

        return $this;
    }

    /**
     * Get Note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->Note;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Comments
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
     * @return Comments
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
     * @return Comments
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
     * @return Comments
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
     * @return Comments
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
        return $this->activerecord;
    }
}
