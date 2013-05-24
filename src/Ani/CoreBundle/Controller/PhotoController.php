<?php

namespace Ani\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhotoController extends Controller
{
    public function indexAction()
    {
        $album = $this->get('ani_core.album_manager')->getOneBy(
            ['a.published' => true],
            ['a.photos' => 'p'],
            ['p.position' => 'ASC']
        );

        return $this->render('AniCoreBundle:Photo:index.html.twig', [
            'album' => $album,
        ]);
    }
}
