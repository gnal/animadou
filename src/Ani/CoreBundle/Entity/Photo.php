<?php

namespace Ani\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Msi\CmfBundle\Tools\Cutter;

use Msi\CmfBundle\Doctrine\Extension\Uploadable\UploadableInterface;
use Msi\CmfBundle\Doctrine\Extension\Timestampable\TimestampableInterface;

/**
 * @ORM\Entity
 */
class Photo implements TimestampableInterface, UploadableInterface
{
    use \Msi\CmfBundle\Doctrine\Extension\Uploadable\Traits\UploadableEntity;
    use \Msi\CmfBundle\Doctrine\Extension\Timestampable\Traits\TimestampableEntity;

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
     * @ORM\Column(type="integer")
     */
    protected $position;

    /**
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="photos")
     */
    protected $album;

    public function __construct()
    {
        $this->published = false;
        $this->position = 1;
    }

    public function getUploadDir()
    {
        return 'photos';
    }

    public function processFile(\SplFileInfo $file)
    {
        $cutter = new Cutter($file);

        $cutter->resizeProp(600)->save();
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;

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

    public function getAlbum()
    {
        return $this->album;
    }

    public function setAlbum($album)
    {
        $this->album = $album;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return (string) $this->id;
    }
}
