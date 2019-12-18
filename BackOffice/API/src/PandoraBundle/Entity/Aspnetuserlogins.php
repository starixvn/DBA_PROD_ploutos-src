<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aspnetuserlogins
 *
 * @ORM\Table(name="AspNetUserLogins", indexes={@ORM\Index(name="ApplicationUser_Logins", columns={"UserId"})})
 * @ORM\Entity
 */
class Aspnetuserlogins
{
    /**
     * @var string
     *
     * @ORM\Column(name="LoginProvider", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $LoginProvider;

    /**
     * @var string
     *
     * @ORM\Column(name="ProviderKey", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ProviderKey;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $UserId;



    /**
     * Set LoginProvider
     *
     * @param string $LoginProvider
     *
     * @return Aspnetuserlogins
     */
    public function setLoginProvider($LoginProvider)
    {
        $this->LoginProvider = $LoginProvider;

        return $this;
    }

    /**
     * Get LoginProvider
     *
     * @return string
     */
    public function getLoginProvider()
    {
        return $this->LoginProvider;
    }

    /**
     * Set ProviderKey
     *
     * @param string $ProviderKey
     *
     * @return Aspnetuserlogins
     */
    public function setProviderKey($ProviderKey)
    {
        $this->ProviderKey = $ProviderKey;

        return $this;
    }

    /**
     * Get ProviderKey
     *
     * @return string
     */
    public function getProviderKey()
    {
        return $this->ProviderKey;
    }

    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Aspnetuserlogins
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
}
