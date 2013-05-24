<?php

namespace Ani\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PhotoController extends Controller
{
    public function indexAction()
    {
        $album = $this->get('ani_core.album_manager')->getFindByQueryBuilder(
            ['a.published' => true],
            ['a.photos' => 'p'],
            ['p.position' => 'ASC']
        )->getQuery()->getOneOrNullResult();

        if (!$album) {
            throw new NotFoundHttpException();
        }

        return $this->render('AniCoreBundle:Photo:index.html.twig', [
            'album' => $album,
        ]);
    }
}
