<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Notifications
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="NotificationName")
 * @ORM\Table(name="Notifications", uniqueConstraints={@ORM\UniqueConstraint(name="NotificationName", columns={"NotificationName"})})
 * @UniqueEntity(fields={"NotificationName"}, message="Name already exist")
 * @ORM\Entity
 */
class Notifications extends AbstractEntity
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
     * @EnumFieldAnnotation(eNumClass="NotificationTypeEnum")
     * @Assert\NotBlank()
     * @ORM\Column(name="NotificationType", type="integer", nullable=true)
     */
    private $NotificationType = '0';

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100, minMessage = "Notification Name must be at least {{ limit }} characters long", maxMessage = "Notification Name cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="NotificationName", type="string", length=100, nullable=true)
     */
    private $NotificationName;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=200, minMessage = "Notification Description must be at least {{ limit }} characters long", maxMessage = "Notification Description cannot be longer than {{ limit }} characters")
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
     * Set NotificationType
     *
     * @param integer $NotificationType
     *
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Notifications
     */
    public function setRollbaseId($RollbaseId)
    {
        $this->RollbaseId = $RollbaseId;

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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
     * @return Notifications
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
