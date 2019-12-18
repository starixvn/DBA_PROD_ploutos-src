<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Gameplatformoauthcredentials
 *
 * @ORM\Table(name="GamePlatformOAuthCredentials", uniqueConstraints={@ORM\UniqueConstraint(name="GamePlatformCode", columns={"GamePlatformCode"})})
 * @UniqueEntity(fields={"BrandCode", "Id"}, message="Game Platform Code already exist.", repositoryMethod="findUniqueViolation")
 * @ORM\Entity(repositoryClass="PandoraBundle\Repository\GamePlatformOAuthCredentialRepository")
 */
class Gameplatformoauthcredentials extends AbstractEntity
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
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=100, minMessage = "Game Platform Code must be at least {{ limit }} characters long", maxMessage = "Game Platform Code cannot be longer than {{ limit }} characters")
     *
     * @ORM\Column(name="GamePlatformCode", type="string", length=100, nullable=true)
     */
    private $GamePlatformCode;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100, minMessage = "Brand Code must be at least {{ limit }} characters long", maxMessage = "Brand Code cannot be longer than {{ limit }} characters")
     * 
     * @ORM\Column(name="BrandCode", type="string", length=100, nullable=true)
     */
    private $BrandCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="RollbaseId", type="bigint", nullable=false)
     */
    private $RollbaseId = '0';

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=100, minMessage = "Client ID must be at least {{ limit }} characters long", maxMessage = "Client ID cannot be longer than {{ limit }} characters")
     *
     * @ORM\Column(name="ClientId", type="string", length=100, nullable=true)
     */
    private $ClientId;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=10, max=100, minMessage = "Client Secret must be at least {{ limit }} characters long", maxMessage = "Client Secret cannot be longer than {{ limit }} characters")
     *
     * @ORM\Column(name="ClientSecret", type="string", length=100, nullable=true)
     */
    private $ClientSecret;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=100, minMessage = "OAuth Base URL Code must be at least {{ limit }} characters long", maxMessage = "OAuth Base URL cannot be longer than {{ limit }} characters")
     *
     * @ORM\Column(name="OAuthBaseUrl", type="string", length=100, nullable=true)
     */
    private $OAuthBaseUrl;

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
     * Set GamePlatformCode
     *
     * @param string $GamePlatformCode
     *
     * @return Gameplatformoauthcredentials
     */
    public function setGamePlatformCode($GamePlatformCode)
    {
        $this->GamePlatformCode = $GamePlatformCode;

        return $this;
    }

    /**
     * Get GamePlatformCode
     *
     * @return string
     */
    public function getGamePlatformCode()
    {
        return $this->GamePlatformCode;
    }

    /**
     * Set BrandCode
     *
     * @param string $BrandCode
     *
     * @return Gameplatformoauthcredentials
     */
    public function setBrandCode($BrandCode)
    {
        $this->BrandCode = $BrandCode;

        return $this;
    }

    /**
     * Get BrandCode
     *
     * @return string
     */
    public function getBrandCode()
    {
        return $this->BrandCode;
    }

    /**
     * Set RollbaseId
     *
     * @param integer $RollbaseId
     *
     * @return Gameplatformoauthcredentials
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
     * Set ClientId
     *
     * @param string $ClientId
     *
     * @return Gameplatformoauthcredentials
     */
    public function setClientId($ClientId)
    {
        $this->ClientId = $ClientId;

        return $this;
    }

    /**
     * Get ClientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->ClientId;
    }

    /**
     * Set ClientSecret
     *
     * @param string $ClientSecret
     *
     * @return Gameplatformoauthcredentials
     */
    public function setClientSecret($ClientSecret)
    {
        $this->ClientSecret = $ClientSecret;

        return $this;
    }

    /**
     * Get ClientSecret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->ClientSecret;
    }

    /**
     * Set OAuthBaseUrl
     *
     * @param string $OAuthBaseUrl
     *
     * @return Gameplatformoauthcredentials
     */
    public function setOAuthBaseUrl($OAuthBaseUrl)
    {
        $this->OAuthBaseUrl = $OAuthBaseUrl;

        return $this;
    }

    /**
     * Get OAuthBaseUrl
     *
     * @return string
     */
    public function getOAuthBaseUrl()
    {
        return $this->OAuthBaseUrl;
    }

    /**
     * Set CreatedById
     *
     * @param string $CreatedById
     *
     * @return Gameplatformoauthcredentials
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
     * @return Gameplatformoauthcredentials
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
     * @return Gameplatformoauthcredentials
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
     * @return Gameplatformoauthcredentials
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
     * @return Gameplatformoauthcredentials
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
