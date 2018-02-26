<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musique
 *
 * @ORM\Table(name="musique")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\MusiqueRepository")
 */
class Musique
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="artiste", type="string", length=255)
     */
    private $artiste;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="string", length=8)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;
    
     /**
     * @ORM\OneToMany(targetEntity="LiaisonMusique", mappedBy="musique")
     */
    private $liaisonMusique;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCrea", type="datetime")
     */
    private $dateCrea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="datetime", nullable=true)
     */
    private $dateModif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="isAlive", type="datetime", nullable=true)
     */
    private $isAlive;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Musique
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
     * Set artiste
     *
     * @param string $artiste
     *
     * @return Musique
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * Get artiste
     *
     * @return string
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * Set duree
     *
     * @param string $duree
     *
     * @return Musique
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Musique
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set dateCrea
     *
     * @param \DateTime $dateCrea
     *
     * @return Musique
     */
    public function setDateCrea($dateCrea)
    {
        $this->dateCrea = $dateCrea;

        return $this;
    }

    /**
     * Get dateCrea
     *
     * @return \DateTime
     */
    public function getDateCrea()
    {
        return $this->dateCrea;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return Musique
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set isAlive
     *
     * @param \DateTime $isAlive
     *
     * @return Musique
     */
    public function setIsAlive($isAlive)
    {
        $this->isAlive = $isAlive;

        return $this;
    }

    /**
     * Get isAlive
     *
     * @return \DateTime
     */
    public function getIsAlive()
    {
        return $this->isAlive;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liaisonMusique = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add liaisonMusique
     *
     * @param \AdminBundle\Entity\LiaisonMusique $liaisonMusique
     *
     * @return Musique
     */
    public function addLiaisonMusique(\AdminBundle\Entity\LiaisonMusique $liaisonMusique)
    {
        $this->liaisonMusique[] = $liaisonMusique;

        return $this;
    }

    /**
     * Remove liaisonMusique
     *
     * @param \AdminBundle\Entity\LiaisonMusique $liaisonMusique
     */
    public function removeLiaisonMusique(\AdminBundle\Entity\LiaisonMusique $liaisonMusique)
    {
        $this->liaisonMusique->removeElement($liaisonMusique);
    }

    /**
     * Get liaisonMusique
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLiaisonMusique()
    {
        return $this->liaisonMusique;
    }
}
