<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VilleRepository")
 */
class Ville
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true, unique=true)
     */
    private $nomVille;

    public function __toString()
    {
        return $this->nomVille;
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Ville
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nomVille
     *
     * @param string $nomVille
     *
     * @return Ville
     */
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    /**
     * Get nomVille
     *
     * @return string
     */
    public function getNomVille()
    {
        return $this->nomVille;
    }
}
