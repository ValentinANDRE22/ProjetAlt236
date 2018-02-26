<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LiaisonMusique
 *
 * @ORM\Table(name="liaison_musique")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\LiaisonMusiqueRepository")
 */
class LiaisonMusique
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
     * @ORM\ManyToOne(targetEntity="Musique")
     * @ORM\JoinColumn(name="musique_id", referencedColumnName="id")
     */
    private $musique;
    
      /**
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     */
    private $video;

    /**
     * @var string
     *
     * @ORM\Column(name="timer", type="string", length=8)
     */
    private $timer;


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
     * Set timer
     *
     * @param string $timer
     *
     * @return LiaisonMusique
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
     * Set musique
     *
     * @param \AdminBundle\Entity\Musique $musique
     *
     * @return LiaisonMusique
     */
    public function setMusique(\AdminBundle\Entity\Musique $musique = null)
    {
        $this->musique = $musique;

        return $this;
    }

    /**
     * Get musique
     *
     * @return \AdminBundle\Entity\Musique
     */
    public function getMusique()
    {
        return $this->musique;
    }

    /**
     * Set video
     *
     * @param \AdminBundle\Entity\Video $video
     *
     * @return LiaisonMusique
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
    
    public  function __toString() {
        return  $this->musique->getTitre();
    }
}
