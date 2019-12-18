<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * Rebatedetails
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="RebateDetailName")
 * @ORM\Table(name="RebateDetails")
 * @ORM\Entity
 */
class Rebatedetails extends AbstractEntity
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
     * 
     * @Assert\NotBlank()
     * 
     * @var integer
     *
     * @ORM\Column(name="RebateId", type="bigint", nullable=false)
     */
    private $RebateId = '0';
    
    /**
     *
     * @Assert\NotBlank()
     * 
     * Many Rebate Detail to One Rebate
     *
     * @ORM\ManyToOne(targetEntity="Rebates")
     * @ORM\JoinColumn(name="RebateId", referencedColumnName="Id")
     */
    private $Rebate;
    
    /**
     * 
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100, minMessage = "Name must be at least {{ limit }} characters long", maxMessage = "Name cannot be longer than {{ limit }} characters")
     * 
     * @var string
     *
     * @ORM\Column(name="RebateDetailName", type="string", length=100, nullable=true)
     */
    private $RebateDetailName;

    /**
     * 
     * @Assert\NotBlank()
     * 
     * @var string
     *
     * @ORM\Column(name="MinimumTotalBets", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $MinimumTotalBets = '0.0000';

    /**
     * 
     * @Assert\NotBlank()
     * 
     * @var string
     *
     * @ORM\Column(name="MaximumTotalBets", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $MaximumTotalBets = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="MaximumRebateAmount", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $MaximumRebateAmount = '0.0000';

    /**
     * 
     * @Assert\NotBlank()
     * 
     * @var string
     *
     * @ORM\Column(name="RebateFactor", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $RebateFactor = '0.0000';

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
     * 
     * @Assert\NotBlank()
     * 
     * @var integer
     *
     * @ORM\Column(name="CurrencyId", type="bigint", nullable=false)
     */
    private $CurrencyId = '0';

    /**
     * 
     * @Assert\NotBlank()
     * 
     * Many Rebate Detail to One Currency
     * 
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumn(name="CurrencyId", referencedColumnName="Id")
     */
    private $Currency;
    
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
     * Set RebateId
     *
     * @param integer $RebateId
     *
     * @return Rebatedetails
     */
    public function setRebateId($RebateId)
    {
        $this->RebateId = $RebateId;

        return $this;
    }

    /**
     * Get RebateId
     *
     * @return integer
     */
    public function getRebateId()
    {
        return $this->RebateId;
    }

    /**
     * Set RebateDetailName
     *
     * @param string $RebateDetailName
     *
     * @return Rebatedetails
     */
    public function setRebateDetailName($RebateDetailName)
    {
        $this->RebateDetailName = $RebateDetailName;

        return $this;
    }

    /**
     * Get RebateDetailName
     *
     * @return string
     */
    public function getRebateDetailName()
    {
        return $this->RebateDetailName;
    }

    /**
     * Set MinimumTotalBets
     *
     * @param string $MinimumTotalBets
     *
     * @return Rebatedetails
     */
    public function setMinimumTotalBets($MinimumTotalBets)
    {
        $this->MinimumTotalBets = $MinimumTotalBets;

        return $this;
    }

    /**
     * Get MinimumTotalBets
     *
     * @return string
     */
    public function getMinimumTotalBets()
    {
        return $this->MinimumTotalBets;
    }

    /**
     * Set MaximumTotalBets
     *
     * @param string $MaximumTotalBets
     *
     * @return Rebatedetails
     */
    public function setMaximumTotalBets($MaximumTotalBets)
    {
        $this->MaximumTotalBets = $MaximumTotalBets;

        return $this;
    }

    /**
     * Get MaximumTotalBets
     *
     * @return string
     */
    public function getMaximumTotalBets()
    {
        return $this->MaximumTotalBets;
    }

    /**
     * Set MaximumRebateAmount
     *
     * @param string $MaximumRebateAmount
     *
     * @return Rebatedetails
     */
    public function setMaximumRebateAmount($MaximumRebateAmount)
    {
        $this->MaximumRebateAmount = $MaximumRebateAmount;

        return $this;
    }

    /**
     * Get MaximumRebateAmount
     *
     * @return string
     */
    public function getMaximumRebateAmount()
    {
        return $this->MaximumRebateAmount;
    }

    /**
     * Set RebateFactor
     *
     * @param string $RebateFactor
     *
     * @return Rebatedetails
     */
    public function setRebateFactor($RebateFactor)
    {
        $this->RebateFactor = $RebateFactor;

        return $this;
    }

    /**
     * Get RebateFactor
     *
     * @return string
     */
    public function getRebateFactor()
    {
        return $this->RebateFactor;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Rebatedetails
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
     * @return Rebatedetails
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
     * @return Rebatedetails
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
     * @return Rebatedetails
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
     * @return Rebatedetails
     */
    public function setActiveRecord($ActiveRecord)
    {
        $this->ActiveRecord = $ActiveRecord;

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
     * Set CurrencyId
     *
     * @param integer $CurrencyId
     *
     * @return Rebatedetails
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
     * @return Rebatedetails
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
     * Set Rebate
     *
     * @param \PandoraBundle\Entity\Rebates $Rebate
     *
     * @return Rebatedetails
     */
    public function setRebate(\PandoraBundle\Entity\Rebates $Rebate = null)
    {
        $this->Rebate = $Rebate;
        
        return $this;
    }
    
    /**
     * Get Rebate
     *
     * @return \PandoraBundle\Entity\Rebates
     */
    public function getRebate()
    {
        return $this->Rebate;
    }
}
