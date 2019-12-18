<?php

namespace PandoraBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\MappedSuperclass */
class AbstractEntity
{
    /**
     *
     * Many Entity to Aspuser
     *
     * @ORM\ManyToOne(targetEntity="Aspnetusers")
     * @ORM\JoinColumn(name="CreatedById", referencedColumnName="Id")
     */
    private $CreatedBy;
    
    /**
     *
     * Many Entity to Aspuser
     *
     * @ORM\ManyToOne(targetEntity="Aspnetusers")
     * @ORM\JoinColumn(name="ModifiedById", referencedColumnName="Id")
     */
    private $ModifiedBy;
    
    
    
    
    /**
     * Set Aspnetusers
     *
     * @param \PandoraBundle\Entity\Aspnetusers $CreatedBy
     *
     */
    public function setCreatedBy(\PandoraBundle\Entity\Aspnetusers $CreatedBy = null)
    {
        $this->CreatedBy = $CreatedBy;
        
        return $this;
    }
    
    /**
     * Get Aspnetusers
     *
     * @return \PandoraBundle\Entity\Aspnetusers
     */
    public function getCreatedBy()
    {
        return $this->CreatedBy;
    }
    
    /**
     * Set Aspnetusers
     *
     * @param \PandoraBundle\Entity\Aspnetusers $CreatedBy
     *
     */
    public function setModifiedBy(\PandoraBundle\Entity\Aspnetusers $ModifiedBy = null)
    {
        $this->ModifiedBy = $ModifiedBy;
        
        return $this;
    }
    
    /**
     * Get Aspnetusers
     *
     * @return \PandoraBundle\Entity\Aspnetusers
     */
    public function getModifiedBy()
    {
        return $this->ModifiedBy;
    }
}