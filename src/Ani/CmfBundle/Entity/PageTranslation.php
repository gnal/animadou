<?php

namespace Ani\CmfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Msi\CmfBundle\Entity\PageTranslation as BasePageTranslation;

/**
 * @ORM\Entity
 */
class PageTranslation extends BasePageTranslation
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="translations")
     */
    protected $object;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $sliderTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $sliderText;

    public function getSliderTitle()
    {
        return $this->sliderTitle;
    }

    public function setSliderTitle($sliderTitle)
    {
        $this->sliderTitle = $sliderTitle;

        return $this;
    }

    public function getSliderText()
    {
        return $this->sliderText;
    }

    public function setSliderText($sliderText)
    {
        $this->sliderText = $sliderText;

        return $this;
    }
}
