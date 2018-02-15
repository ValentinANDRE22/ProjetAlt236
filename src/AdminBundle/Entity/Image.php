<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="timer", type="string", length=8)
     */
    private $timer;
    
    /**
     * @ORM\ManyToOne(targetEntity="Video", inversedBy="image")
     */
    private $video;

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
     * @return Image
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
     * @return Image
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
     * Set lien
     *
     * @param string $lien
     *
     * @return Image
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
     * Set timer
     *
     * @param string $timer
     *
     * @return Image
     */
    public function setTimer($timer)
    {
        $this->timer = $timer;

        return $this;
    }

    /**
     * Get timer
     *
     * @return string
     */
    public function getTimer()
    {
        return $this->timer;
    }

    /**
     * Set dateCrea
     *
     * @param \DateTime $dateCrea
     *
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * Set video
     *
     * @param \AdminBundle\Entity\Video $video
     *
     * @return Image
     */
    public function setVideo(\AdminBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \AdminBundle\Entity\Video
     */
    public function getVideo()
    {
        return $this->video;
    }
}
