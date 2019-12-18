<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Rebates
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="RebateCode")
 * @ORM\Table(name="Rebates")
 * @UniqueEntity(fields={"RebateCode"}, message="Code already exist")
 * @ORM\Entity
 */
class Rebates extends AbstractEntity
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
     * @ORM\Column(name="RebateCode", type="string", length=100, nullable=true)
     */
    private $RebateCode;

    /**
     * @var string
     *
     * @ORM\Column(name="RebateName", type="string", length=100, nullable=true)
     */
    private $RebateName;

    /**
     * @var integer
     *
     * @ORM\Column(name="ProductId", type="bigint", nullable=false)
     */
    private $ProductId = '0';

 	/**
     *
     * One ProductId has One Gameplatformproducts
     *
     * @ORM\ManyToOne(targetEntity="Gameplatformproducts")
     * @ORM\JoinColumn(name="ProductId", referencedColumnName="Id")
     */
	private $Gameplatformproduct;

    /**
     * @var integer
     *
     * @ORM\Column(name="VipLevelId", type="bigint", nullable=false)
     */
    private $VipLevelId = '0';

    /**
     *
     * Many Rebates to one VIP Level
     *
     * @ORM\ManyToOne(targetEntity="Viplevels")
     * @ORM\JoinColumn(name="VipLevelId", referencedColumnName="Id")
     */
	private $VIPLevel;
	
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
     * @ORM\Column(name="ProductType", type="string", length=10, nullable=true)
     */
    private $ProductType;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="GameType", type="integer", nullable=true)
     */
    private $GameType;
    

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
     * Set GameType
     *
     * @param integer $GameType
     *
     * @return Rebates
     */
    public function setGameType($GameType)
    {
        $this->GameType = $GameType;
        
        return $this;
    }
    
    /**
     * Get GameType
     *
     * @return integer
     */
    public function getGameType()
    {
        return $this->GameType;
    }
    
    /**
     * Set RebateCode
     *
     * @param string $RebateCode
     *
     * @return Rebates
     */
    public function setRebateCode($RebateCode)
    {
        $this->RebateCode = $RebateCode;

        return $this;
    }

    /**
     * Get RebateCode
     *
     * @return string
     */
    public function getRebateCode()
    {
        return $this->RebateCode;
    }

    /**
     * Set RebateName
     *
     * @param string $RebateName
     *
     * @return Rebates
     */
    public function setRebateName($RebateName)
    {
        $this->RebateName = $RebateName;

        return $this;
    }

    /**
     * Get RebateName
     *
     * @return string
     */
    public function getRebateName()
    {
        return $this->RebateName;
    }

    /**
     * Set ProductId
     *
     * @param integer $ProductId
     *
     * @return Rebates
     */
    public function setProductId($ProductId)
    {
        $this->ProductId = $ProductId;

        return $this;
    }

    /**
     * Get ProductId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->ProductId;
    }

    /**
     * Set VipLevelId
     *
     * @param integer $VipLevelId
     *
     * @return Rebates
     */
    public function setVipLevelId($VipLevelId)
    {
        $this->VipLevelId = $VipLevelId;

        return $this;
    }

    /**
     * Get VipLevelId
     *
     * @return integer
     */
    public function getVipLevelId()
    {
        return $this->VipLevelId;
    }
    
    /**
     * Set VIPLevel
     *
     * @param \PandoraBundle\Entity\Viplevels $VIPLevel
     *
     * @return Rebates
     */
    public function setVIPLevel(\PandoraBundle\Entity\Viplevels $VIPLevel = null)
    {
        $this->VIPLevel = $VIPLevel;
        
        return $this;
    }
    
    /**
     * Get VIPLevel
     *
     * @return \AppBundle\Entity\Viplevels
     */
    public function getVIPLevel()
    {
        return $this->VIPLevel;
	}
	
    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Rebates
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
     * @return Rebates
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
     * @return Rebates
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
     * @return Rebates
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
     * @return Rebates
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
     * @return Rebates
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
     * Set ProductType
     *
     * @param string $ProductType
     *
     * @return Rebates
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
     * Set Gameplatformproduct
     *
     * @param \PandoraBundle\Entity\Gameplatformproducts $Gameplatformproduct
     *
     * @return Rebates
     */
	public function setGameplatformproduct(\PandoraBundle\Entity\Gameplatformproducts $Gameplatformproduct = null)
    {
        $this->Gameplatformproduct = $Gameplatformproduct;

        return $this;
    }

    /**
     * Get Gameplatformproduct
     *
     * @return \PandoraBundle\Entity\Gameplatformproducts
     */
    public function getGameplatformproduct()
    {
        return $this->Gameplatformproduct;
    }
}
