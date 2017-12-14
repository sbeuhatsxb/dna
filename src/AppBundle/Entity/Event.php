<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="theme", type="string", length=255)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionComplementaire", type="text", nullable=true)
     */
    private $descriptionComplementaire;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="string", length=255)
     */
    private $cp;

    /**
    *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Ville", inversedBy="events")
    *@ORM\JoinColumn(nullable=true)
    */
    private $ville;

    /**
     *
     * @ORM\Column(name="horaire", type="string", length=255)
     */
    private $horaire;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_participants", type="integer")
     */
    private $nbParticipants;

    /**
    *@ORM\ManyToMany(targetEntity="AppBundle\Entity\Etre")
    *@ORM\JoinColumn(nullable=false)
    */
    private $etres;

    /**
    *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Espace")
    *@ORM\JoinColumn(nullable=true)
    */
    private $espace;



    public function __toString()
    {
        return $this->titre . " " . $this->theme . " " . $this->description . " " . $this->horaire;
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
     * Set theme
     *
     * @param string $theme
     *
     * @return Event
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Event
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Event
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Event
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return Event
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Event
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set horaire
     *
     * @param \DateTime $horaire
     *
     * @return Event
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * Get horaire
     *
     * @return \DateTime
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Event
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set nbParticipants
     *
     * @param integer $nbParticipants
     *
     * @return Event
     */
    public function setNbParticipants($nbParticipants)
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    /**
     * Get nbParticipants
     *
     * @return int
     */
    public function getNbParticipants()
    {
        return $this->nbParticipants;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->espace = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add etre
     *
     * @param \AppBundle\Entity\Etre $etre
     *
     * @return Event
     */
    public function addEtre(\AppBundle\Entity\Etre $etre)
    {
        $this->etres[] = $etre;

        return $this;
    }

    /**
     * Remove etre
     *
     * @param \AppBundle\Entity\Etre $etre
     */
    public function removeEtre(\AppBundle\Entity\Etre $etre)
    {
        $this->etres->removeElement($etre);
    }

    /**
     * Get etres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtres()
    {
        return $this->etres;
    }

    /**
     * Add espace
     *
     * @param \AppBundle\Entity\Espace $espace
     *
     * @return Event
     */
    public function addEspace(\AppBundle\Entity\Espace $espace)
    {
        $this->espace[] = $espace;

        return $this;
    }

    /**
     * Remove espace
     *
     * @param \AppBundle\Entity\Espace $espace
     */
    public function removeEspace(\AppBundle\Entity\Espace $espace)
    {
        $this->espace->removeElement($espace);
    }

    /**
     * Get espace
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEspace()
    {
        return $this->espace;
    }

    /**
     * Set descriptionComplementaire
     *
     * @param string $descriptionComplementaire
     *
     * @return Event
     */
    public function setDescriptionComplementaire($descriptionComplementaire)
    {
        $this->descriptionComplementaire = $descriptionComplementaire;

        return $this;
    }

    /**
     * Get descriptionComplementaire
     *
     * @return string
     */
    public function getDescriptionComplementaire()
    {
        return $this->descriptionComplementaire;
    }

    /**
     * Set espace
     *
     * @param \AppBundle\Entity\Espace $espace
     *
     * @return Event
     */
    public function setEspace(\AppBundle\Entity\Espace $espace = null)
    {
        $this->espace = $espace;

        return $this;
    }
}
