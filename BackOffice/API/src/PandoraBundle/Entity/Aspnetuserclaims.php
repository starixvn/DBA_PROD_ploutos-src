<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aspnetuserclaims
 *
 * @ORM\Table(name="AspNetUserClaims", uniqueConstraints={@ORM\UniqueConstraint(name="Id", columns={"Id"})}, indexes={@ORM\Index(name="UserId", columns={"UserId"})})
 * @ORM\Entity
 */
class Aspnetuserclaims
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=128, nullable=false)
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="ClaimType", type="text", nullable=true)
     */
    private $ClaimType;

    /**
     * @var string
     *
     * @ORM\Column(name="ClaimValue", type="text", nullable=true)
     */
    private $ClaimValue;



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
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Aspnetuserclaims
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set ClaimType
     *
     * @param string $ClaimType
     *
     * @return Aspnetuserclaims
     */
    public function setClaimType($ClaimType)
    {
        $this->ClaimType = $ClaimType;

        return $this;
    }

    /**
     * Get ClaimType
     *
     * @return string
     */
    public function getClaimType()
    {
        return $this->ClaimType;
    }

    /**
     * Set ClaimValue
     *
     * @param string $ClaimValue
     *
     * @return Aspnetuserclaims
     */
    public function setClaimValue($ClaimValue)
    {
        $this->ClaimValue = $ClaimValue;

        return $this;
    }

    /**
     * Get ClaimValue
     *
     * @return string
     */
    public function getClaimValue()
    {
        return $this->ClaimValue;
    }
}
