<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * PlayerMessages
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="MessageId")
 * @ORM\Table(name="PlayerMessages")
 * @ORM\Entity
 */
class PlayerMessages extends AbstractEntity
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
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';

    /**
     *
     * One Player Message have One Player Profile
     *
     * @ORM\ManyToOne(targetEntity="Playerprofiles", inversedBy="PlayerMessages")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfile;

    /**
     * @var string
     *
     * @ORM\Column(name="UserAccountNo", type="string", length=100, nullable=true)
     */
    private $UserAccountNo;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerMessageNumber", type="string", length=100, nullable=true)
     */
    private $PlayerMessageNumber;
    
    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $UserName;
 
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
    
//     /**
//      *
//      * Many Player Messages has One Player Message Seen History
//      *
//      * @ORM\ManyToOne(targetEntity="PlayerMessageSeenHistory")
//      * @ORM\JoinColumn(name="MessageId", referencedColumnName="MessageId")
//      */
//     private $PlayerMessageSeenHistory;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateSeen", type="datetime", nullable=true)
     */
    private $DateSeen;

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
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return PlayerMessages
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
     * @return PlayerMessages
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
     * Set UserAccountNo
     *
     * @param string $UserAccountNo
     *
     * @return PlayerMessages
     */
    public function setUserAccountNo($UserAccountNo)
    {
        $this->UserAccountNo = $UserAccountNo;

        return $this;
    }

    /**
     * Get UserAccountNo
     *
     * @return string
     */
    public function getUserAccountNo()
    {
        return $this->UserAccountNo;
    }

    /**
     * Set PlayerMessageNumber
     *
     * @param string $PlayerMessageNumber
     *
     * @return PlayerMessages
     */
    public function setPlayerMessageNumber($PlayerMessageNumber)
    {
        $this->PlayerMessageNumber = $PlayerMessageNumber;

        return $this;
    }

    /**
     * Get PlayerMessageNumber
     *
     * @return string
     */
    public function getPlayerMessageNumber()
    {
        return $this->PlayerMessageNumber;
    }

    /**
     * Set UserName
     *
     * @param string $UserName
     *
     * @return PlayerMessages
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
     * Set MessageId
     *
     * @param integer $MessageId
     *
     * @return PlayerMessages
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
    
//     /**
//      * Set PlayerMessageSeenHistory
//      *
//      * @param \PandoraBundle\Entity\PlayerMessageSeenHistory $PlayerMessageSeenHistory
//      *
//      * @return PlayerMessages
//      */
//     public function setPlayerMessageSeenHistory(\PandoraBundle\Entity\PlayerMessageSeenHistory $PlayerMessageSeenHistory = null)
//     {
//         $this->PlayerMessageSeenHistory = $PlayerMessageSeenHistory;
        
//         return $this;
//     }
    
//     /**
//      * Get PlayerMessageSeenHistory
//      *
//      * @return \PandoraBundle\Entity\PlayerMessageSeenHistory
//      */
//     public function getPlayerMessageSeenHistory()
//     {
//         return $this->PlayerMessageSeenHistory;
//     }

    /**
     * Set DateSeen
     *
     * @param \DateTime $DateSeen
     *
     * @return PlayerMessages
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
     * Set Status
     *
     * @param integer $Status
     *
     * @return PlayerMessages
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
     * @return PlayerMessages
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
     * @return PlayerMessages
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
     * @return PlayerMessages
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
     * @return PlayerMessages
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
     * @return PlayerMessages
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
