<?php

namespace Ani\CmfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Msi\CmfBundle\Entity\Page as BasePage;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Page extends BasePage
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Block", mappedBy="pages")
     */
    protected $blocks;

    /**
     * @ORM\ManyToOne(targetEntity="Site")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $site;

    /**
     * @ORM\OneToMany(targetEntity="PageTranslation", mappedBy="object", cascade={"persist", "remove"})
     */
    protected $translations;

    /**
     * @ORM\OneToMany(targetEntity="Ani\CoreBundle\Entity\PageSlide", mappedBy="page", cascade={"persist", "remove"})
     */
    protected $slides;

    public function __construct()
    {
        parent::__construct();
        $this->slides = new ArrayCollection();
    }

    public function getSlides()
    {
        return $this->slides;
    }

    public function setSlides($slides)
    {
        $this->slides = $slides;

        return $this;
    }
}
