<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playerrebates
 *
 * @ORM\Table(name="PlayerRebates")
 * @ORM\Entity
 */
class Playerrebates extends AbstractEntity
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
     * @ORM\Column(name="RebateTransactionNo", type="string", length=100, nullable=true)
     */
    private $RebateTransactionNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="RebateDate", type="datetime", nullable=true)
     */
    private $RebateDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BetDateProcessed", type="datetime", nullable=true)
     */
    private $BetDateProcessed;

    /**
     * @var string
     *
     * @ORM\Column(name="TotalRebateAmountt", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalRebateAmountt;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';
    
    /**
     *
     * One Player Rebates have One Player Profile
     *
     * @ORM\ManyToOne(targetEntity="Playerprofiles")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfile;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RebateStatus", type="integer", nullable=true)
     */
    private $RebateStatus;

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
     * @ORM\Column(name="TotalRebateAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalRebateAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletAdjustmentMemoId", type="bigint", nullable=false)
     */
    private $WalletAdjustmentMemoId = '0';

    /**
     *
     * One Player Rebates have One Wallet Adjustment Memos
     *
     * @ORM\OneToOne(targetEntity="Walletadjustmentmemos", inversedBy="Playerrebates")
     * @ORM\JoinColumn(name="WalletAdjustmentMemoId", referencedColumnName="Id")
     */
    private $WalletAdjustmentMemo;

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
     * Set RebateTransactionNo
     *
     * @param string $RebateTransactionNo
     *
     * @return Playerrebates
     */
    public function setRebateTransactionNo($RebateTransactionNo)
    {
        $this->RebateTransactionNo = $RebateTransactionNo;

        return $this;
    }

    /**
     * Get RebateTransactionNo
     *
     * @return string
     */
    public function getRebateTransactionNo()
    {
        return $this->RebateTransactionNo;
    }

    /**
     * Set RebateDate
     *
     * @param \DateTime $RebateDate
     *
     * @return Playerrebates
     */
    public function setRebateDate($RebateDate)
    {
        $this->RebateDate = $RebateDate;

        return $this;
    }

    /**
     * Get RebateDate
     *
     * @return \DateTime
     */
    public function getRebateDate()
    {
        return $this->RebateDate;
    }

    /**
     * Set BetDateProcessed
     *
     * @param \DateTime $BetDateProcessed
     *
     * @return Playerrebates
     */
    public function setBetDateProcessed($BetDateProcessed)
    {
        $this->BetDateProcessed = $BetDateProcessed;

        return $this;
    }

    /**
     * Get BetDateProcessed
     *
     * @return \DateTime
     */
    public function getBetDateProcessed()
    {
        return $this->BetDateProcessed;
    }

    /**
     * Set TotalRebateAmountt
     *
     * @param string $TotalRebateAmountt
     *
     * @return Playerrebates
     */
    public function setTotalRebateAmountt($TotalRebateAmountt)
    {
        $this->TotalRebateAmountt = $TotalRebateAmountt;

        return $this;
    }

    /**
     * Get TotalRebateAmountt
     *
     * @return string
     */
    public function getTotalRebateAmountt()
    {
        return $this->TotalRebateAmountt;
    }

    /**
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return Playerrebates
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
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Playerrebates
     */
    public function setRollbaseId($RollbaseId)
    {
        $this->RollbaseId = $RollbaseId;

        return $this;
    }

    /**
     * Get rollbaseid
     *
     * @return integer
     */
    public function getRollbaseId()
    {
        return $this->RollbaseId;
    }

    /**
     * Set RebateStatus
     *
     * @param integer $RebateStatus
     *
     * @return Playerrebates
     */
    public function setRebateStatus($RebateStatus)
    {
        $this->RebateStatus = $RebateStatus;

        return $this;
    }

    /**
     * Get RebateStatus
     *
     * @return integer
     */
    public function getRebateStatus()
    {
        return $this->RebateStatus;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Playerrebates
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
     * @return Playerrebates
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
     * @return Playerrebates
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
     * @return Playerrebates
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
     * @return Playerrebates
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
     * Set TotalRebateAmount
     *
     * @param string $TotalRebateAmount
     *
     * @return Playerrebates
     */
    public function setTotalRebateAmount($TotalRebateAmount)
    {
        $this->TotalRebateAmount = $TotalRebateAmount;

        return $this;
    }

    /**
     * Get TotalRebateAmount
     *
     * @return string
     */
    public function getTotalRebateAmount()
    {
        return $this->TotalRebateAmount;
    }

    /**
     * Set WalletAdjustmentMemoId
     *
     * @param integer $WalletAdjustmentMemoId
     *
     * @return Playerrebates
     */
    public function setWalletAdjustmentMemoId($WalletAdjustmentMemoId)
    {
        $this->WalletAdjustmentMemoId = $WalletAdjustmentMemoId;

        return $this;
    }

    /**
     * Get WalletAdjustmentMemoId
     *
     * @return integer
     */
    public function getWalletAdjustmentMemoId()
    {
        return $this->WalletAdjustmentMemoId;
    }
    
    /**
     * Set PlayerProfile
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Playerrebates
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
     * Set WalletAdjustmentMemo
     *
     * @param \PandoraBundle\Entity\Walletadjustmentmemos WalletAdjustmentMemo
     *
     * @return Playerrebates
     */
    public function setWalletAdjustmentMemo(\PandoraBundle\Entity\Walletadjustmentmemos $WalletAdjustmentMemo = null)
    {
        $this->WalletAdjustmentMemo = $WalletAdjustmentMemo;
        
        return $this;
    }
    
    /**
     * Get WalletAdjustmentMemo
     *
     * @return \PandoraBundle\Entity\Walletadjustmentmemos
     */
    public function getWalletAdjustmentMemo()
    {
        return $this->WalletAdjustmentMemo;
    }
}
