<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Affiliatecommissiondetails
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNumber")
 * @ORM\Table(name="AffiliateCommissionDetails")
 * @ORM\Entity
 */
class Affiliatecommissiondetails extends AbstractEntity
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
     * @ORM\Column(name="AffiliateCommissionId", type="bigint", nullable=false)
     */
    private $AffiliateCommissionId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $CurrencyId = '0';

    /**
     *
     * Many Bank Accounts to One Currency
     *
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
    private $Currency;
    
    /**
     * @var string
     *
     * @ORM\Column(name="TotalLoss", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalLoss = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalWin", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TotalWin = '0.0000';

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
     * @ORM\Column(name="ConversionRate", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ConversionRate = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="ActivePlayerCountAsOf", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $ActivePlayerCountAsOf = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="AsOfDate", type="datetime", nullable=true)
     */
    private $AsOfDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PeriodStartDate", type="datetime", nullable=true)
     */
    private $PeriodStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PeriodEndDate", type="datetime", nullable=true)
     */
    private $PeriodEndDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ConvertedAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ConvertedAmount = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = false;

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
    private $modifiedbyid = '0';

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
     * @var integer
     *
     * @ORM\Column(name="AffiliateId", type="bigint", nullable=false)
     */
    private $AffiliateId = '0';



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
     * Set AffiliateCommissionId
     *
     * @param integer $AffiliateCommissionId
     *
     * @return Affiliatecommissiondetails
     */
    public function setAffiliateCommissionId($AffiliateCommissionId)
    {
        $this->AffiliateCommissionId = $AffiliateCommissionId;

        return $this;
    }

    /**
     * Get AffiliateCommissionId
     *
     * @return integer
     */
    public function getAffiliateCommissionId()
    {
        return $this->AffiliateCommissionId;
    }

    /**
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Affiliatecommissiondetails
     */
    public function setCurrencyId($CurrencyId)
    {
        $this->CurrencyId = $CurrencyId;

        return $this;
    }

    /**
     * Get CurrencyId
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->CurrencyId;
    }
    
    
    /**
     * Set Currency
     *
     * @param \PandoraBundle\Entity\Currencies $Currency
     *
     * @return Affiliatecommissiondetails
     */
    public function setCurrency(\PandoraBundle\Entity\Currencies $Currency = null)
    {
        $this->Currency = $Currency;
        
        return $this;
    }
    
    /**
     * Get Currency
     *
     * @return \PandoraBundle\Entity\Currencies
     */
    public function getCurrency()
    {
        return $this->Currency;
    }
    
    

    /**
     * Set TotalLoss
     *
     * @param string $TotalLoss
     *
     * @return Affiliatecommissiondetails
     */
    public function setTotalLoss($TotalLoss)
    {
        $this->TotalLoss = $TotalLoss;

        return $this;
    }

    /**
     * Get TotalLoss
     *
     * @return string
     */
    public function getTotalLoss()
    {
        return $this->TotalLoss;
    }

    /**
     * Set TotalWin
     *
     * @param string $TotalWin
     *
     * @return Affiliatecommissiondetails
     */
    public function setTotalWin($TotalWin)
    {
        $this->TotalWin = $TotalWin;

        return $this;
    }

    /**
     * Get TotalWin
     *
     * @return string
     */
    public function getTotalWin()
    {
        return $this->TotalWin;
    }

    /**
     * Set CompanyWin
     *
     * @param string $CompanyWin
     *
     * @return Affiliatecommissiondetails
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
     * @return Affiliatecommissiondetails
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
     * @return Affiliatecommissiondetails
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
     * @return Affiliatecommissiondetails
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
     * Set ConversionRate
     *
     * @param string $ConversionRate
     *
     * @return Affiliatecommissiondetails
     */
    public function setConversionRate($ConversionRate)
    {
        $this->ConversionRate = $ConversionRate;

        return $this;
    }

    /**
     * Get ConversionRate
     *
     * @return string
     */
    public function getConversionRate()
    {
        return $this->ConversionRate;
    }

    /**
     * Set ActivePlayerCountAsOf
     *
     * @param string $ActivePlayerCountAsOf
     *
     * @return Affiliatecommissiondetails
     */
    public function setActivePlayerCountAsOf($ActivePlayerCountAsOf)
    {
        $this->ActivePlayerCountAsOf = $ActivePlayerCountAsOf;

        return $this;
    }

    /**
     * Get ActivePlayerCountAsOf
     *
     * @return string
     */
    public function getActivePlayerCountAsOf()
    {
        return $this->ActivePlayerCountAsOf;
    }

    /**
     * Set AsOfDate
     *
     * @param \DateTime $AsOfDate
     *
     * @return Affiliatecommissiondetails
     */
    public function setAsOfDate($AsOfDate)
    {
        $this->AsOfDate = $AsOfDate;

        return $this;
    }

    /**
     * Get AsOfDate
     *
     * @return \DateTime
     */
    public function getAsOfDate()
    {
        return $this->AsOfDate;
    }

    /**
     * Set PeriodStartDate
     *
     * @param \DateTime $PeriodStartDate
     *
     * @return Affiliatecommissiondetails
     */
    public function setPeriodStartDate($PeriodStartDate)
    {
        $this->PeriodStartDate = $PeriodStartDate;

        return $this;
    }

    /**
     * Get PeriodStartDate
     *
     * @return \DateTime
     */
    public function getPeriodStartDate()
    {
        return $this->PeriodStartDate;
    }

    /**
     * Set periodenddate
     *
     * @param \DateTime $periodenddate
     *
     * @return Affiliatecommissiondetails
     */
    public function setPeriodenddate($periodenddate)
    {
        $this->periodenddate = $periodenddate;

        return $this;
    }

    /**
     * Get PeriodEndDate
     *
     * @return \DateTime
     */
    public function getPeriodEndDate()
    {
        return $this->PeriodEndDate;
    }

    /**
     * Set ConvertedAmount
     *
     * @param string $ConvertedAmount
     *
     * @return Affiliatecommissiondetails
     */
    public function setConvertedAmount($ConvertedAmount)
    {
        $this->ConvertedAmount = $ConvertedAmount;

        return $this;
    }

    /**
     * Get ConvertedAmount
     *
     * @return string
     */
    public function getConvertedAmount()
    {
        return $this->ConvertedAmount;
    }

    /**
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return Affiliatecommissiondetails
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

//     /**
//      * Set rollbaseid
//      *
//      * @param integer $rollbaseid
//      *
//      * @return Affiliatecommissiondetails
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
     * @return Affiliatecommissiondetails
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
     * @return Affiliatecommissiondetails
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
     * Set CateCreated
     *
     * @param \DateTime $CateCreated
     *
     * @return Affiliatecommissiondetails
     */
    public function setCateCreated($CateCreated)
    {
        $this->CateCreated = $CateCreated;

        return $this;
    }

    /**
     * Get CateCreated
     *
     * @return \DateTime
     */
    public function getCateCreated()
    {
        return $this->CateCreated;
    }

    /**
     * Set DateModified
     *
     * @param \DateTime $DateModified
     *
     * @return Affiliatecommissiondetails
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
     * @return Affiliatecommissiondetails
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
     * Set AffiliateId
     *
     * @param integer $AffiliateId
     *
     * @return Affiliatecommissiondetails
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
}
