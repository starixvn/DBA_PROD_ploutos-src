<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aspnetuserroles
 *
 * @ORM\Table(name="AspNetUserRoles", indexes={@ORM\Index(name="IdentityRole_Users", columns={"RoleId"})})
 * @ORM\Entity
 */
class Aspnetuserroles
{
    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $UserId;

    /**
     * @var string
     *
     * @ORM\Column(name="RoleId", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $RoleId;



    /**
     * Set UserId
     *
     * @param string $UserId
     *
     * @return Aspnetuserroles
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
     * Set RoleId
     *
     * @param string $RoleId
     *
     * @return Aspnetuserroles
     */
    public function setRoleId($RoleId)
    {
        $this->RoleId = $RoleId;

        return $this;
    }

    /**
     * Get RoleId
     *
     * @return string
     */
    public function getRoleId()
    {
        return $this->RoleId;
    }
}
