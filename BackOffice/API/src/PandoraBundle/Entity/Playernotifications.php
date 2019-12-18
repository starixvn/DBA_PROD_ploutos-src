<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Playernotifications
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="NotificationName")
 * @ORM\Table(name="PlayerNotifications")
 * @ORM\Entity
 */
class Playernotifications extends AbstractEntity
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
     * @ORM\Column(name="PlayerRegistrationId", type="bigint", nullable=false)
     */
    private $PlayerRegistrationId = '0';
    
    /**
     *
     * One Player Profile have One Player Registration
     *
     * @ORM\OneToOne(targetEntity="Playerregistrations")
     * @ORM\JoinColumn(name="PlayerRegistrationId", referencedColumnName="Id")
     */
    private $PlayerRegistration;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="NotificationId", type="bigint", nullable=false)
     */
    private $NotificationId = '0';

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="NotificationTypeEnum")
     * @ORM\Column(name="NotificationType", type="integer", nullable=true)
     */
    private $NotificationType = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="NotificationName", type="string", length=100, nullable=true)
     */
    private $NotificationName;

    /**
     * @var string
     *
     * @ORM\Column(name="NotificationDescription", type="string", length=200, nullable=true)
     */
    private $NotificationDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=100, nullable=true)
     */
    private $Title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsAllProducts", type="boolean", nullable=false)
     */
    private $IsAllProducts = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsSports", type="boolean", nullable=false)
     */
    private $IsSports = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsCasino", type="boolean", nullable=false)
     */
    private $IsCasino = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsGames", type="boolean", nullable=false)
     */
    private $IsGames = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsMobile", type="boolean", nullable=false)
     */
    private $IsMobile = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsPromo", type="boolean", nullable=false)
     */
    private $IsPromo = true;

//     /**
//      * @var integer
//      *
//      * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
//      */
//     private $rollbaseid = '0';

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set PlayerRegistrationId
     *
     * @param integer $PlayerRegistrationId
     *
     * @return Playernotifications
     */
    public function setPlayerRegistrationId($PlayerRegistrationId)
    {
        $this->PlayerRegistrationId = $PlayerRegistrationId;

        return $this;
    }

    /**
     * Get PlayerRegistrationId
     *
     * @return integer
     */
    public function getPlayerRegistrationId()
    {
        return $this->PlayerRegistrationId;
    }

    /**
     * Set NotificationId
     *
     * @param integer $NotificationId
     *
     * @return Playernotifications
     */
    public function setNotificationId($NotificationId)
    {
        $this->NotificationId = $NotificationId;

        return $this;
    }

    /**
     * Get NotificationId
     *
     * @return integer
     */
    public function getNotificationId()
    {
        return $this->NotificationId;
    }

    /**
     * Set NotificationType
     *
     * @param integer $NotificationType
     *
     * @return Playernotifications
     */
    public function setNotificationType($NotificationType)
    {
        $this->NotificationType = $NotificationType;

        return $this;
    }

    /**
     * Get NotificationType
     *
     * @return integer
     */
    public function getNotificationType()
    {
        return $this->NotificationType;
    }

    /**
     * Set NotificationName
     *
     * @param string $NotificationName
     *
     * @return Playernotifications
     */
    public function setNotificationName($NotificationName)
    {
        $this->NotificationName = $NotificationName;

        return $this;
    }

    /**
     * Get NotificationName
     *
     * @return string
     */
    public function getNotificationName()
    {
        return $this->NotificationName;
    }

    /**
     * Set NotificationDescription
     *
     * @param string $NotificationDescription
     *
     * @return Playernotifications
     */
    public function setNotificationDescription($NotificationDescription)
    {
        $this->NotificationDescription = $NotificationDescription;

        return $this;
    }

    /**
     * Get NotificationDescription
     *
     * @return string
     */
    public function getNotificationDescription()
    {
        return $this->NotificationDescription;
    }

    /**
     * Set Title
     *
     * @param string $Title
     *
     * @return Playernotifications
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     * Get Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set IsAllProducts
     *
     * @param boolean $IsAllProducts
     *
     * @return Playernotifications
     */
    public function setIsAllProducts($IsAllProducts)
    {
        $this->IsAllProducts = $IsAllProducts;

        return $this;
    }

    /**
     * Get IsAllProducts
     *
     * @return boolean
     */
    public function getIsAllProducts()
    {
        return $this->IsAllProducts;
    }

    /**
     * Set IsSports
     *
     * @param boolean $IsSports
     *
     * @return Playernotifications
     */
    public function setIsSports($IsSports)
    {
        $this->IsSports = $IsSports;

        return $this;
    }

    /**
     * Get IsSports
     *
     * @return boolean
     */
    public function getIsSports()
    {
        return $this->IsSports;
    }

    /**
     * Set IsCasino
     *
     * @param boolean $IsCasino
     *
     * @return Playernotifications
     */
    public function setIsCasino($IsCasino)
    {
        $this->IsCasino = $IsCasino;

        return $this;
    }

    /**
     * Get IsCasino
     *
     * @return boolean
     */
    public function getIsCasino()
    {
        return $this->IsCasino;
    }

    /**
     * Set IsGames
     *
     * @param boolean $IsGames
     *
     * @return Playernotifications
     */
    public function setIsGames($IsGames)
    {
        $this->IsGames = $IsGames;

        return $this;
    }

    /**
     * Get IsGames
     *
     * @return boolean
     */
    public function getIsGames()
    {
        return $this->IsGames;
    }

    /**
     * Set IsMobile
     *
     * @param boolean $IsMobile
     *
     * @return Playernotifications
     */
    public function setIsMobile($IsMobile)
    {
        $this->IsMobile = $IsMobile;

        return $this;
    }

    /**
     * Get IsMobile
     *
     * @return boolean
     */
    public function getIsMobile()
    {
        return $this->IsMobile;
    }

    /**
     * Set IsPromo
     *
     * @param boolean $IsPromo
     *
     * @return Playernotifications
     */
    public function setIsPromo($IsPromo)
    {
        $this->IsPromo = $IsPromo;

        return $this;
    }

    /**
     * Get IsPromo
     *
     * @return boolean
     */
    public function getIsPromo()
    {
        return $this->IsPromo;
    }

//     /**
//      * Set rollbaseid
//      *
//      * @param integer $rollbaseid
//      *
//      * @return Playernotifications
//      */
//     public function setRollbaseid($rollbaseid)
//     {
//         $this->rollbaseid = $rollbaseid;

//         return $this;
//     }

//     /**
//      * Get rollbaseid
//      *
//      * @return integer
//      */
//     public function getRollbaseid()
//     {
//         return $this->rollbaseid;
//     }
    
    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playernotifications
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
     * @return Playernotifications
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
     * @return Playernotifications
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
     * @return Playernotifications
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
     * @return Playernotifications
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
     * Set PlayerRegistration
     *
     * @param \PandoraBundle\Entity\PlayerRegistrations $PlayerRegistration
     *
     * @return Playernotifications
     */
    public function setPlayerRegistration(\PandoraBundle\Entity\PlayerRegistrations $PlayerRegistration = null)
    {
        $this->PlayerRegistration = $PlayerRegistration;
        
        return $this;
    }
    
    /**
     * Get PlayerRegistration
     *
     * @return \PandoraBundle\Entity\PlayerRegistrations
     */
    public function getPlayerRegistration()
    {
        return $this->PlayerRegistration;
    }
}
