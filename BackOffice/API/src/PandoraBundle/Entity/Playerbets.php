<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playerbets
 *
 * @ORM\Table(name="PlayerBets")
 * @ORM\Entity
 */
class Playerbets extends AbstractEntity
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
     * @ORM\Column(name="BetName", type="string", length=100, nullable=true)
     */
    private $BetName;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $TransactionNo;

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
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';
    
    /**
     *
     * Many Player bets have One Player Profile
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
     * Many Player bets have Wallets
     *
     * @ORM\ManyToOne(targetEntity="Wallets")
     * @ORM\JoinColumn(name="WalletId", referencedColumnName="Id")
     */
    private $Wallet;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="GamePlatformforId", type="bigint", nullable=false)
     */
    private $GamePlatformforId = '0';
    
    /**
     *
     * One Player Bet have One Game Platform
     *
     * @ORM\OneToOne(targetEntity="Gameplatforms", inversedBy="Playerbets")
     * @ORM\JoinColumn(name="GamePlatformforId", referencedColumnName="Id")
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
     * One Player Bet have One Game Platform Product
     *
     * @ORM\OneToOne(targetEntity="Gameplatformproducts", inversedBy="Playerbets")
     * @ORM\JoinColumn(name="GamePlatformProductId", referencedColumnName="Id")
     */
    private $GamePlatformProduct;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=true)
     */
    private $RollbaseId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsBeingPushed", type="boolean", nullable=false)
     */
    private $IsBeingPushed = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsDoneWagering", type="boolean", nullable=false)
     */
    private $IsDoneWagering = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsWageBeingProcess", type="boolean", nullable=false)
     */
    private $IsWageBeingProcess = true;

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
     * Set BetName
     *
     * @param string $BetName
     *
     * @return Playerbets
     */
    public function setBetName($BetName)
    {
        $this->BetName = $BetName;

        return $this;
    }

    /**
     * Get BetName
     *
     * @return string
     */
    public function getBetName()
    {
        return $this->BetName;
    }

    /**
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Playerbets
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
     * Set TransactionDate
     *
     * @param \DateTime $TransactionDate
     *
     * @return Playerbets
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
     * @return Playerbets
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
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return Playerbets
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
     * @return Playerbets
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
        return $this->walletid;
    }

    /**
     * Set GamePlatformforId
     *
     * @param integer $GamePlatformforId
     *
     * @return Playerbets
     */
    public function setGamePlatformforId($GamePlatformforId)
    {
        $this->GamePlatformforId = $GamePlatformforId;

        return $this;
    }

    /**
     * Get GamePlatformforId
     *
     * @return integer
     */
    public function getGamePlatformforId()
    {
        return $this->GamePlatformforId;
    }

    /**
     * Set GamePlatformProductId
     *
     * @param integer $GamePlatformProductId
     *
     * @return Playerbets
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Playerbets
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
     * Set IsBeingPushed
     *
     * @param boolean $IsBeingPushed
     *
     * @return Playerbets
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
     * Set IsDoneWagering
     *
     * @param boolean $IsDoneWagering
     *
     * @return Playerbets
     */
    public function setIsDoneWagering($IsDoneWagering)
    {
        $this->IsDoneWagering = $IsDoneWagering;

        return $this;
    }

    /**
     * Get IsDoneWagering
     *
     * @return boolean
     */
    public function getIsDoneWagering()
    {
        return $this->IsDoneWagering;
    }

    /**
     * Set IsWageBeingProcess
     *
     * @param boolean $IsWageBeingProcess
     *
     * @return Playerbets
     */
    public function setIsWageBeingProcess($IsWageBeingProcess)
    {
        $this->IsWageBeingProcess = $IsWageBeingProcess;

        return $this;
    }

    /**
     * Get IsWageBeingProcess
     *
     * @return boolean
     */
    public function getIsWageBeingProcess()
    {
        return $this->IsWageBeingProcess;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playerbets
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
     * @return Playerbets
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
     * @return Playerbets
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
     * @return Playerbets
     */
    public function setDatemodified($DateModified)
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
     * @return Playerbets
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
     * @return Playerbets
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
     * Set GamePlatform
     *
     * @param \PandoraBundle\Entity\Gameplatforms $GamePlatform
     *
     * @return Playerbets
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
     * @return Playerbets
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
    
    /**
     * Set PlayerProfile
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Playerbets
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
     * @return Playerbets
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
}
