<?php

namespace Ani\CoreBundle\Admin;

use Msi\CmfBundle\Admin\Admin;
use Msi\CmfBundle\Grid\GridBuilder;
use Symfony\Component\Form\FormBuilder;

class AlbumAdmin extends Admin
{
    public function buildGrid(GridBuilder $builder)
    {
        $builder
            ->add('published', 'boolean')
            ->add('name')
            ->add('', 'action')
        ;
    }

    public function buildTranslationForm(FormBuilder $builder)
    {
        $builder
            ->add('name')
        ;
    }
}
