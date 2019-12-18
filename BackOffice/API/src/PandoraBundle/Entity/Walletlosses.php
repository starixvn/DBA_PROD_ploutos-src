<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Walletlosses
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNo")
 * @ORM\Table(name="WalletLosses")
 * @ORM\Entity
 */
class Walletlosses extends AbstractEntity
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
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $TransactionNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';
    
    /**
     *
     * Many Wallet Losses have One Player Profile
     *
     * @ORM\ManyToOne(targetEntity="Playerprofiles")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfile;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="WalletId", type="bigint", nullable=false)
     */
    private $WalletId = '0';
    
    /**
     *
     * Many Wallet losses have Wallets
     *
     * @ORM\ManyToOne(targetEntity="Wallets")
     * @ORM\JoinColumn(name="WalletId", referencedColumnName="Id")
     */
    private $Wallet;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $TransactionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="BetAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $BetAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="LossAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $LossAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=500, nullable=true)
     */
    private $Remarks;

    /**
     * @var string
     *
     * @ORM\Column(name="GameId", type="string", length=100, nullable=true)
     */
    private $GameId;

    /**
     * @var string
     *
     * @ORM\Column(name="ProducId", type="string", length=100, nullable=true)
     */
    private $ProducId;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="GamePlatformId", type="bigint", nullable=false)
     */
    private $GamePlatformId = '0';
    
    /**
     *
     * One Wallet losses have One Game Platform
     *
     * @ORM\OneToOne(targetEntity="Gameplatforms", inversedBy="Playerbets")
     * @ORM\JoinColumn(name="GamePlatformId", referencedColumnName="Id")
     */
    private $GamePlatform;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="GamePlatformProductId", type="bigint", nullable=false)
     */
    private $GamePlatformProductId = '0';
    
    /**
     *
     * One Wallet Losses have One Game Platform Product
     *
     * @ORM\OneToOne(targetEntity="Gameplatformproducts", inversedBy="Playerbets")
     * @ORM\JoinColumn(name="GamePlatformProductId", referencedColumnName="Id")
     */
    private $GamePlatformProduct;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingPushed", type="boolean", nullable=false)
     */
    private $IsBeingPushed = true;

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
     * @ORM\Column(name="GameDescription", type="string", length=500, nullable=true)
     */
    private $GameDescription;



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
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Walletlosses
     */
    public function setTransactionNo($TransactionNo)
    {
        $this->TransactionNo = $TransactionNo;

        return $this;
    }

    /**
     * Get TransactionNo
     *
     * @return string
     */
    public function getTransactionNo()
    {
        return $this->TransactionNo;
    }

    /**
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return Walletlosses
     */
    public function setPlayerProfileId($PlayerProfileId)
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
     * Set WalletId
     *
     * @param integer $WalletId
     *
     * @return Walletlosses
     */
    public function setWalletId($WalletId)
    {
        $this->WalletId = $WalletId;

        return $this;
    }

    /**
     * Get WalletId
     *
     * @return integer
     */
    public function getWalletId()
    {
        return $this->WalletId;
    }

    /**
     * Set TransactionDate
     *
     * @param \DateTime $TransactionDate
     *
     * @return Walletlosses
     */
    public function setTransactionDate($TransactionDate)
    {
        $this->TransactionDate = $TransactionDate;

        return $this;
    }

    /**
     * Get TransactionDate
     *
     * @return \DateTime
     */
    public function getTransactionDate()
    {
        return $this->TransactionDate;
    }

    /**
     * Set BetAmount
     *
     * @param string $BetAmount
     *
     * @return Walletlosses
     */
    public function setBetAmount($BetAmount)
    {
        $this->BetAmount = $BetAmount;

        return $this;
    }

    /**
     * Get BetAmount
     *
     * @return string
     */
    public function getBetAmount()
    {
        return $this->BetAmount;
    }

    /**
     * Set LossAmount
     *
     * @param string $LossAmount
     *
     * @return Walletlosses
     */
    public function setLossAmount($LossAmount)
    {
        $this->LossAmount = $LossAmount;

        return $this;
    }

    /**
     * Get LossAmount
     *
     * @return string
     */
    public function getLossAmount()
    {
        return $this->LossAmount;
    }

    /**
     * Set Remarks
     *
     * @param string $Remarks
     *
     * @return Walletlosses
     */
    public function setRemarks($Remarks)
    {
        $this->Remarks = $Remarks;

        return $this;
    }

    /**
     * Get Remarks
     *
     * @return string
     */
    public function getRemarks()
    {
        return $this->Remarks;
    }

    /**
     * Set GameId
     *
     * @param string $GameId
     *
     * @return Walletlosses
     */
    public function setGameId($GameId)
    {
        $this->GameId = $GameId;

        return $this;
    }

    /**
     * Get GameId
     *
     * @return string
     */
    public function getGameId()
    {
        return $this->GameId;
    }

    /**
     * Set ProducId
     *
     * @param string $ProducId
     *
     * @return Walletlosses
     */
    public function setProducId($ProducId)
    {
        $this->ProducId = $ProducId;

        return $this;
    }

    /**
     * Get ProducId
     *
     * @return string
     */
    public function getProducId()
    {
        return $this->ProducId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Walletlosses
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
     * Set GamePlatformId
     *
     * @param integer $GamePlatformId
     *
     * @return Walletlosses
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
     * Set GamePlatformProductId
     *
     * @param integer $GamePlatformProductId
     *
     * @return Walletlosses
     */
    public function setGamePlatformProductId($GamePlatformProductId)
    {
        $this->GamePlatformProductId = $GamePlatformProductId;

        return $this;
    }

    /**
     * Get GamePlatformProductId
     *
     * @return integer
     */
    public function getGamePlatformProductId()
    {
        return $this->GamePlatformProductId;
    }

    /**
     * Set IsBeingPushed
     *
     * @param boolean $IsBeingPushed
     *
     * @return Walletlosses
     */
    public function setIsBeingPushed($IsBeingPushed)
    {
        $this->IsBeingPushed = $IsBeingPushed;

        return $this;
    }

    /**
     * Get IsBeingPushed
     *
     * @return boolean
     */
    public function getIsBeingPushed()
    {
        return $this->IsBeingPushed;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Walletlosses
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
     * @return Walletlosses
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
     * @return Walletlosses
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
     * @return Walletlosses
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
     * @return Walletlosses
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
     * Set GameDescription
     *
     * @param string $GameDescription
     *
     * @return Walletlosses
     */
    public function setGameDescription($GameDescription)
    {
        $this->GameDescription = $GameDescription;

        return $this;
    }

    /**
     * Get GameDescription
     *
     * @return string
     */
    public function getGameDescription()
    {
        return $this->GameDescription;
    }
    
    /**
     * Set PlayerProfile
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Walletlosses
     */
    public function setPlayerProfile(\PandoraBundle\Entity\PlayerProfiles $PlayerProfile = null)
    {
        $this->PlayerProfile = $PlayerProfile;
        
        return $this;
    }
    
    /**
     * Get PlayerProfile
     *
     * @return \PandoraBundle\Entity\PlayerProfiles
     */
    public function getPlayerProfile()
    {
        return $this->PlayerProfile;
    }
    
    /**
     * Set Wallet
     *
     * @param \PandoraBundle\Entity\Wallets $Wallet
     *
     * @return Walletlosses
     */
    public function setWallet(\PandoraBundle\Entity\Wallets $Wallet = null)
    {
        $this->Wallet = $Wallet;
        
        return $this;
    }
    
    /**
     * Get Wallet
     *
     * @return \PandoraBundle\Entity\Wallets
     */
    public function getWallet()
    {
        return $this->Wallet;
    }
    
    /**
     * Set GamePlatform
     *
     * @param \PandoraBundle\Entity\Gameplatforms $GamePlatform
     *
     * @return Walletlosses
     */
    public function setGamePlatform(\PandoraBundle\Entity\Gameplatforms $GamePlatform = null)
    {
        $this->GamePlatform = $GamePlatform;
        
        return $this;
    }
    
    /**
     * Get GamePlatform
     *
     * @return \PandoraBundle\Entity\Gameplatforms
     */
    public function getGamePlatform()
    {
        return $this->GamePlatform;
    }
    
    /**
     * Set GamePlatformProduct
     *
     * @param \PandoraBundle\Entity\Gameplatformproducts $GamePlatformProduct
     *
     * @return Walletlosses
     */
    public function setGamePlatformProduct(\PandoraBundle\Entity\Gameplatformproducts $GamePlatformProduct = null)
    {
        $this->GamePlatformProduct = $GamePlatformProduct;
        
        return $this;
    }
    
    /**
     * Get GamePlatformProduct
     *
     * @return \PandoraBundle\Entity\Gameplatformproducts
     */
    public function getGamePlatformProduct()
    {
        return $this->GamePlatformProduct;
    }
}
