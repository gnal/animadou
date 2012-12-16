<?php

namespace Animadoo\Bundle\AppBundle\Form\Handler;

class ContactFormHandler
{
    protected $request;
    protected $templating;
    protected $mailer;

    public function __construct($request, $templating, $mailer)
    {
        $this->request = $request;
        $this->templating = $templating;
        $this->mailer = $mailer;
    }

    public function process($form)
    {
        if ($this->request->getMethod() === 'POST') {
            $form->bindRequest($this->request);

            if ($form->isValid()) {
                $this->onSuccess();

                return true;
            }
        }

        return false;
    }

    protected function onSuccess()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact Form')
            ->setFrom('noreply@armrs.com')
            ->setTo('fangers@groupemsi.com')
            ->setBody($this->templating->render('ArmrsAppBundle:Contact:email.txt.twig', array('form' => $this->request->request->get('armrs_app_contact_form'))))
        ;
        $this->mailer->send($message);
    }
}
