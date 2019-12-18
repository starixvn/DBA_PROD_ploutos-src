<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aspnetroles
 *
 * @ORM\Table(name="AspNetRoles")
 * @ORM\Entity
 */
class Aspnetroles
{
    /**
     * @var string
     *
     * @ORM\Column(name="Id", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=256, nullable=false)
     */
    private $Name;



    /**
     * Get Id
     *
     * @return string
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
     * @return Aspnetroles
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
}
