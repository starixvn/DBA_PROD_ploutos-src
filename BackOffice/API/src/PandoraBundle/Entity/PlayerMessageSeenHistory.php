<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * PlayerMessageSeenHistory
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="MessageId")
 * @ORM\Table(name="PlayerMessageSeenHistory")
 * @ORM\Entity
 */
class PlayerMessageSeenHistory extends AbstractEntity
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
     * @ORM\Column(name="MessageId", type="bigint", nullable=false)
     */
    private $MessageId = '0';

    /**
     *
     * Many Player Messages has One Message
     *
     * @ORM\ManyToOne(targetEntity="Messages")
     * @ORM\JoinColumn(name="MessageId", referencedColumnName="Id")
     */
    private $Message;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=100, nullable=true)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $UserName;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';

    /**
     *
     * One Player Message have One Player Profile
     *
     * @ORM\ManyToOne(targetEntity="Playerprofiles", inversedBy="PlayerMessageSeenHistory")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfile;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerMessageId", type="bigint", nullable=false)
     */
    private $PlayerMessageId = '0';
    
    /**
     *
     * Many Player Message Seen History have One Player Message
     *
     * @ORM\ManyToOne(targetEntity="PlayerMessages", inversedBy="PlayerMessageSeenHistory")
     * @ORM\JoinColumn(name="PlayerMessageId", referencedColumnName="Id")
     */
    private $PlayerMessage;
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateSeen", type="datetime", nullable=true)
     */
    private $DateSeen;
    
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
     * Set MessageId
     *
     * @param integer $MessageId
     *
     * @return PlayerMessageSeenHistory
     */
    public function setMessageId($MessageId)
    {
        $this->MessageId = $MessageId;

        return $this;
    }

    /**
     * Get MessageId
     *
     * @return integer
     */
    public function getMessageId()
    {
        return $this->MessageId;
    }

    /**
     * Set Message
     *
     * @param \PandoraBundle\Entity\Messages $Message
     *
     * @return PlayerMessages
     */
    public function setMessage(\PandoraBundle\Entity\Messages $Message = null)
    {
        $this->Message = $Message;
        
        return $this;
    }
    
    /**
     * Get Message
     *
     * @return \PandoraBundle\Entity\Messages
     */
    public function getMessage()
    {
        return $this->Message;
    }    
    
    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return PlayerMessageSeenHistory
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set UserName
     *
     * @param string $UserName
     *
     * @return PlayerMessageSeenHistory
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;

        return $this;
    }

    /**
     * Get UserName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return PlayerMessageSeenHistory
     */
    public function setPlayerprofileid($PlayerProfileId)
    {
        $this->PlayerProfileId = $PlayerProfileId;

        return $this;
    }

    /**
     * Get PlayerProfileId
     *
     * @return integer
     */
    public function getPlayerProfileId()
    {
        return $this->PlayerProfileId;
    }

    /**
     * Set PlayerProfiles
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return PlayerMessageSeenHistory
     */
    public function setPlayerProfile(\PandoraBundle\Entity\PlayerProfiles $PlayerProfiles = null)
    {
        $this->PlayerProfile = $PlayerProfiles;
        
        return $this;
    }
    
    /**
     * Get PlayerProfiles
     *
     * @return \PandoraBundle\Entity\PlayerProfiles
     */
    public function getPlayerProfile()
    {
        return $this->PlayerProfile;
    }
    
    /**
     * Set PlayerMessageId
     *
     * @param integer $PlayerMessageId
     *
     * @return PlayerMessageSeenHistory
     */
    public function setPlayerMessageId($PlayerMessageId)
    {
        $this->PlayerMessageId = $PlayerMessageId;
        
        return $this;
    }
    
    /**
     * Get PlayerMessageId
     *
     * @return integer
     */
    public function getPlayerMessageId()
    {
        return $this->PlayerMessageId;
    }
    
    /**
     * Set PlayerMessages
     *
     * @param \PandoraBundle\Entity\PlayerMessages $PlayerMessages
     *
     * @return PlayerMessageSeenHistory
     */
    public function setPlayerMessage(\PandoraBundle\Entity\PlayerMessages $PlayerMessage = null)
    {
        $this->PlayerMessage = $PlayerMessage;
        
        return $this;
    }
    
    /**
     * Get PlayerMessage
     *
     * @return \PandoraBundle\Entity\PlayerMessages
     */
    public function getPlayerMessage()
    {
        return $this->PlayerMessage;
    }
    
    /**
     * Set DateSeen
     *
     * @param \DateTime $DateSeen
     *
     * @return PlayerMessageSeenHistory
     */
    public function setDateSeen($DateSeen)
    {
        $this->DateSeen = $DateSeen;

        return $this;
    }

    /**
     * Get DateSeen
     *
     * @return \DateTime
     */
    public function getDateSeen()
    {
        return $this->DateSeen;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return PlayerMessageSeenHistory
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
     * @return PlayerMessageSeenHistory
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
     * @return PlayerMessageSeenHistory
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
     * @return PlayerMessageSeenHistory
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
     * @return PlayerMessageSeenHistory
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
