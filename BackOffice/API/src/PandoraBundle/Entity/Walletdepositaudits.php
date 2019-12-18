<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Walletdepositaudits
 *
 * @ORM\Table(name="WalletDepositAudits")
 * @ORM\Entity
 */
class Walletdepositaudits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="OriginalId", type="bigint", nullable=false)
     */
    private $originalid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletId", type="bigint", nullable=false)
     */
    private $walletid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $transactionno;

    /**
     * @var string
     *
     * @ORM\Column(name="RefTransactionNo", type="string", length=100, nullable=true)
     */
    private $reftransactionno;

    /**
     * @var string
     *
     * @ORM\Column(name="RefDepositRemarks", type="string", length=100, nullable=true)
     */
    private $refdepositremarks;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $transactiondate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DepositDate", type="datetime", nullable=true)
     */
    private $depositdate;

    /**
     * @var string
     *
     * @ORM\Column(name="ActualDepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $actualdepositamount;

    /**
     * @var string
     *
     * @ORM\Column(name="DepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $depositamount;

    /**
     * @var string
     *
     * @ORM\Column(name="UniqueDepositAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $uniquedepositamount;

    /**
     * @var string
     *
     * @ORM\Column(name="CreditAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $creditamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $wageringamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringFulfillmentAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $wageringfulfillmentamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $bonusamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusWageringAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $bonuswageringamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="TotalWageringAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $totalwageringamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="WageringBalanceAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $wageringbalanceamount = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsWageringFulfilled", type="boolean", nullable=false)
     */
    private $iswageringfulfilled = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="BonusId", type="bigint", nullable=false)
     */
    private $bonusid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="LockAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $lockamount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusCode", type="string", length=100, nullable=true)
     */
    private $bonuscode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $needtosync = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ApprovedDate", type="datetime", nullable=true)
     */
    private $approveddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="PaymentRiskLevelId", type="bigint", nullable=false)
     */
    private $paymentrisklevelid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $rollbaseid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PaymentMethodId", type="bigint", nullable=false)
     */
    private $paymentmethodid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="BankAccountId", type="bigint", nullable=false)
     */
    private $bankaccountid = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DepositUntil", type="datetime", nullable=true)
     */
    private $deposituntil;

    /**
     * @var integer
     *
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="AuditType", type="integer", nullable=false)
     */
    private $audittype = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="DaddyPayDepositId", type="bigint", nullable=false)
     */
    private $daddypaydepositid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $createdbyid = '0';

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
    private $datecreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $datemodified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=false)
     */
    private $activerecord = true;

    /**
     * @var string
     *
     * @ORM\Column(name="RequiredDepositForBonus", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $requireddepositforbonus = '0.0000';



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set originalid
     *
     * @param integer $originalid
     *
     * @return Walletdepositaudits
     */
    public function setOriginalid($originalid)
    {
        $this->originalid = $originalid;

        return $this;
    }

    /**
     * Get originalid
     *
     * @return integer
     */
    public function getOriginalid()
    {
        return $this->originalid;
    }

    /**
     * Set walletid
     *
     * @param integer $walletid
     *
     * @return Walletdepositaudits
     */
    public function setWalletid($walletid)
    {
        $this->walletid = $walletid;

        return $this;
    }

    /**
     * Get walletid
     *
     * @return integer
     */
    public function getWalletid()
    {
        return $this->walletid;
    }

    /**
     * Set transactionno
     *
     * @param string $transactionno
     *
     * @return Walletdepositaudits
     */
    public function setTransactionno($transactionno)
    {
        $this->transactionno = $transactionno;

        return $this;
    }

    /**
     * Get transactionno
     *
     * @return string
     */
    public function getTransactionno()
    {
        return $this->transactionno;
    }

    /**
     * Set reftransactionno
     *
     * @param string $reftransactionno
     *
     * @return Walletdepositaudits
     */
    public function setReftransactionno($reftransactionno)
    {
        $this->reftransactionno = $reftransactionno;

        return $this;
    }

    /**
     * Get reftransactionno
     *
     * @return string
     */
    public function getReftransactionno()
    {
        return $this->reftransactionno;
    }

    /**
     * Set refdepositremarks
     *
     * @param string $refdepositremarks
     *
     * @return Walletdepositaudits
     */
    public function setRefdepositremarks($refdepositremarks)
    {
        $this->refdepositremarks = $refdepositremarks;

        return $this;
    }

    /**
     * Get refdepositremarks
     *
     * @return string
     */
    public function getRefdepositremarks()
    {
        return $this->refdepositremarks;
    }

    /**
     * Set transactiondate
     *
     * @param \DateTime $transactiondate
     *
     * @return Walletdepositaudits
     */
    public function setTransactiondate($transactiondate)
    {
        $this->transactiondate = $transactiondate;

        return $this;
    }

    /**
     * Get transactiondate
     *
     * @return \DateTime
     */
    public function getTransactiondate()
    {
        return $this->transactiondate;
    }

    /**
     * Set depositdate
     *
     * @param \DateTime $depositdate
     *
     * @return Walletdepositaudits
     */
    public function setDepositdate($depositdate)
    {
        $this->depositdate = $depositdate;

        return $this;
    }

    /**
     * Get depositdate
     *
     * @return \DateTime
     */
    public function getDepositdate()
    {
        return $this->depositdate;
    }

    /**
     * Set actualdepositamount
     *
     * @param string $actualdepositamount
     *
     * @return Walletdepositaudits
     */
    public function setActualdepositamount($actualdepositamount)
    {
        $this->actualdepositamount = $actualdepositamount;

        return $this;
    }

    /**
     * Get actualdepositamount
     *
     * @return string
     */
    public function getActualdepositamount()
    {
        return $this->actualdepositamount;
    }

    /**
     * Set depositamount
     *
     * @param string $depositamount
     *
     * @return Walletdepositaudits
     */
    public function setDepositamount($depositamount)
    {
        $this->depositamount = $depositamount;

        return $this;
    }

    /**
     * Get depositamount
     *
     * @return string
     */
    public function getDepositamount()
    {
        return $this->depositamount;
    }

    /**
     * Set uniquedepositamount
     *
     * @param string $uniquedepositamount
     *
     * @return Walletdepositaudits
     */
    public function setUniquedepositamount($uniquedepositamount)
    {
        $this->uniquedepositamount = $uniquedepositamount;

        return $this;
    }

    /**
     * Get uniquedepositamount
     *
     * @return string
     */
    public function getUniquedepositamount()
    {
        return $this->uniquedepositamount;
    }

    /**
     * Set creditamount
     *
     * @param string $creditamount
     *
     * @return Walletdepositaudits
     */
    public function setCreditamount($creditamount)
    {
        $this->creditamount = $creditamount;

        return $this;
    }

    /**
     * Get creditamount
     *
     * @return string
     */
    public function getCreditamount()
    {
        return $this->creditamount;
    }

    /**
     * Set wageringamount
     *
     * @param string $wageringamount
     *
     * @return Walletdepositaudits
     */
    public function setWageringamount($wageringamount)
    {
        $this->wageringamount = $wageringamount;

        return $this;
    }

    /**
     * Get wageringamount
     *
     * @return string
     */
    public function getWageringamount()
    {
        return $this->wageringamount;
    }

    /**
     * Set wageringfulfillmentamount
     *
     * @param string $wageringfulfillmentamount
     *
     * @return Walletdepositaudits
     */
    public function setWageringfulfillmentamount($wageringfulfillmentamount)
    {
        $this->wageringfulfillmentamount = $wageringfulfillmentamount;

        return $this;
    }

    /**
     * Get wageringfulfillmentamount
     *
     * @return string
     */
    public function getWageringfulfillmentamount()
    {
        return $this->wageringfulfillmentamount;
    }

    /**
     * Set bonusamount
     *
     * @param string $bonusamount
     *
     * @return Walletdepositaudits
     */
    public function setBonusamount($bonusamount)
    {
        $this->bonusamount = $bonusamount;

        return $this;
    }

    /**
     * Get bonusamount
     *
     * @return string
     */
    public function getBonusamount()
    {
        return $this->bonusamount;
    }

    /**
     * Set bonuswageringamount
     *
     * @param string $bonuswageringamount
     *
     * @return Walletdepositaudits
     */
    public function setBonuswageringamount($bonuswageringamount)
    {
        $this->bonuswageringamount = $bonuswageringamount;

        return $this;
    }

    /**
     * Get bonuswageringamount
     *
     * @return string
     */
    public function getBonuswageringamount()
    {
        return $this->bonuswageringamount;
    }

    /**
     * Set totalwageringamount
     *
     * @param string $totalwageringamount
     *
     * @return Walletdepositaudits
     */
    public function setTotalwageringamount($totalwageringamount)
    {
        $this->totalwageringamount = $totalwageringamount;

        return $this;
    }

    /**
     * Get totalwageringamount
     *
     * @return string
     */
    public function getTotalwageringamount()
    {
        return $this->totalwageringamount;
    }

    /**
     * Set wageringbalanceamount
     *
     * @param string $wageringbalanceamount
     *
     * @return Walletdepositaudits
     */
    public function setWageringbalanceamount($wageringbalanceamount)
    {
        $this->wageringbalanceamount = $wageringbalanceamount;

        return $this;
    }

    /**
     * Get wageringbalanceamount
     *
     * @return string
     */
    public function getWageringbalanceamount()
    {
        return $this->wageringbalanceamount;
    }

    /**
     * Set iswageringfulfilled
     *
     * @param boolean $iswageringfulfilled
     *
     * @return Walletdepositaudits
     */
    public function setIswageringfulfilled($iswageringfulfilled)
    {
        $this->iswageringfulfilled = $iswageringfulfilled;

        return $this;
    }

    /**
     * Get iswageringfulfilled
     *
     * @return boolean
     */
    public function getIswageringfulfilled()
    {
        return $this->iswageringfulfilled;
    }

    /**
     * Set bonusid
     *
     * @param integer $bonusid
     *
     * @return Walletdepositaudits
     */
    public function setBonusid($bonusid)
    {
        $this->bonusid = $bonusid;

        return $this;
    }

    /**
     * Get bonusid
     *
     * @return integer
     */
    public function getBonusid()
    {
        return $this->bonusid;
    }

    /**
     * Set lockamount
     *
     * @param string $lockamount
     *
     * @return Walletdepositaudits
     */
    public function setLockamount($lockamount)
    {
        $this->lockamount = $lockamount;

        return $this;
    }

    /**
     * Get lockamount
     *
     * @return string
     */
    public function getLockamount()
    {
        return $this->lockamount;
    }

    /**
     * Set bonuscode
     *
     * @param string $bonuscode
     *
     * @return Walletdepositaudits
     */
    public function setBonuscode($bonuscode)
    {
        $this->bonuscode = $bonuscode;

        return $this;
    }

    /**
     * Get bonuscode
     *
     * @return string
     */
    public function getBonuscode()
    {
        return $this->bonuscode;
    }

    /**
     * Set needtosync
     *
     * @param boolean $needtosync
     *
     * @return Walletdepositaudits
     */
    public function setNeedtosync($needtosync)
    {
        $this->needtosync = $needtosync;

        return $this;
    }

    /**
     * Get needtosync
     *
     * @return boolean
     */
    public function getNeedtosync()
    {
        return $this->needtosync;
    }

    /**
     * Set approveddate
     *
     * @param \DateTime $approveddate
     *
     * @return Walletdepositaudits
     */
    public function setApproveddate($approveddate)
    {
        $this->approveddate = $approveddate;

        return $this;
    }

    /**
     * Get approveddate
     *
     * @return \DateTime
     */
    public function getApproveddate()
    {
        return $this->approveddate;
    }

    /**
     * Set paymentrisklevelid
     *
     * @param integer $paymentrisklevelid
     *
     * @return Walletdepositaudits
     */
    public function setPaymentrisklevelid($paymentrisklevelid)
    {
        $this->paymentrisklevelid = $paymentrisklevelid;

        return $this;
    }

    /**
     * Get paymentrisklevelid
     *
     * @return integer
     */
    public function getPaymentrisklevelid()
    {
        return $this->paymentrisklevelid;
    }

    /**
     * Set rollbaseid
     *
     * @param integer $rollbaseid
     *
     * @return Walletdepositaudits
     */
    public function setRollbaseid($rollbaseid)
    {
        $this->rollbaseid = $rollbaseid;

        return $this;
    }

    /**
     * Get rollbaseid
     *
     * @return integer
     */
    public function getRollbaseid()
    {
        return $this->rollbaseid;
    }

    /**
     * Set paymentmethodid
     *
     * @param integer $paymentmethodid
     *
     * @return Walletdepositaudits
     */
    public function setPaymentmethodid($paymentmethodid)
    {
        $this->paymentmethodid = $paymentmethodid;

        return $this;
    }

    /**
     * Get paymentmethodid
     *
     * @return integer
     */
    public function getPaymentmethodid()
    {
        return $this->paymentmethodid;
    }

    /**
     * Set bankaccountid
     *
     * @param integer $bankaccountid
     *
     * @return Walletdepositaudits
     */
    public function setBankaccountid($bankaccountid)
    {
        $this->bankaccountid = $bankaccountid;

        return $this;
    }

    /**
     * Get bankaccountid
     *
     * @return integer
     */
    public function getBankaccountid()
    {
        return $this->bankaccountid;
    }

    /**
     * Set deposituntil
     *
     * @param \DateTime $deposituntil
     *
     * @return Walletdepositaudits
     */
    public function setDeposituntil($deposituntil)
    {
        $this->deposituntil = $deposituntil;

        return $this;
    }

    /**
     * Get deposituntil
     *
     * @return \DateTime
     */
    public function getDeposituntil()
    {
        return $this->deposituntil;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Walletdepositaudits
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set audittype
     *
     * @param integer $audittype
     *
     * @return Walletdepositaudits
     */
    public function setAudittype($audittype)
    {
        $this->audittype = $audittype;

        return $this;
    }

    /**
     * Get audittype
     *
     * @return integer
     */
    public function getAudittype()
    {
        return $this->audittype;
    }

    /**
     * Set daddypaydepositid
     *
     * @param integer $daddypaydepositid
     *
     * @return Walletdepositaudits
     */
    public function setDaddypaydepositid($daddypaydepositid)
    {
        $this->daddypaydepositid = $daddypaydepositid;

        return $this;
    }

    /**
     * Get daddypaydepositid
     *
     * @return integer
     */
    public function getDaddypaydepositid()
    {
        return $this->daddypaydepositid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Walletdepositaudits
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }

    /**
     * Get createdbyid
     *
     * @return string
     */
    public function getCreatedbyid()
    {
        return $this->createdbyid;
    }

    /**
     * Set modifiedbyid
     *
     * @param string $modifiedbyid
     *
     * @return Walletdepositaudits
     */
    public function setModifiedbyid($modifiedbyid)
    {
        $this->modifiedbyid = $modifiedbyid;

        return $this;
    }

    /**
     * Get modifiedbyid
     *
     * @return string
     */
    public function getModifiedbyid()
    {
        return $this->modifiedbyid;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     *
     * @return Walletdepositaudits
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set datemodified
     *
     * @param \DateTime $datemodified
     *
     * @return Walletdepositaudits
     */
    public function setDatemodified($datemodified)
    {
        $this->datemodified = $datemodified;

        return $this;
    }

    /**
     * Get datemodified
     *
     * @return \DateTime
     */
    public function getDatemodified()
    {
        return $this->datemodified;
    }

    /**
     * Set activerecord
     *
     * @param boolean $activerecord
     *
     * @return Walletdepositaudits
     */
    public function setActiverecord($activerecord)
    {
        $this->activerecord = $activerecord;

        return $this;
    }

    /**
     * Get activerecord
     *
     * @return boolean
     */
    public function getActiverecord()
    {
        return $this->activerecord;
    }

    /**
     * Set requireddepositforbonus
     *
     * @param string $requireddepositforbonus
     *
     * @return Walletdepositaudits
     */
    public function setRequireddepositforbonus($requireddepositforbonus)
    {
        $this->requireddepositforbonus = $requireddepositforbonus;

        return $this;
    }

    /**
     * Get requireddepositforbonus
     *
     * @return string
     */
    public function getRequireddepositforbonus()
    {
        return $this->requireddepositforbonus;
    }
}
