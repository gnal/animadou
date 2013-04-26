<?php

namespace Ani\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Msi\CmfBundle\Tools\Cutter;

use Msi\CmfBundle\Doctrine\Extension\Uploadable\UploadableInterface;
use Msi\CmfBundle\Doctrine\Extension\Timestampable\TimestampableInterface;

/**
 * @ORM\Entity
 */
class PageSlide implements TimestampableInterface, UploadableInterface
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
     * @ORM\ManyToOne(targetEntity="Ani\CmfBundle\Entity\Page", inversedBy="slides")
     */
    protected $page;

    public function __construct()
    {
        $this->published = false;
        $this->position = 1;
    }

    public function getUploadDir()
    {
        return 'pageslides';
    }

    public function processFile(\SplFileInfo $file)
    {
        $cutter = new Cutter($file);

        $cutter->resize(539, 199)->save();
        $cutter->resize(100, 49)->save('t');
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page = $page;

        return $this;
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

    public function getId()
    {
        return $this->id;
    }
}
