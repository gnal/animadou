<?php

namespace Ani\CoreBundle\Admin;

use Symfony\Component\Form\FormBuilder;
use Msi\CmfBundle\Admin\PageAdmin as BasePageAdmin;

class PageAdmin extends BasePageAdmin
{
    public function buildTranslationForm(FormBuilder $builder)
    {
        parent::buildTranslationForm($builder);
        $builder->add('sliderTitle');
        $builder->add('sliderText', 'textarea');
    }
}
