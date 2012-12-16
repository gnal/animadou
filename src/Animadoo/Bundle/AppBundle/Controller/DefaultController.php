<?php

namespace Animadoo\Bundle\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Animadoo\Bundle\AppBundle\Form\Type\ContactFormType;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function contactFormAction()
    {
        $form = $this->container->get('form.factory')->create(new ContactFormType);

        if ($this->container->get('animadoo_app.contact.form.handler')->process($form)) {
            // $this->container->get('session')->getFlashBag()->add('success', $this->container->get('translator')->trans('Le message a été envoyé. Merci!'));
            // return new RedirectResponse($this->container->get('router')->generate('armrs_app_contact_index'));
        }

        return $this->render('AnimadooAppBundle:Default:contactForm.html.twig', array('form' => $form->createView()));
    }
}
