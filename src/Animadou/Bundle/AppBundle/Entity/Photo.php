<?php

namespace Animadou\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Msi\CmfBundle\Doctrine\Extension\Uploadable\UploadableInterface;
use Msi\CmfBundle\Doctrine\Extension\Timestampable\TimestampableInterface;
use Msi\CmfBundle\Tools\Cutter;

/**
 * @ORM\Entity
 */
class Photo implements UploadableInterface, TimestampableInterface
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
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="photos")
     */
    protected $album;

    public function getUploadDir()
    {
        return 'photo/'.$this->getAlbum()->getId();
    }

    public function processFile(\SplFileInfo $file)
    {
        $cutter = new Cutter($file);

        $cutter->resizeProp(540)->save();
        $cutter->resize(114, 114)->save('t');
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
        return (string) '#'.$this->id;
    }
}
