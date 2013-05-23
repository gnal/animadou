<?php

namespace Ani\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Msi\CmfBundle\Doctrine\Extension\Translatable\TranslatableInterface;
use Msi\CmfBundle\Doctrine\Extension\Timestampable\TimestampableInterface;

/**
 * @ORM\Entity
 */
class Album implements TranslatableInterface, TimestampableInterface
{
    use \Msi\CmfBundle\Doctrine\Extension\Timestampable\Traits\TimestampableEntity;
    use \Msi\CmfBundle\Doctrine\Extension\Translatable\Traits\TranslatableEntity;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $published;

    /**
     * @ORM\OneToMany(targetEntity="AlbumTranslation", mappedBy="object", cascade={"persist", "remove"})
     */
    protected $translations;

    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="album", cascade={"persist", "remove"})
     */
    protected $photos;

    public function __construct()
    {
        $this->published = false;
        $this->translations = new ArrayCollection();
        $this->photos = new ArrayCollection();
    }

    public function getPhotos()
    {
        return $this->photos;
    }

    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    public function getTranslations()
    {
        return $this->translations;
    }

    public function setTranslations($translations)
    {
        $this->translations = $translations;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return (string) $this->getTranslation()->getName();
    }
}
