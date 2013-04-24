<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadPageData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;
    protected $pageManager;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->pageManager = $container->get('msi_cmf.page_manager');
    }

    public function load(ObjectManager $manager)
    {
        //home
        $page = $this->pageManager->create();
        $page->setHome(true);
        $page->setTemplate('RecCoreBundle::layout.html.twig');
        $this->pageManager->createTranslations($page, array('fr', 'en'));
        $page->getTranslation('en')->setTitle('lorem')->setPublished(true);
        $page->getTranslation('fr')->setTitle('Accueil')->setPublished(true);
        $page->setSite($manager->merge($this->getReference('site1')));
        $this->addReference('page1', $page);
        $manager->persist($page);

        //about
        $page = $this->pageManager->create();
        $page->setTemplate('RecCoreBundle::layout.html.twig');
        $this->pageManager->createTranslations($page, array('fr', 'en'));
        $page->getTranslation('en')->setTitle('lorem')->setPublished(true);
        $page->getTranslation('fr')->setTitle('à propos de nous')->setPublished(true);
        $page->setSite($manager->merge($this->getReference('site1')));
        $this->addReference('page2', $page);
        $manager->persist($page);

        //gift
        $page = $this->pageManager->create();
        $page->setTemplate('RecCoreBundle::layout.html.twig');
        $this->pageManager->createTranslations($page, array('fr', 'en'));
        $page->getTranslation('en')->setTitle('lorem')->setPublished(true);
        $page->getTranslation('fr')->setTitle('certificats cadeau')->setPublished(true);
        $page->setSite($manager->merge($this->getReference('site1')));
        $this->addReference('page3', $page);
        $manager->persist($page);

        //services
        $page = $this->pageManager->create();
        $page->setTemplate('RecCoreBundle::layout.html.twig');
        $this->pageManager->createTranslations($page, array('fr', 'en'));
        $page->getTranslation('en')->setTitle('lorem')->setPublished(true);
        $page->getTranslation('fr')->setTitle('nos services')->setPublished(true);
        $page->setSite($manager->merge($this->getReference('site1')));
        $this->addReference('page4', $page);
        $manager->persist($page);

        //reservation de gorupe
        $page = $this->pageManager->create();
        $page->setTemplate('RecCoreBundle::layout.html.twig');
        $this->pageManager->createTranslations($page, array('fr', 'en'));
        $page->getTranslation('en')->setTitle('lorem')->setPublished(true);
        $page->getTranslation('fr')->setTitle('réservations de groupe')->setPublished(true);
        $page->setSite($manager->merge($this->getReference('site1')));
        $this->addReference('page5', $page);
        $manager->persist($page);

        // FLUSH
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
