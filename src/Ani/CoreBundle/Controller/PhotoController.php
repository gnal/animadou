<?php

namespace Ani\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhotoController extends Controller
{
    public function indexAction()
    {
        return $this->render('AniCoreBundle:Photo:index.html.twig');
    }
}
