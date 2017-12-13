<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etre
 *
 * @ORM\Table(name="etre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtreRepository")
 */
class Etre
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
     * @ORM\Column(name="tout", type="string", length=100)
     */
    private $tout;

    /**
     * @var string
     *
     * @ORM\Column(name="emerveillé", type="string", length=100)
     */
    private $emerveille;

    /**
     * @var string
     *
     * @ORM\Column(name="aventurier", type="string", length=100)
     */
    private $aventurier;

    /**
     * @var string
     *
     * @ORM\Column(name="spectateur", type="string", length=100)
     */
    private $spectateur;

    /**
     * @var string
     *
     * @ORM\Column(name="gourmand", type="string", length=100)
     */
    private $gourmand;

    /**
     * @var string
     *
     * @ORM\Column(name="curieux", type="string", length=100)
     */
    private $curieux;

    /**
     * @var string
     *
     * @ORM\Column(name="instruit", type="string", length=100)
     */
    private $instruit;

    /**
     * @var string
     *
     * @ORM\Column(name="généreux", type="string", length=100)
     */
    private $genereux;

    /**
     * @var string
     *
     * @ORM\Column(name="joueur", type="string", length=100)
     */
    private $joueur;

    /**
     * @var string
     *
     * @ORM\Column(name="chineur", type="string", length=100)
     */
    private $chineur;

    /**
     * @var string
     *
     * @ORM\Column(name="sportif", type="string", length=100)
     */
    private $sportif;

    /**
     * @var string
     *
     * @ORM\Column(name="danseur", type="string", length=100)
     */
    private $danseur;

    /**
     * @var string
     *
     * @ORM\Column(name="sociable", type="string", length=100)
     */
    private $sociable;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tout
     *
     * @param string $tout
     *
     * @return Etre
     */
    public function setTout($tout)
    {
        $this->tout = $tout;

        return $this;
    }

    /**
     * Get tout
     *
     * @return string
     */
    public function getTout()
    {
        return $this->tout;
    }

    /**
     * Set emerveille
     *
     * @param string $emerveille
     *
     * @return Etre
     */
    public function setEmerveille($emerveille)
    {
        $this->emerveille = $emerveille;

        return $this;
    }

    /**
     * Get emerveille
     *
     * @return string
     */
    public function getEmerveille()
    {
        return $this->emerveille;
    }

    /**
     * Set aventurier
     *
     * @param string $aventurier
     *
     * @return Etre
     */
    public function setAventurier($aventurier)
    {
        $this->aventurier = $aventurier;

        return $this;
    }

    /**
     * Get aventurier
     *
     * @return string
     */
    public function getAventurier()
    {
        return $this->aventurier;
    }

    /**
     * Set spectateur
     *
     * @param string $spectateur
     *
     * @return Etre
     */
    public function setSpectateur($spectateur)
    {
        $this->spectateur = $spectateur;

        return $this;
    }

    /**
     * Get spectateur
     *
     * @return string
     */
    public function getSpectateur()
    {
        return $this->spectateur;
    }

    /**
     * Set gourmand
     *
     * @param string $gourmand
     *
     * @return Etre
     */
    public function setGourmand($gourmand)
    {
        $this->gourmand = $gourmand;

        return $this;
    }

    /**
     * Get gourmand
     *
     * @return string
     */
    public function getGourmand()
    {
        return $this->gourmand;
    }

    /**
     * Set curieux
     *
     * @param string $curieux
     *
     * @return Etre
     */
    public function setCurieux($curieux)
    {
        $this->curieux = $curieux;

        return $this;
    }

    /**
     * Get curieux
     *
     * @return string
     */
    public function getCurieux()
    {
        return $this->curieux;
    }

    /**
     * Set instruit
     *
     * @param string $instruit
     *
     * @return Etre
     */
    public function setInstruit($instruit)
    {
        $this->instruit = $instruit;

        return $this;
    }

    /**
     * Get instruit
     *
     * @return string
     */
    public function getInstruit()
    {
        return $this->instruit;
    }

    /**
     * Set genereux
     *
     * @param string $genereux
     *
     * @return Etre
     */
    public function setGenereux($genereux)
    {
        $this->genereux = $genereux;

        return $this;
    }

    /**
     * Get genereux
     *
     * @return string
     */
    public function getGenereux()
    {
        return $this->genereux;
    }

    /**
     * Set joueur
     *
     * @param string $joueur
     *
     * @return Etre
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get joueur
     *
     * @return string
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set chineur
     *
     * @param string $chineur
     *
     * @return Etre
     */
    public function setChineur($chineur)
    {
        $this->chineur = $chineur;

        return $this;
    }

    /**
     * Get chineur
     *
     * @return string
     */
    public function getChineur()
    {
        return $this->chineur;
    }

    /**
     * Set sportif
     *
     * @param string $sportif
     *
     * @return Etre
     */
    public function setSportif($sportif)
    {
        $this->sportif = $sportif;

        return $this;
    }

    /**
     * Get sportif
     *
     * @return string
     */
    public function getSportif()
    {
        return $this->sportif;
    }

    /**
     * Set danseur
     *
     * @param string $danseur
     *
     * @return Etre
     */
    public function setDanseur($danseur)
    {
        $this->danseur = $danseur;

        return $this;
    }

    /**
     * Get danseur
     *
     * @return string
     */
    public function getDanseur()
    {
        return $this->danseur;
    }

    /**
     * Set sociable
     *
     * @param string $sociable
     *
     * @return Etre
     */
    public function setSociable($sociable)
    {
        $this->sociable = $sociable;

        return $this;
    }

    /**
     * Get sociable
     *
     * @return string
     */
    public function getSociable()
    {
        return $this->sociable;
    }
}
