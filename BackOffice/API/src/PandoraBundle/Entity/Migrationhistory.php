<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migrationhistory
 *
 * @ORM\Table(name="__MigrationHistory")
 * @ORM\Entity
 */
class Migrationhistory
{
    /**
     * @var string
     *
     * @ORM\Column(name="MigrationId", type="string", length=100)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $migrationid;

    /**
     * @var string
     *
     * @ORM\Column(name="ContextKey", type="string", length=200)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $contextkey;

    /**
     * @var string
     *
     * @ORM\Column(name="Model", type="blob", nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductVersion", type="string", length=32, nullable=false)
     */
    private $productversion;



    /**
     * Set migrationid
     *
     * @param string $migrationid
     *
     * @return Migrationhistory
     */
    public function setMigrationid($migrationid)
    {
        $this->migrationid = $migrationid;

        return $this;
    }

    /**
     * Get migrationid
     *
     * @return string
     */
    public function getMigrationid()
    {
        return $this->migrationid;
    }

    /**
     * Set contextkey
     *
     * @param string $contextkey
     *
     * @return Migrationhistory
     */
    public function setContextkey($contextkey)
    {
        $this->contextkey = $contextkey;

        return $this;
    }

    /**
     * Get contextkey
     *
     * @return string
     */
    public function getContextkey()
    {
        return $this->contextkey;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Migrationhistory
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set productversion
     *
     * @param string $productversion
     *
     * @return Migrationhistory
     */
    public function setProductversion($productversion)
    {
        $this->productversion = $productversion;

        return $this;
    }

    /**
     * Get productversion
     *
     * @return string
     */
    public function getProductversion()
    {
        return $this->productversion;
    }
}
