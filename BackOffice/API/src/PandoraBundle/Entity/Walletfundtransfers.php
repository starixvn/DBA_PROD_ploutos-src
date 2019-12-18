<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use PandoraBundle\Annotations\EnumFieldAnnotation;

/**
 * Walletfundtransfers
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="TransactionNo")
 * @ORM\Table(name="WalletFundTransfers")
 * @ORM\Entity
 */
class Walletfundtransfers
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
     * @ORM\Column(name="SourceWalletId", type="bigint", nullable=false)
     */
    private $SourceWalletId = '0';
    
    /**
     *
     * Many Wallet Fund Transfer to One Wallet
     *
     * @ORM\ManyToOne(targetEntity="Wallets")
     * @ORM\JoinColumn(name="SourceWalletId", referencedColumnName="Id")
     */
    private $SourceWallet;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="DestinationWalletId", type="bigint", nullable=false)
     */
    private $DestinationWalletId = '0';

    /**
     *
     * Many Wallet Fund Transfer to One Wallet
     *
     * @ORM\ManyToOne(targetEntity="Wallets")
     * @ORM\JoinColumn(name="DestinationWalletId", referencedColumnName="Id")
     */
    private $DestinationWallet;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="AgentId", type="bigint", nullable=false)
     */
    private $AgentId = '0';
    
    /**
     *
     * Many Wallet Fund Transfer to Agent
     *
     * @ORM\ManyToOne(targetEntity="Agents")
     * @ORM\JoinColumn(name="AgentId", referencedColumnName="Id")
     */
    private $Agent;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="SubAgentId", type="bigint", nullable=false)
     */
    private $SubAgentId = '0';
    
    /**
     *
     * Many Wallet Fund Transfer to SubAgent
     *
     * @ORM\ManyToOne(targetEntity="Subagents")
     * @ORM\JoinColumn(name="AgentId", referencedColumnName="Id")
     */
    private $SubAgent;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="PlayertId", type="bigint", nullable=false)
     */
    private $PlayertId = '0';
    
    /**
     *
     * Many Wallet Fund Transfer to Player Profile
     *
     * @ORM\ManyToOne(targetEntity="Playerprofiles")
     * @ORM\JoinColumn(name="PlayertId", referencedColumnName="Id")
     */
    private $PlayerProfile;
    
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
     * @ORM\Column(name="TransferAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $TransferAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="CreditAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $CreditAmount = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="DebitAmount", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $DebitAmount = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=200, nullable=true)
     */
    private $Remarks;

    /**
     * @var integer
     *
     * @EnumFieldAnnotation(eNumClass="FundTransferTypeEnum")
     * @ORM\Column(name="FundTransferType", type="integer", nullable=false)
     */
    private $FundTransferType = '0';

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
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set SourceWalletId
     *
     * @param integer $SourceWalletId
     *
     * @return Walletfundtransfers
     */
    public function setSourceWalletId($SourceWalletId)
    {
        $this->SourceWalletId = $SourceWalletId;

        return $this;
    }

    /**
     * Get SourceWalletId
     *
     * @return integer
     */
    public function getSourceWalletId()
    {
        return $this->SourceWalletId;
    }

    /**
     * Set DestinationWalletId
     *
     * @param integer $DestinationWalletId
     *
     * @return Walletfundtransfers
     */
    public function setDestinationWalletId($DestinationWalletId)
    {
        $this->DestinationWalletId = $DestinationWalletId;

        return $this;
    }

    /**
     * Get DestinationWalletId
     *
     * @return integer
     */
    public function getDestinationWalletId()
    {
        return $this->DestinationWalletId;
    }

    /**
     * Set AgentId
     *
     * @param integer $AgentId
     *
     * @return Walletfundtransfers
     */
    public function setAgentId($AgentId)
    {
        $this->AgentId = $AgentId;

        return $this;
    }

    /**
     * Get AgentId
     *
     * @return integer
     */
    public function getAgentId()
    {
        return $this->AgentId;
    }

    /**
     * Set SubAgentId
     *
     * @param integer $SubAgentId
     *
     * @return Walletfundtransfers
     */
    public function setSubAgentId($SubAgentId)
    {
        $this->SubAgentId = $SubAgentId;

        return $this;
    }

    /**
     * Get SubAgentId
     *
     * @return integer
     */
    public function getSubAgentId()
    {
        return $this->SubAgentId;
    }

    /**
     * Set PlayertId
     *
     * @param integer $PlayertId
     *
     * @return Walletfundtransfers
     */
    public function setPlayertId($PlayertId)
    {
        $this->PlayertId = $PlayertId;

        return $this;
    }

    /**
     * Get PlayertId
     *
     * @return integer
     */
    public function getPlayertId()
    {
        return $this->PlayertId;
    }

    /**
     * Set TransactionNo
     *
     * @param string $TransactionNo
     *
     * @return Walletfundtransfers
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
     * @return Walletfundtransfers
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
     * Set TransferAmount
     *
     * @param string $TransferAmount
     *
     * @return Walletfundtransfers
     */
    public function setTransferAmount($TransferAmount)
    {
        $this->TransferAmount = $TransferAmount;

        return $this;
    }

    /**
     * Get TransferAmount
     *
     * @return string
     */
    public function getTransferAmount()
    {
        return $this->TransferAmount;
    }

    /**
     * Set CreditAmount
     *
     * @param string $CreditAmount
     *
     * @return Walletfundtransfers
     */
    public function setCreditAmount($CreditAmount)
    {
        $this->CreditAmount = $CreditAmount;

        return $this;
    }

    /**
     * Get CreditAmount
     *
     * @return string
     */
    public function getCreditAmount()
    {
        return $this->CreditAmount;
    }

    /**
     * Set DebitAmount
     *
     * @param string $DebitAmount
     *
     * @return Walletfundtransfers
     */
    public function setDebitAmount($DebitAmount)
    {
        $this->DebitAmount = $DebitAmount;

        return $this;
    }

    /**
     * Get DebitAmount
     *
     * @return string
     */
    public function getDebitAmount()
    {
        return $this->DebitAmount;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Walletfundtransfers
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
     * Set Remarks
     *
     * @param string $Remarks
     *
     * @return Walletfundtransfers
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
     * Set FundTransferType
     *
     * @param integer $FundTransferType
     *
     * @return Walletfundtransfers
     */
    public function setFundTransferType($FundTransferType)
    {
        $this->FundTransferType = $FundTransferType;

        return $this;
    }

    /**
     * Get FundTransferType
     *
     * @return integer
     */
    public function getFundTransferType()
    {
        return $this->FundTransferType;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Walletfundtransfers
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
     * @return Walletfundtransfers
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
     * @return Walletfundtransfers
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
     * @return Walletfundtransfers
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
     * @return Walletfundtransfers
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
     * Set SourceWallet
     *
     * @param \PandoraBundle\Entity\Wallets $SourceWallet
     *
     * @return Walletfundtransfers
     */
    public function setSourceWallet(\PandoraBundle\Entity\Wallets $SourceWallet = null)
    {
        $this->SourceWallet = $SourceWallet;
        
        return $this;
    }
    
    /**
     * Get SourceWallet
     *
     * @return \PandoraBundle\Entity\Wallets
     */
    public function getSourceWallet()
    {
        return $this->SourceWallet;
    }
    
    /**
     * Set DestinationWallet
     *
     * @param \PandoraBundle\Entity\Wallets $DestinationWallet
     *
     * @return Walletfundtransfers
     */
    public function setDestinationWallet(\PandoraBundle\Entity\Wallets $DestinationWallet = null)
    {
        $this->DestinationWallet = $DestinationWallet;
        
        return $this;
    }
    
    /**
     * Get DestinationWallet
     *
     * @return \PandoraBundle\Entity\Wallets
     */
    public function getDestinationWallet()
    {
        return $this->DestinationWallet;
    }
    
    /**
     * Set Agent
     *
     * @param \PandoraBundle\Entity\Agents $Agents
     *
     * @return Walletfundtransfers
     */
    public function setAgent(\PandoraBundle\Entity\Agents $Agents = null)
    {
        $this->Agent = $Agents;
        
        return $this;
    }
    
    /**
     * Get Agent
     *
     * @return \PandoraBundle\Entity\Agents
     */
    public function getAgent()
    {
        return $this->Agent;
    }
    
    /**
     * Set SubAgent
     *
     * @param \PandoraBundle\Entity\Subagents $SubAgents
     *
     * @return Walletfundtransfers
     */
    public function setSubAgent(\PandoraBundle\Entity\Subagents $SubAgents = null)
    {
        $this->SubAgent = $SubAgents;
        
        return $this;
    }
    
    /**
     * Get SubAgent
     *
     * @return \PandoraBundle\Entity\Subagents
     */
    public function getSubAgent()
    {
        return $this->SubAgent;
    }
    
    /**
     * Set PlayerProfile
     *
     * @param \PandoraBundle\Entity\Playerprofiles $PlayerProfile
     *
     * @return Walletfundtransfers
     */
    public function setPlayerProfile(\PandoraBundle\Entity\Playerprofiles $PlayerProfile = null)
    {
        $this->PlayerProfile = $PlayerProfile;
        
        return $this;
    }
    
    /**
     * Get PlayerProfile
     *
     * @return \PandoraBundle\Entity\Playerprofiles
     */
    public function getPlayerProfile()
    {
        return $this->PlayerProfile;
    }
}
