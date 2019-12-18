<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Affiliatecommisions
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNumber")
 * @ORM\Table(name="AffiliateCommisions")
 * @ORM\Entity
 */
class Affiliatecommisions extends AbstractEntity
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
     * @var \DateTime
     *
     * @ORM\Column(name="CommissionDate", type="datetime", nullable=true)
     */
    private $CommissionDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="TotalSignUps", type="integer", nullable=false)
     */
    private $TotalSignUps = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="TotalActivePlayer", type="integer", nullable=false)
     */
    private $TotalActivePlayer = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CompanyWin", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $CompanyWin = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Bonuses", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Bonuses = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Rebates", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Rebates = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="NetWinLoss", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $NetWinLoss = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalNgr", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalNgr = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="NegativeBalance", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $NegativeBalance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="Income", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $Income = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="AffiliateId", type="bigint", nullable=false)
     */
    private $AffiliateId = '0';
    
    /**
     *
     * Many Affiliate Commissions to One Affiliate
     *
     * @ORM\ManyToOne(targetEntity="Affiliates")
     * @ORM\JoinColumn(name="AffiliateId", referencedColumnName="Id")
     */
    private $Affiliate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="BrandCode", type="string", length=10, nullable=true)
     */
    private $BrandCode;

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
     * @var \DateTime
     *
     * @ORM\Column(name="PeriodStart", type="datetime", nullable=true)
     */
    private $PeriodStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PeriodEnd", type="datetime", nullable=true)
     */
    private $PeriodEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="NumberOfClicks", type="integer", nullable=false)
     */
    private $NumberOfClicks = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="FTDCount", type="integer", nullable=false)
     */
    private $FTDCount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="AcumWinLoss", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $AcumWinLoss = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="PrevEarning", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $PrevEarning = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalEarning", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalEarning = '0.0000';

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="AffiliateCommissionStatusTypeEnum")
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $Status = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="RunningIncome", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $RunningIncome = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNumber", type="string", length=100, nullable=true)
     */
    private $TransactionNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="AssignedTo", type="string", length=100, nullable=true)
     */
    private $AssignedTo;

    /**
     *
     * One Affiliate Commission to Transaction Grab
     *
     * @ORM\OneToOne(targetEntity="Transactiongrabs")
     * @ORM\JoinColumn(name="Id", referencedColumnName="SourceObjectId"),
     */
    private $TransactionGrabs;
    
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
     * Set CommissionDate
     *
     * @param \DateTime $CommissionDate
     *
     * @return Affiliatecommisions
     */
    public function setCommissionDate($CommissionDate)
    {
        $this->CommissionDate = $CommissionDate;

        return $this;
    }

    /**
     * Get CommissionDate
     *
     * @return \DateTime
     */
    public function getCommissionDate()
    {
        return $this->CommissionDate;
    }

    /**
     * Set TotalSignUps
     *
     * @param integer $TotalSignUps
     *
     * @return Affiliatecommisions
     */
    public function setTotalSignUps($TotalSignUps)
    {
        $this->TotalSignUps = $TotalSignUps;

        return $this;
    }

    /**
     * Get TotalSignUps
     *
     * @return integer
     */
    public function getTotalSignUps()
    {
        return $this->TotalSignUps;
    }

    /**
     * Set TotalActivePlayer
     *
     * @param integer $TotalActivePlayer
     *
     * @return Affiliatecommisions
     */
    public function setTotalActivePlayer($TotalActivePlayer)
    {
        $this->TotalActivePlayer = $TotalActivePlayer;

        return $this;
    }

    /**
     * Get TotalActivePlayer
     *
     * @return integer
     */
    public function getTotalActivePlayer()
    {
        return $this->TotalActivePlayer;
    }

    /**
     * Set CompanyWin
     *
     * @param string $CompanyWin
     *
     * @return Affiliatecommisions
     */
    public function setCompanyWin($CompanyWin)
    {
        $this->CompanyWin = $CompanyWin;

        return $this;
    }

    /**
     * Get CompanyWin
     *
     * @return string
     */
    public function getCompanyWin()
    {
        return $this->CompanyWin;
    }

    /**
     * Set Bonuses
     *
     * @param string $Bonuses
     *
     * @return Affiliatecommisions
     */
    public function setBonuses($Bonuses)
    {
        $this->Bonuses = $Bonuses;

        return $this;
    }

    /**
     * Get Bonuses
     *
     * @return string
     */
    public function getBonuses()
    {
        return $this->Bonuses;
    }

    /**
     * Set Rebates
     *
     * @param string $Rebates
     *
     * @return Affiliatecommisions
     */
    public function setRebates($Rebates)
    {
        $this->Rebates = $Rebates;

        return $this;
    }

    /**
     * Get Rebates
     *
     * @return string
     */
    public function getRebates()
    {
        return $this->Rebates;
    }

    /**
     * Set NetWinLoss
     *
     * @param string $NetWinLoss
     *
     * @return Affiliatecommisions
     */
    public function setNetWinLoss($NetWinLoss)
    {
        $this->NetWinLoss = $NetWinLoss;

        return $this;
    }

    /**
     * Get NetWinLoss
     *
     * @return string
     */
    public function getNetWinLoss()
    {
        return $this->NetWinLoss;
    }

    /**
     * Set TotalNgr
     *
     * @param string $TotalNgr
     *
     * @return Affiliatecommisions
     */
    public function setTotalNgr($TotalNgr)
    {
        $this->TotalNgr = $TotalNgr;

        return $this;
    }

    /**
     * Get TotalNgr
     *
     * @return string
     */
    public function getTotalNgr()
    {
        return $this->TotalNgr;
    }

    /**
     * Set NegativeBalance
     *
     * @param string $NegativeBalance
     *
     * @return Affiliatecommisions
     */
    public function setNegativeBalance($NegativeBalance)
    {
        $this->NegativeBalance = $NegativeBalance;

        return $this;
    }

    /**
     * Get NegativeBalance
     *
     * @return string
     */
    public function getNegativeBalance()
    {
        return $this->NegativeBalance;
    }

    /**
     * Set Income
     *
     * @param string $Income
     *
     * @return Affiliatecommisions
     */
    public function setIncome($Income)
    {
        $this->Income = $Income;

        return $this;
    }

    /**
     * Get Income
     *
     * @return string
     */
    public function getIncome()
    {
        return $this->Income;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Affiliatecommisions
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
     * Set AffiliateId
     *
     * @param integer $AffiliateId
     *
     * @return Affiliatecommisions
     */
    public function setAffiliateId($AffiliateId)
    {
        $this->AffiliateId = $AffiliateId;

        return $this;
    }

    /**
     * Get AffiliateId
     *
     * @return integer
     */
    public function getAffiliateId()
    {
        return $this->AffiliateId;
    }

    /**
     * Set BrandCode
     *
     * @param string $BrandCode
     *
     * @return Affiliatecommisions
     */
    public function setBrandCode($BrandCode)
    {
        $this->BrandCode = $BrandCode;

        return $this;
    }

    /**
     * Get BrandCode
     *
     * @return string
     */
    public function getBrandCode()
    {
        return $this->BrandCode;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Affiliatecommisions
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
     * @return Affiliatecommisions
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
     * @return Affiliatecommisions
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
     * @return Affiliatecommisions
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
     * @return Affiliatecommisions
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
     * Set PeriodStart
     *
     * @param \DateTime $PeriodStart
     *
     * @return Affiliatecommisions
     */
    public function setPeriodStart($PeriodStart)
    {
        $this->PeriodStart = $PeriodStart;

        return $this;
    }

    /**
     * Get PeriodStart
     *
     * @return \DateTime
     */
    public function getPeriodStart()
    {
        return $this->PeriodStart;
    }

    /**
     * Set PeriodEnd
     *
     * @param \DateTime $PeriodEnd
     *
     * @return Affiliatecommisions
     */
    public function setPeriodEnd($PeriodEnd)
    {
        $this->PeriodEnd = $PeriodEnd;

        return $this;
    }

    /**
     * Get PeriodEnd
     *
     * @return \DateTime
     */
    public function getPeriodEnd()
    {
        return $this->PeriodEnd;
    }

    /**
     * Set NumberOfClicks
     *
     * @param integer $NumberOfClicks
     *
     * @return Affiliatecommisions
     */
    public function setNumberOfClicks($NumberOfClicks)
    {
        $this->NumberOfClicks = $NumberOfClicks;

        return $this;
    }

    /**
     * Get NumberOfClicks
     *
     * @return integer
     */
    public function getNumberOfClicks()
    {
        return $this->NumberOfClicks;
    }

    /**
     * Set FTDCount
     *
     * @param integer $FTDCount
     *
     * @return Affiliatecommisions
     */
    public function setFTDCount($FTDCount)
    {
        $this->FTDCount = $FTDCount;

        return $this;
    }

    /**
     * Get FTDCount
     *
     * @return integer
     */
    public function getFTDCount()
    {
        return $this->FTDCount;
    }

    /**
     * Set AcumWinLoss
     *
     * @param string $AcumWinLoss
     *
     * @return Affiliatecommisions
     */
    public function setAcumWinLoss($AcumWinLoss)
    {
        $this->AcumWinLoss = $AcumWinLoss;

        return $this;
    }

    /**
     * Get AcumWinLoss
     *
     * @return string
     */
    public function getAcumWinLoss()
    {
        return $this->AcumWinLoss;
    }

    /**
     * Set PrevEarning
     *
     * @param string $PrevEarning
     *
     * @return Affiliatecommisions
     */
    public function setPrevEarning($PrevEarning)
    {
        $this->PrevEarning = $PrevEarning;

        return $this;
    }

    /**
     * Get PrevEarning
     *
     * @return string
     */
    public function getPrevEarning()
    {
        return $this->PrevEarning;
    }

    /**
     * Set TotalEarning
     *
     * @param string $TotalEarning
     *
     * @return Affiliatecommisions
     */
    public function setTotalEarning($TotalEarning)
    {
        $this->TotalEarning = $TotalEarning;

        return $this;
    }

    /**
     * Get TotalEarning
     *
     * @return string
     */
    public function getTotalEarning()
    {
        return $this->TotalEarning;
    }

    /**
     * Set Status
     *
     * @param integer $Status
     *
     * @return Affiliatecommisions
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
     * Set RunningIncome
     *
     * @param string $RunningIncome
     *
     * @return Affiliatecommisions
     */
    public function setRunningIncome($RunningIncome)
    {
        $this->RunningIncome = $RunningIncome;

        return $this;
    }

    /**
     * Get RunningIncome
     *
     * @return string
     */
    public function getRunningIncome()
    {
        return $this->RunningIncome;
    }

    /**
     * Set TransactionNumber
     *
     * @param string $TransactionNumber
     *
     * @return Affiliatecommisions
     */
    public function setTransactionNumber($TransactionNumber)
    {
        $this->TransactionNumber = $TransactionNumber;

        return $this;
    }

    /**
     * Get TransactionNumber
     *
     * @return string
     */
    public function getTransactionNumber()
    {
        return $this->TransactionNumber;
    }
    
    /**
     * Set Affiliates
     *
     * @param \AppBundle\Entity\Affiliates $Affiliate
     *
     * @return Affiliatecommisions
     */
    public function setAffiliate(\PandoraBundle\Entity\Affiliates $Affiliate = null)
    {
        $this->Affiliate = $Affiliate;
        
        return $this;
    }
    
    /**
     * Get Affiliate
     *
     * @return \AppBundle\Entity\Affiliates
     */
    public function getAffiliate()
    {
        return $this->Affiliate;
    }

     /**
     * Set AssignedTo
     *
     * @param string $AssignedTo
     *
     * @return Affiliatecommisions
     */
    public function setAssignedTo($AssignedTo)
    {
        $this->AssignedTo = $AssignedTo;

        return $this;
    }

    /**
     * Get AssignedTo
     *
     * @return string
     */
    public function getAssignedTo()
    {
        return $this->AssignedTo;
    }
    
    /**
     * Set TransactionGrabs
     *
     * @param \AppBundle\Entity\Transactiongrabs $TransactionGrabs
     *
     * @return Affiliatecommisions
     */
    public function setTransactionGrabs(\PandoraBundle\Entity\Transactiongrabs $TransactionGrabs = null)
    {
        $this->TransactionGrabs = $TransactionGrabs;
        
        return $this;
    }
    
    /**
     * Get TransactionGrabs
     *
     * @return \AppBundle\Entity\Transactiongrabs
     */
    public function getTransactionGrabs()
    {
        return $this->TransactionGrabs;
    }
}
