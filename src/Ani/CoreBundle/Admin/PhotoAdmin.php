<?php

namespace Ani\CoreBundle\Admin;

use Msi\CmfBundle\Admin\Admin;
use Msi\CmfBundle\Grid\GridBuilder;
use Symfony\Component\Form\FormBuilder;

class PhotoAdmin extends Admin
{
    public function configure()
    {
        $this->options = [
            'icon' => 'picture',
        ];
    }

    public function buildGrid(GridBuilder $builder)
    {
        $builder
            ->add('filename', 'image')
            ->add('', 'action')
        ;
    }

    public function buildForm(FormBuilder $builder)
    {
        $builder
            ->add('file', 'file')
        ;
    }
}
