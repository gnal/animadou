<?php

namespace Ani\CmfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AniCmfBundle:Default:index.html.twig', array('name' => $name));
    }
}
