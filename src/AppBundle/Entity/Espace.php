<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espace
 *
 * @ORM\Table(name="espace")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EspaceRepository")
 */
class Espace
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="interieur", type="boolean")
     */
    private $interieur;

    /**
     * @var bool
     *
     * @ORM\Column(name="exterieur", type="boolean")
     */
    private $exterieur;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set interieur
     *
     * @param boolean $interieur
     *
     * @return Espace
     */
    public function setInterieur($interieur)
    {
        $this->interieur = $interieur;

        return $this;
    }

    /**
     * Get interieur
     *
     * @return bool
     */
    public function getInterieur()
    {
        return $this->interieur;
    }

    /**
     * Set exterieur
     *
     * @param boolean $exterieur
     *
     * @return Espace
     */
    public function setExterieur($exterieur)
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    /**
     * Get exterieur
     *
     * @return bool
     */
    public function getExterieur()
    {
        return $this->exterieur;
    }
}
