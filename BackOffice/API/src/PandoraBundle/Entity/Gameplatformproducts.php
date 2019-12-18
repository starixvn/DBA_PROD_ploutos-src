<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Gameplatformproducts
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="GamePlatformProductCode")
 * @ORM\Table(name="GamePlatformProducts")
 * @ORM\Entity
 */
class Gameplatformproducts extends AbstractEntity
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
     * @Assert\Length(min=2, max=100, minMessage = "Game Platform Product Code must be at least {{ limit }} characters long", maxMessage = "Game Platform Product Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="GamePlatformProductCode", type="string", length=100, nullable=true)
     */
    private $GamePlatformProductCode;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=100, minMessage = "Game Platform Product Name must be at least {{ limit }} characters long", maxMessage = "Game Platform Product Name cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="GamePlatformProductName", type="string", length=100, nullable=true)
     */
    private $GamePlatformProductName;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
	 * 
     * @ORM\Column(name="GamePlatformId", type="bigint", nullable=false)
     */
    private $GamePlatformId = '0';

    /**
     *
     * One Game Platform Product to One Game Platform
     *
     * @ORM\OneToOne(targetEntity="Gameplatforms")
     * @ORM\JoinColumn(name="GamePlatformId", referencedColumnName="Id")
     */
	private $GamePlatform;

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
     * @var string
     *
     * @ORM\Column(name="GameType", type="string", length=10, nullable=true)
     */
    private $GameType;

    /**
     * @var string
     *
     * @ORM\Column(name="Base64Image", type="text", nullable=true)
     */
    private $Base64Image;

    /**
     * @var integer
     *
     * @ORM\Column(name="SequenceNo", type="integer", nullable=true)
     */
    private $SequenceNo;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=100, minMessage = "Game Log Code must be at least {{ limit }} characters long", maxMessage = "Game Log Code cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="GameLogCode", type="string", length=100, nullable=true)
     */
    private $GameLogCode;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=50, minMessage = "Version must be at least {{ limit }} characters long", maxMessage = "Version cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="Version", type="string", length=50, nullable=true)
     */
    private $Version;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=500, minMessage = "Image Url must be at least {{ limit }} characters long", maxMessage = "Image Url cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="ImageUrl", type="string", length=500, nullable=true)
     */
    private $ImageUrl;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=200, minMessage = "Image File Name must be at least {{ limit }} characters long", maxMessage = "Image File Name cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="ImageFileName", type="string", length=200, nullable=true)
     */
    private $ImageFileName;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=20, minMessage = "Game Type 1 must be at least {{ limit }} characters long", maxMessage = "Game Type 1 cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="Game_Type_1", type="string", length=20, nullable=true)
     */
    private $GameType1;

    /**
     * @var string
     *
     * @Assert\Length(min=2, max=100, minMessage = "Launch Game Name must be at least {{ limit }} characters long", maxMessage = "Launch Game Name cannot be longer than {{ limit }} characters")
	 * 
     * @ORM\Column(name="LaunchGameName", type="string", length=100, nullable=true)
     */
    private $LaunchGameName;

    /**
     * @var integer
     * 
     * @ORM\Column(name="RebateId", type="bigint", nullable=false)
     */
    private $RebateId = '0';

    /**
     * @var string
     * 
     * @ORM\Column(name="ProductType", type="string", length=10, nullable=true)
     */
    private $ProductType;


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
     * Set GamePlatformProductCode
     *
     * @param string $GamePlatformProductCode
     *
     * @return Gameplatformproducts
     */
    public function setGamePlatformProductCode($GamePlatformProductCode)
    {
        $this->GamePlatformProductCode = $GamePlatformProductCode;

        return $this;
    }

    /**
     * Get GamePlatformProductCode
     *
     * @return string
     */
    public function getGamePlatformProductCode()
    {
        return $this->GamePlatformProductCode;
    }

    /**
     * Set GamePlatformProductName
     *
     * @param string $GamePlatformProductName
     *
     * @return Gameplatformproducts
     */
    public function setGamePlatformProductName($GamePlatformProductName)
    {
        $this->GamePlatformProductName = $GamePlatformProductName;

        return $this;
    }

    /**
     * Get GamePlatformProductName
     *
     * @return string
     */
    public function getGamePlatformProductName()
    {
        return $this->GamePlatformProductName;
    }

    /**
     * Set GamePlatformId
     *
     * @param integer $GamePlatformId
     *
     * @return Gameplatformproducts
     */
    public function setGamePlatformId($GamePlatformId)
    {
        $this->GamePlatformId = $GamePlatformId;

        return $this;
    }

    /**
     * Get GamePlatformId
     *
     * @return integer
     */
    public function getGamePlatformId()
    {
        return $this->GamePlatformId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Gameplatformproducts
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
     * @return Gameplatformproducts
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
     * @return Gameplatformproducts
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
     * @return Gameplatformproducts
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
     * @return Gameplatformproducts
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
     * @return Gameplatformproducts
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
     * Set GameType
     *
     * @param string $GameType
     *
     * @return Gameplatformproducts
     */
    public function setGameType($GameType)
    {
        $this->GameType = $GameType;

        return $this;
    }

    /**
     * Get GameType
     *
     * @return string
     */
    public function getGameType()
    {
        return $this->GameType;
    }

    /**
     * Set Base64Image
     *
     * @param string $Base64Image
     *
     * @return Gameplatformproducts
     */
    public function setBase64Image($Base64Image)
    {
        $this->Base64Image = $Base64Image;

        return $this;
    }

    /**
     * Get Base64Image
     *
     * @return string
     */
    public function getBase64Image()
    {
        return $this->Base64Image;
    }

    /**
     * Set SequenceNo
     *
     * @param integer $SequenceNo
     *
     * @return Gameplatformproducts
     */
    public function setSequenceNo($SequenceNo)
    {
        $this->SequenceNo = $SequenceNo;

        return $this;
    }

    /**
     * Get SequenceNo
     *
     * @return integer
     */
    public function getSequenceNo()
    {
        return $this->SequenceNo;
    }

    /**
     * Set GameLogCode
     *
     * @param string $GameLogCode
     *
     * @return Gameplatformproducts
     */
    public function setGameLogCode($GameLogCode)
    {
        $this->GameLogCode = $GameLogCode;

        return $this;
    }

    /**
     * Get GameLogCode
     *
     * @return string
     */
    public function getGameLogCode()
    {
        return $this->GameLogCode;
    }

    /**
     * Set Version
     *
     * @param string $Version
     *
     * @return Gameplatformproducts
     */
    public function setVersion($Version)
    {
        $this->Version = $Version;

        return $this;
    }

    /**
     * Get Version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->Version;
    }

    /**
     * Set ImageUrl
     *
     * @param string $ImageUrl
     *
     * @return Gameplatformproducts
     */
    public function setImageUrl($ImageUrl)
    {
        $this->ImageUrl = $ImageUrl;

        return $this;
    }

    /**
     * Get ImageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->ImageUrl;
    }

    /**
     * Set ImageFileName
     *
     * @param string $ImageFileName
     *
     * @return Gameplatformproducts
     */
    public function setImageFileName($ImageFileName)
    {
        $this->ImageFileName = $ImageFileName;

        return $this;
    }

    /**
     * Get ImageFileName
     *
     * @return string
     */
    public function getImageFileName()
    {
        return $this->ImageFileName;
    }

    /**
     * Set GameType1
     *
     * @param string $GameType1
     *
     * @return Gameplatformproducts
     */
    public function setGameType1($GameType1)
    {
        $this->GameType1 = $GameType1;

        return $this;
    }

    /**
     * Get GameType1
     *
     * @return string
     */
    public function getGameType1()
    {
        return $this->GameType1;
    }

    /**
     * Set LaunchGameName
     *
     * @param string $LaunchGameName
     *
     * @return Gameplatformproducts
     */
    public function setLaunchGameName($LaunchGameName)
    {
        $this->LaunchGameName = $LaunchGameName;

        return $this;
    }

    /**
     * Get LaunchGameName
     *
     * @return string
     */
    public function getLaunchGameName()
    {
        return $this->LaunchGameName;
    }

    /**
     * Set RebateId
     *
     * @param integer $RebateId
     *
     * @return Gameplatformproducts
     */
    public function setRebateId($RebateId)
    {
        $this->RebateId = $RebateId;

        return $this;
    }

    /**
     * Get RebateId
     *
     * @return integer
     */
    public function getRebateId()
    {
        return $this->RebateId;
    }

    /**
     * Set ProductType
     *
     * @param string $ProductType
     *
     * @return Gameplatformproducts
     */
    public function setProductType($ProductType)
    {
        $this->ProductType = $ProductType;

        return $this;
    }

    /**
     * Get ProductType
     *
     * @return string
     */
    public function getProductType()
    {
        return $this->ProductType;
	}	
	 
    /**
     * Set GamePlatform
     *
     * @param \PandoraBundle\Entity\Gameplatforms $GamePlatform
     *
     * @return Gameplatformproducts
     */
    public function setGamePlatform(\PandoraBundle\Entity\Gameplatforms $GamePlatform = null)
    {
        $this->GamePlatform = $GamePlatform;
    
        return $this;
    }
    
    /**
     * Get GamePlatform
     *
     * @return \PandoraBundle\Entity\Gameplatforms $GamePlatform
     */
    public function getGamePlatform()
    {
        return $this->GamePlatform;
	}
	    
}
