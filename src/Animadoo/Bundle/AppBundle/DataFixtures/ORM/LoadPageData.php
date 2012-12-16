<?php

namespace Animadoo\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadPageData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // home
        $page = new \Msi\Bundle\PageBundle\Entity\Page();
        $page
            ->setHome(true)
            ->setTemplate('AnimadooAppBundle::layout.html.twig')
            ->createTranslations('Msi\Bundle\PageBundle\Entity\PageTranslation', array('en', 'fr'));
        ;
        $this->addReference('page1', $page);
        $page->getTranslation('fr')->setPublished(true)->setTitle('Services de soins pour animaux de compagnie');
        $page->getTranslation('en')->setPublished(true)->setTitle('Pet care services');
        $manager->persist($page);
        // about us
        $page = new \Msi\Bundle\PageBundle\Entity\Page();
        $page
            ->setHome(false)
            ->setTemplate('AnimadooAppBundle::layout.html.twig')
            ->createTranslations('Msi\Bundle\PageBundle\Entity\PageTranslation', array('en', 'fr'));
        ;
        $this->addReference('page3', $page);
        $page->getTranslation('fr')->setPublished(true)->setTitle('À propos');
        $page->getTranslation('en')->setPublished(true)->setTitle('About Us');
        $manager->persist($page);
        // dog walk
        $page = new \Msi\Bundle\PageBundle\Entity\Page();
        $page
            ->setHome(false)
            ->setTemplate('AnimadooAppBundle::layout.html.twig')
            ->createTranslations('Msi\Bundle\PageBundle\Entity\PageTranslation', array('en', 'fr'));
        ;
        $this->addReference('page4', $page);
        $page->getTranslation('fr')->setPublished(true)->setTitle('Promenade de chien');
        $page->getTranslation('en')->setPublished(true)->setTitle('Dog walk');
        $manager->persist($page);
        // visits
        $page = new \Msi\Bundle\PageBundle\Entity\Page();
        $page
            ->setHome(false)
            ->setTemplate('AnimadooAppBundle::layout.html.twig')
            ->createTranslations('Msi\Bundle\PageBundle\Entity\PageTranslation', array('en', 'fr'));
        ;
        $this->addReference('page5', $page);
        $page->getTranslation('fr')->setPublished(true)->setTitle('Visites');
        $page->getTranslation('en')->setPublished(true)->setTitle('Visits');
        $manager->persist($page);
        // pet sitting
        $page = new \Msi\Bundle\PageBundle\Entity\Page();
        $page
            ->setHome(false)
            ->setTemplate('AnimadooAppBundle::layout.html.twig')
            ->createTranslations('Msi\Bundle\PageBundle\Entity\PageTranslation', array('en', 'fr'));
        ;
        $this->addReference('page6', $page);
        $page->getTranslation('fr')->setPublished(true)->setTitle('Garde d\'animaux');
        $page->getTranslation('en')->setPublished(true)->setTitle('Pet sitting');
        $manager->persist($page);
        // contact
        $page = new \Msi\Bundle\PageBundle\Entity\Page();
        $page
            ->setHome(false)
            ->setTemplate('AnimadooAppBundle::layout.html.twig')
            ->createTranslations('Msi\Bundle\PageBundle\Entity\PageTranslation', array('en', 'fr'));
        ;
        $this->addReference('page2', $page);
        $page->getTranslation('fr')->setPublished(true)->setTitle('Contact');
        $page->getTranslation('en')->setPublished(true)->setTitle('Contact Us');
        $manager->persist($page);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
