<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PandoraBundle\Annotations\RecordNameFieldAnnotation;

/**
 * product
 *
 * @RecordNameFieldAnnotation(candidateRecordNameField="Name")
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $Id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100)
     */
    private $Name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Price", type="decimal", scale=2)
     */
    private $Price;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $Description;



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
     * Set Name
     *
     * @param string $Name
     *
     * @return Product
     */
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set Price
     *
     * @param string $Price
     *
     * @return Product
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * Get Price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Set Description
     *
     * @param string $Description
     *
     * @return Product
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }
}
