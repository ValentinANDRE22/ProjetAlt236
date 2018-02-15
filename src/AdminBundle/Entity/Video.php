<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\VideoRepository")
 */
class Video
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
     * @var text
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lienYoutube", type="string", length=255, nullable=true)
     */
    private $lienYoutube;

    /**
     * @var string
     *
     * @ORM\Column(name="lienYoutubeFrame", type="string", length=255, nullable=true)
     */
    private $lienYoutubeFrame;

    /**
     * @var bool
     *
     * @ORM\Column(name="new", type="boolean")
     */
    private $new;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;
    
     /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="video")
     */
    private $image;

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
     * @return Video
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
     * @return Video
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
     * Set lienYoutube
     *
     * @param string $lienYoutube
     *
     * @return Video
     */
    public function setLienYoutube($lienYoutube)
    {
        $this->lienYoutube = $lienYoutube;

        return $this;
    }

    /**
     * Get lienYoutube
     *
     * @return string
     */
    public function getLienYoutube()
    {
        return $this->lienYoutube;
    }

    /**
     * Set lienYoutubeFrame
     *
     * @param string $lienYoutubeFrame
     *
     * @return Video
     */
    public function setLienYoutubeFrame($lienYoutubeFrame)
    {
        $this->lienYoutubeFrame = $lienYoutubeFrame;

        return $this;
    }

    /**
     * Get lienYoutubeFrame
     *
     * @return string
     */
    public function getLienYoutubeFrame()
    {
        return $this->lienYoutubeFrame;
    }

    /**
     * Set new
     *
     * @param boolean $new
     *
     * @return Video
     */
    public function setNew($new)
    {
        $this->new = $new;

        return $this;
    }

    /**
     * Get new
     *
     * @return bool
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Video
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return bool
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set dateCrea
     *
     * @param \DateTime $dateCrea
     *
     * @return Video
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
     * @return Video
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
     * @return Video
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
        $this->image = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \AdminBundle\Entity\Image $image
     *
     * @return Video
     */
    public function addImage(\AdminBundle\Entity\Image $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AdminBundle\Entity\Image $image
     */
    public function removeImage(\AdminBundle\Entity\Image $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImage()
    {
        return $this->image;
    }
}
