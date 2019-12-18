<?php

namespace PandoraBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Uniquedepositamountrules
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="RuleName")
 * @ORM\Table(name="UniqueDepositAmountRules", uniqueConstraints={@ORM\UniqueConstraint(name="RuleCode", columns={"RuleCode"})})
 * @UniqueEntity(fields={"RuleCode"}, message="Code already exist")
 * @UniqueEntity(fields={"StartValue", "EndValue", "IncrementValue"}, errorPath="StartValue", message="StartValue, EndValue and Increment Value should be unique.")
 * @ORM\Entity
 */
class Uniquedepositamountrules extends AbstractEntity
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
     * @ORM\Column(name="RuleCode", type="string", length=100, nullable=true)
     */
    private $RuleCode;
    
    /**
     * @var string
     *
     * @ORM\Column(name="RuleName", type="string", length=100, nullable=true)
     */
    private $RuleName;
    
    /**
     * @var string
     *
     * @Assert\Regex(pattern="/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/", match=true, message="StartValue should only contain two decimal values.")
     *
     * @ORM\Column(name="StartValue", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $StartValue;
    
    /**
     * @var string
     *
     * @Assert\Regex(pattern="/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/", match=true, message="EndValue should only contain two decimal values.")
     * @Assert\Expression(expression="this.getEndValue() > this.getStartValue()", message="EndValue must be greater than the StartValue")
     *
     * @ORM\Column(name="EndValue", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $EndValue;
    
    /**
     * @var string
     *
     * @Assert\Regex(pattern="/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/", match=true, message="IncrementValue should only contain two decimal values.")
     * @Assert\GreaterThan(value="0", message="IncrementValue should be greater than 0.")
     *
     * @ORM\Column(name="IncrementValue", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $IncrementValue;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';
    
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
     * Set RuleCode
     *
     * @param string $RuleCode
     *
     * @return Uniquedepositamountrules
     */
    public function setRuleCode($RuleCode)
    {
        $this->RuleCode = $RuleCode;
        
        return $this;
    }
    
    /**
     * Get RuleCode
     *
     * @return string
     */
    public function getRuleCode()
    {
        return $this->RuleCode;
    }
    
    /**
     * Set RuleName
     *
     * @param string $RuleName
     *
     * @return Uniquedepositamountrules
     */
    public function setRuleName($RuleName)
    {
        $this->RuleName = $RuleName;
        
        return $this;
    }
    
    /**
     * Get RuleName
     *
     * @return string
     */
    public function getRuleName()
    {
        return $this->RuleName;
    }
    
    /**
     * Set StartValue
     *
     * @param string $StartValue
     *
     * @return Uniquedepositamountrules
     */
    public function setStartValue($StartValue)
    {
        $this->StartValue = $StartValue;
        
        return $this;
    }
    
    /**
     * Get StartValue
     *
     * @return string
     */
    public function getStartValue()
    {
        return $this->StartValue;
    }
    
    /**
     * Set EndValue
     *
     * @param string $EndValue
     *
     * @return Uniquedepositamountrules
     */
    public function setEndValue($EndValue)
    {
        $this->EndValue = $EndValue;
        
        return $this;
    }
    
    /**
     * Get EndValue
     *
     * @return string
     */
    public function getEndValue()
    {
        return $this->EndValue;
    }
    
    /**
     * Set IncrementValue
     *
     * @param string $IncrementValue
     *
     * @return Uniquedepositamountrules
     */
    public function setIncrementValue($IncrementValue)
    {
        $this->IncrementValue = $IncrementValue;
        
        return $this;
    }
    
    /**
     * Get IncrementValue
     *
     * @return string
     */
    public function getIncrementValue()
    {
        return $this->IncrementValue;
    }
    
    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Uniquedepositamountrules
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
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Uniquedepositamountrules
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
     * @return Uniquedepositamountrules
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
     * @return Uniquedepositamountrules
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
     * @return Uniquedepositamountrules
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
     * @return Uniquedepositamountrules
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
}
