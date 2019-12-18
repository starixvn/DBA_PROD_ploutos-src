<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Walletcomputedbalances
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="WalletCode")
 * @ORM\Table(name="WalletComputedBalances")
 * @ORM\Entity
 */
class Walletcomputedbalances
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
     * @ORM\Column(name="WalletId", type="bigint", nullable=false)
     */
    private $WalletId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletCode", type="string", length=100, nullable=true)
     */
    private $WalletCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $PlayerProfileId = '0';
    
    /**
     *
     * One Wallet Computed Balances have One Player Profile
     *
     * @ORM\OneToOne(targetEntity="Playerprofiles", inversedBy="Walletcomputedbalances")
     * @ORM\JoinColumn(name="PlayerProfileId", referencedColumnName="Id")
     */
    private $PlayerProfiles;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Balance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Balance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="OutstandingBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $OutstandingBalance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringRequirement", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringRequirement = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WithdrawableAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WithdrawableAmount = '0.0000';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="WithdrawableAsOf", type="datetime", nullable=true)
     */
    private $WithdrawableAsOf;

    /**
     * @var string
     *
     * @ORM\Column(name="UpdatedBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $UpdatedBalance = '0.0000';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="WalletLastUpdated", type="datetime", nullable=true)
     */
    private $WalletLastUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="WageringBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $WageringBalance = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = true;

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
     * @var boolean
     *
     * @ORM\Column(name="ClearForSync", type="boolean", nullable=false)
     */
    private $ClearForSync = true;

    /**
     * @var string
     *
     * @ORM\Column(name="GPLatestSubWalletBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $GPLatestSubWalletBalance = '0.0000';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GPLatestSubWalletLastUpdated", type="datetime", nullable=true)
     */
    private $GPLatestSubWalletLastUpdated;



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
     * Set WalletId
     *
     * @param integer $WalletId
     *
     * @return WalletComputedBalances
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
     * Set WalletCode
     *
     * @param string $WalletCode
     *
     * @return WalletComputedBalances
     */
    public function setWalletCode($WalletCode)
    {
        $this->WalletCode = $WalletCode;

        return $this;
    }

    /**
     * Get WalletCode
     *
     * @return string
     */
    public function getWalletCode()
    {
        return $this->WalletCode;
    }

    /**
     * Set PlayerProfileId
     *
     * @param integer $PlayerProfileId
     *
     * @return WalletComputedBalances
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
     * Set Balance
     *
     * @param string $Balance
     *
     * @return WalletComputedBalances
     */
    public function setBalance($Balance)
    {
        $this->Balance = $Balance;

        return $this;
    }

    /**
     * Get Balance
     *
     * @return string
     */
    public function getBalance()
    {
        return $this->Balance;
    }

    /**
     * Set OutstandingBalance
     *
     * @param string $OutstandingBalance
     *
     * @return WalletComputedBalances
     */
    public function setOutstandingBalance($OutstandingBalance)
    {
        $this->OutstandingBalance = $OutstandingBalance;

        return $this;
    }

    /**
     * Get OutstandingBalance
     *
     * @return string
     */
    public function getOutstandingBalance()
    {
        return $this->OutstandingBalance;
    }

    /**
     * Set WageringRequirement
     *
     * @param string $WageringRequirement
     *
     * @return WalletComputedBalances
     */
    public function setWageringRequirement($WageringRequirement)
    {
        $this->WageringRequirement = $WageringRequirement;

        return $this;
    }

    /**
     * Get WageringRequirement
     *
     * @return string
     */
    public function getWageringRequirement()
    {
        return $this->WageringRequirement;
    }

    /**
     * Set WithdrawableAmount
     *
     * @param string $WithdrawableAmount
     *
     * @return WalletComputedBalances
     */
    public function setWithdrawableAmount($WithdrawableAmount)
    {
        $this->WithdrawableAmount = $WithdrawableAmount;

        return $this;
    }

    /**
     * Get WithdrawableAmount
     *
     * @return string
     */
    public function getWithdrawableAmount()
    {
        return $this->WithdrawableAmount;
    }

    /**
     * Set WithdrawableAsOf
     *
     * @param \DateTime $WithdrawableAsOf
     *
     * @return WalletComputedBalances
     */
    public function setWithdrawableAsOf($WithdrawableAsOf)
    {
        $this->WithdrawableAsOf = $WithdrawableAsOf;

        return $this;
    }

    /**
     * Get WithdrawableAsOf
     *
     * @return \DateTime
     */
    public function getWithdrawableAsOf()
    {
        return $this->WithdrawableAsOf;
    }

    /**
     * Set UpdatedBalance
     *
     * @param string $UpdatedBalance
     *
     * @return WalletComputedBalances
     */
    public function setUpdatedBalance($UpdatedBalance)
    {
        $this->UpdatedBalance = $UpdatedBalance;

        return $this;
    }

    /**
     * Get UpdatedBalance
     *
     * @return string
     */
    public function getUpdatedBalance()
    {
        return $this->UpdatedBalance;
    }

    /**
     * Set WalletLastUpdated
     *
     * @param \DateTime $WalletLastUpdated
     *
     * @return WalletComputedBalances
     */
    public function setWalletLastUpdated($WalletLastUpdated)
    {
        $this->WalletLastUpdated = $WalletLastUpdated;

        return $this;
    }

    /**
     * Get WalletLastUpdated
     *
     * @return \DateTime
     */
    public function getWalletLastUpdated()
    {
        return $this->WalletLastUpdated;
    }

    /**
     * Set WageringBalance
     *
     * @param string $WageringBalance
     *
     * @return WalletComputedBalances
     */
    public function setWageringBalance($WageringBalance)
    {
        $this->WageringBalance = $WageringBalance;

        return $this;
    }

    /**
     * Get WageringBalance
     *
     * @return string
     */
    public function getWageringBalance()
    {
        return $this->WageringBalance;
    }

    /**
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return WalletComputedBalances
     */
    public function setNeedToSync($NeedToSync)
    {
        $this->NeedToSync = $NeedToSync;

        return $this;
    }

    /**
     * Get NeedToSync
     *
     * @return boolean
     */
    public function getNeedToSync()
    {
        return $this->NeedToSync;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return WalletComputedBalances
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
     * @return WalletComputedBalances
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
     * @return WalletComputedBalances
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
     * @return WalletComputedBalances
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
     * @return WalletComputedBalances
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
     * Set ClearForSync
     *
     * @param boolean $ClearForSync
     *
     * @return WalletComputedBalances
     */
    public function setClearForSync($ClearForSync)
    {
        $this->ClearForSync = $ClearForSync;

        return $this;
    }

    /**
     * Get ClearForSync
     *
     * @return boolean
     */
    public function getClearForSync()
    {
        return $this->ClearForSync;
    }

    /**
     * Set GPLatestSubWalletBalance
     *
     * @param string $GPLatestSubWalletBalance
     *
     * @return WalletComputedBalances
     */
    public function setGPLatestSubWalletBalance($GPLatestSubWalletBalance)
    {
        $this->GPLatestSubWalletBalance = $GPLatestSubWalletBalance;

        return $this;
    }

    /**
     * Get GPLatestSubWalletBalance
     *
     * @return string
     */
    public function getGPLatestSubWalletBalance()
    {
        return $this->GPLatestSubWalletBalance;
    }

    /**
     * Set GPLatestSubWalletLastUpdated
     *
     * @param \DateTime $GPLatestSubWalletLastUpdated
     *
     * @return WalletComputedBalances
     */
    public function setGPLatestSubWalletLastUpdated($GPLatestSubWalletLastUpdated)
    {
        $this->GPLatestSubWalletLastUpdated = $GPLatestSubWalletLastUpdated;

        return $this;
    }

    /**
     * Get GPLatestSubWalletLastUpdated
     *
     * @return \DateTime
     */
    public function getGPLatestSubWalletLastUpdated()
    {
        return $this->GPLatestSubWalletLastUpdated;
    }
    
    /**
     * Set PlayerProfiles
     *
     * @param \PandoraBundle\Entity\PlayerProfiles $PlayerProfiles
     *
     * @return Wallets
     */
    public function setPlayerProfiles(\PandoraBundle\Entity\PlayerProfiles $PlayerProfiles = null)
    {
        $this->PlayerProfiles = $PlayerProfiles;
        
        return $this;
    }
    
    /**
     * Get PlayerProfiles
     *
     * @return \PandoraBundle\Entity\PlayerProfiles
     */
    public function getPlayerProfiles()
    {
        return $this->PlayerProfiles;
    }
}
