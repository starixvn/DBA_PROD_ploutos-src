<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aspnetusers
 *
 * @ORM\Table(name="AspNetUsers")
 * @ORM\Entity
 */
class Aspnetusers
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
     * @ORM\Column(name="Email", type="string", length=256, nullable=true)
     */
    private $Email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EmailConfirmed", type="boolean", nullable=false)
     */
    private $EmailConfirmed;

    /**
     * @var string
     *
     * @ORM\Column(name="PasswordHash", type="text", nullable=true)
     */
    private $PasswordHash;

    /**
     * @var string
     *
     * @ORM\Column(name="SecurityStamp", type="text", nullable=true)
     */
    private $SecurityStamp;

    /**
     * @var string
     *
     * @ORM\Column(name="PhoneNumber", type="text", nullable=true)
     */
    private $PhoneNumber;

    /**
     * @var boolean
     *
     * @ORM\Column(name="PhoneNumberConfirmed", type="boolean", nullable=false)
     */
    private $PhoneNumberConfirmed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="TwoFactorEnabled", type="boolean", nullable=false)
     */
    private $TwoFactorEnabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LockoutEndDateUtc", type="datetime", nullable=true)
     */
    private $LockoutEndDateUtc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="LockoutEnabled", type="boolean", nullable=false)
     */
    private $LockoutEnabled;

    /**
     * @var integer
     *
     * @ORM\Column(name="AccessFailedCount", type="integer", nullable=false)
     */
    private $AccessFailedCount;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=256, nullable=false)
     */
    private $UserName;



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
     * Set Email
     *
     * @param string $Email
     *
     * @return Aspnetusers
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set EmailConfirmed
     *
     * @param boolean $EmailConfirmed
     *
     * @return Aspnetusers
     */
    public function setEmailConfirmed($EmailConfirmed)
    {
        $this->EmailConfirmed = $EmailConfirmed;

        return $this;
    }

    /**
     * Get EmailConfirmed
     *
     * @return boolean
     */
    public function getEmailConfirmed()
    {
        return $this->EmailConfirmed;
    }

    /**
     * Set PasswordHash
     *
     * @param string $PasswordHash
     *
     * @return Aspnetusers
     */
    public function setPasswordHash($PasswordHash)
    {
        $this->PasswordHash = $PasswordHash;

        return $this;
    }

    /**
     * Get PasswordHash
     *
     * @return string
     */
    public function getPasswordHash()
    {
        return $this->PasswordHash;
    }

    /**
     * Set SecurityStamp
     *
     * @param string $SecurityStamp
     *
     * @return Aspnetusers
     */
    public function setSecurityStamp($SecurityStamp)
    {
        $this->SecurityStamp = $SecurityStamp;

        return $this;
    }

    /**
     * Get SecurityStamp
     *
     * @return string
     */
    public function getSecurityStamp()
    {
        return $this->SecurityStamp;
    }

    /**
     * Set PhoneNumber
     *
     * @param string $PhoneNumber
     *
     * @return Aspnetusers
     */
    public function setPhoneNumber($PhoneNumber)
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    /**
     * Get PhoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }

    /**
     * Set PhoneNumberConfirmed
     *
     * @param boolean $PhoneNumberConfirmed
     *
     * @return Aspnetusers
     */
    public function setPhoneNumberConfirmed($PhoneNumberConfirmed)
    {
        $this->PhoneNumberConfirmed = $PhoneNumberConfirmed;

        return $this;
    }

    /**
     * Get PhoneNumberConfirmed
     *
     * @return boolean
     */
    public function getPhoneNumberConfirmed()
    {
        return $this->PhoneNumberConfirmed;
    }

    /**
     * Set TwoFactorEnabled
     *
     * @param boolean $TwoFactorEnabled
     *
     * @return Aspnetusers
     */
    public function setTwoFactorEnabled($TwoFactorEnabled)
    {
        $this->TwoFactorEnabled = $TwoFactorEnabled;

        return $this;
    }

    /**
     * Get TwoFactorEnabled
     *
     * @return boolean
     */
    public function getTwoFactorEnabled()
    {
        return $this->TwoFactorEnabled;
    }

    /**
     * Set LockoutEndDateUtc
     *
     * @param \DateTime $LockoutEndDateUtc
     *
     * @return Aspnetusers
     */
    public function setLockoutEndDateUtc($LockoutEndDateUtc)
    {
        $this->LockoutEndDateUtc = $LockoutEndDateUtc;

        return $this;
    }

    /**
     * Get LockoutEndDateUtc
     *
     * @return \DateTime
     */
    public function getLockoutEndDateUtc()
    {
        return $this->LockoutEndDateUtc;
    }

    /**
     * Set LockoutEnabled
     *
     * @param boolean $LockoutEnabled
     *
     * @return Aspnetusers
     */
    public function setLockoutEnabled($LockoutEnabled)
    {
        $this->LockoutEnabled = $LockoutEnabled;

        return $this;
    }

    /**
     * Get LockoutEnabled
     *
     * @return boolean
     */
    public function getLockoutEnabled()
    {
        return $this->LockoutEnabled;
    }

    /**
     * Set AccessFailedCount
     *
     * @param integer $AccessFailedCount
     *
     * @return Aspnetusers
     */
    public function setAccessFailedCount($AccessFailedCount)
    {
        $this->AccessFailedCount = $AccessFailedCount;

        return $this;
    }

    /**
     * Get AccessFailedCount
     *
     * @return integer
     */
    public function getAccessFailedCount()
    {
        return $this->AccessFailedCount;
    }

    /**
     * Set UserName
     *
     * @param string $UserName
     *
     * @return Aspnetusers
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;

        return $this;
    }

    /**
     * Get UserName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->UserName;
    }
}
