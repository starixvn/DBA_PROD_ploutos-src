<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\GraphQL\Query\AffiliateTransaction\AffiliateTransactionField;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Affiliatetransactions
 * 
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNo")
 * @ORM\Table(name="AffiliateTransactions", uniqueConstraints={@ORM\UniqueConstraint(name="TransactionNo", columns={"TransactionNo"})})
 * @ORM\Entity
 */
class Affiliatetransactions extends AbstractEntity
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
     * @ORM\Column(name="AffiliateId", type="bigint", nullable=false)
     */
    private $AffiliateId = '0';
    
    /**
     *
     * Many Affiliate Transactions to One Affiliate
     *
     * @ORM\ManyToOne(targetEntity="Affiliates")
     * @ORM\JoinColumn(name="AffiliateId", referencedColumnName="Id")
     */
    private $Affiliate;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $TransactionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ApprovedDate", type="datetime", nullable=true)
     */
    private $ApprovedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=100, nullable=true)
     */
    private $TransactionNo;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TransactionAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="ApprovedAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $ApprovedAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="SourcePrevAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $SourcePrevAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="SourceNewAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $SourceNewAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="DestPrevAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $DestPrevAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="DestNewAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $DestNewAmount = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="RefTxnId", type="bigint", nullable=false)
     */
    private $RefTxnId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="AffiliateTransactionTypeEnum")
     * @ORM\Column(name="TxnType", type="integer", nullable=false)
     */
    private $TxnType = '1';

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="AffiliateTransactionStatusTypeEnum")
     * @ORM\Column(name="Status", type="integer", nullable=false)
     */
    private $Status = '1';

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
     * @ORM\Column(name="NeedToSync", type="boolean", nullable=false)
     */
    private $NeedToSync = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerId", type="bigint", nullable=false)
     */
    private $PlayerId = '0';
    
    /**
     *
     * One Affiliate Transaction to One Transaction Grab
     *
     * @ORM\OneToOne(targetEntity="Transactiongrabs")
     * @ORM\JoinColumn(name="Id", referencedColumnName="SourceObjectId"),
     */
    private $TransactionGrabs;
    
//     /**
//      * @var string
//      *
//      * @ORM\Column(name="AssignedTo", type="string", length=100, nullable=true)
//      */
//     private $AssignedTo;


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
     * Set AffiliateId
     *
     * @param integer $AffiliateId
     *
     * @return Affiliatetransactions
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
     * Set TransactionDate
     *
     * @param \DateTime $TransactionDate
     *
     * @return Affiliatetransactions
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
     * Set ApprovedDate
     *
     * @param \DateTime $ApprovedDate
     *
     * @return Affiliatetransactions
     */
    public function setApprovedDate($ApprovedDate)
    {
        $this->ApprovedDate = $ApprovedDate;

        return $this;
    }

    /**
     * Get ApprovedDate
     *
     * @return \DateTime
     */
    public function getApprovedDate()
    {
        return $this->ApprovedDate;
    }

    /**
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Affiliatetransactions
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
     * Set TransactionAmount
     *
     * @param string $TransactionAmount
     *
     * @return Affiliatetransactions
     */
    public function setTransactionAmount($TransactionAmount)
    {
        $this->TransactionAmount = $TransactionAmount;

        return $this;
    }

    /**
     * Get TransactionAmount
     *
     * @return string
     */
    public function getTransactionAmount()
    {
        return $this->TransactionAmount;
    }

    /**
     * Set ApprovedAmount
     *
     * @param string $ApprovedAmount
     *
     * @return Affiliatetransactions
     */
    public function setApprovedAmount($ApprovedAmount)
    {
        $this->ApprovedAmount = $ApprovedAmount;

        return $this;
    }

    /**
     * Get ApprovedAmount
     *
     * @return string
     */
    public function getApprovedAmount()
    {
        return $this->ApprovedAmount;
    }

    /**
     * Set SourcePrevAmount
     *
     * @param string $SourcePrevAmount
     *
     * @return Affiliatetransactions
     */
    public function setSourcePrevAmount($SourcePrevAmount)
    {
        $this->SourcePrevAmount = $SourcePrevAmount;

        return $this;
    }

    /**
     * Get SourcePrevAmount
     *
     * @return string
     */
    public function getSourcePrevAmount()
    {
        return $this->SourcePrevAmount;
    }

    /**
     * Set SourceNewAmount
     *
     * @param string $SourceNewAmount
     *
     * @return Affiliatetransactions
     */
    public function setSourceNewAmount($SourceNewAmount)
    {
        $this->SourceNewAmount = $SourceNewAmount;

        return $this;
    }

    /**
     * Get SourceNewAmount
     *
     * @return string
     */
    public function getSourceNewAmount()
    {
        return $this->SourceNewAmount;
    }

    /**
     * Set DestPrevAmount
     *
     * @param string $DestPrevAmount
     *
     * @return Affiliatetransactions
     */
    public function setDestprevamount($DestPrevAmount)
    {
        $this->DestPrevAmount = $DestPrevAmount;

        return $this;
    }

    /**
     * Get DestPrevAmount
     *
     * @return string
     */
    public function getDestPrevAmount()
    {
        return $this->DestPrevAmount;
    }

    /**
     * Set DestNewAmount
     *
     * @param string $DestNewAmount
     *
     * @return Affiliatetransactions
     */
    public function setDestNewAmount($DestNewAmount)
    {
        $this->DestNewAmount = $DestNewAmount;

        return $this;
    }

    /**
     * Get DestNewAmount
     *
     * @return string
     */
    public function getDestNewAmount()
    {
        return $this->DestNewAmount;
    }

    /**
     * Set RefTxnId
     *
     * @param integer $RefTxnId
     *
     * @return Affiliatetransactions
     */
    public function setRefTxnId($RefTxnId)
    {
        $this->RefTxnId = $RefTxnId;

        return $this;
    }

    /**
     * Get RefTxnId
     *
     * @return integer
     */
    public function getRefTxnId()
    {
        return $this->RefTxnId;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Affiliatetransactions
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
     * Set TxnType
     *
     * @param integer $TxnType
     *
     * @return Affiliatetransactions
     */
    public function setTxnType($TxnType)
    {
        $this->TxnType = $TxnType;

        return $this;
    }

    /**
     * Get TxnType
     *
     * @return integer
     */
    public function getTxnType()
    {
        return $this->TxnType;
    }

    /**
     * Set Status
     *
     * @param integer $Status
     *
     * @return Affiliatetransactions
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Affiliatetransactions
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
     * @return Affiliatetransactions
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
     * @return Affiliatetransactions
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
     * @return Affiliatetransactions
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
     * @return Affiliatetransactions
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
     * Set NeedToSync
     *
     * @param boolean $NeedToSync
     *
     * @return Affiliatetransactions
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
     * Set PlayerId
     *
     * @param integer $PlayerId
     *
     * @return Affiliatetransactions
     */
    public function setPlayerId($PlayerId)
    {
        $this->PlayerId = $PlayerId;

        return $this;
    }

    /**
     * Get PlayerId
     *
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->PlayerId;
    }
    
    /**
     * Set Affiliates
     *
     * @param \AppBundle\Entity\Affiliates $Affiliate
     *
     * @return AffiliateTransactions
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

//      /**
//      * Set AssignedTo
//      *
//      * @param string $AssignedTo
//      *
//      * @return Affiliatecommisions
//      */
//     public function setAssignedTo($AssignedTo)
//     {
//         $this->AssignedTo = $AssignedTo;

//         return $this;
//     }

//     /**
//      * Get AssignedTo
//      *
//      * @return string
//      */
//     public function getAssignedTo()
//     {
//         return $this->AssignedTo;
//     }

    /**
     * Set TransactionGrabs
     *
     * @param \AppBundle\Entity\Transactiongrabs $TransactionGrabs
     *
     * @return AffiliateTransactions
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
