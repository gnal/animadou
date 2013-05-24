<?php

namespace Ani\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    public function indexAction()
    {
        $albums = $this->get('ani_core.album_manager')->getFindByQueryBuilder(
            ['a.published' => true],
            ['a.photos' => 'p'],
            ['p.position' => 'ASC']
        )->getQuery()->execute();

        return $this->render('AniCoreBundle:Album:index.html.twig', [
            'albums' => $albums,
        ]);
    }
}
