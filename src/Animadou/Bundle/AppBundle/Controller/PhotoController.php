<?php

namespace Animadou\Bundle\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhotoController extends Controller
{
    public function listAction()
    {
        $albums = $this->get('animadou_app.album_manager')->getFindByQueryBuilder()->getQuery()->execute();

        return $this->render('AnimadouAppBundle:Photo:list.html.twig', ['albums' => $albums]);
    }

    public function showAction()
    {
        $album = $this->get('animadou_app.album_manager')->getOneBy(['a.id' => $this->getRequest()->attributes->get('id')]);

        return $this->render('AnimadouAppBundle:Photo:show.html.twig', ['album' => $album]);
    }
}
