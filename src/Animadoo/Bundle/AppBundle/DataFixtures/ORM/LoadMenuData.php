<?php

namespace Animadoo\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadMenuData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $transClass = 'Msi\Bundle\MenuBundle\Entity\MenuTranslation';
        /*
            MAIN MENU
        */
        $root = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $root->createTranslations($transClass, array('en', 'fr'));
        $root->getTranslation('fr')->setName('main');
        $root->getTranslation('fr')->setPublished(true);
        $root->getTranslation('en')->setName('main');
        $root->getTranslation('en')->setPublished(true);
        $manager->persist($root);
        $manager->flush();
        // home
        $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $menu->createTranslations($transClass, array('en', 'fr'));
        $menu->setPage($manager->merge($this->getReference('page1')));
        $menu->setParent($root);
        $menu->getTranslation('fr')->setName('Accueil');
        $menu->getTranslation('fr')->setPublished(true);
        $menu->getTranslation('en')->setName('Home');
        $menu->getTranslation('en')->setPublished(true);
        $manager->persist($menu);
        // about
        $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $menu->createTranslations($transClass, array('en', 'fr'));
        $menu->setPage($manager->merge($this->getReference('page3')));
        $menu->setParent($root);
        $menu->getTranslation('fr')->setName('À propos');
        $menu->getTranslation('fr')->setPublished(true);
        $menu->getTranslation('en')->setName('About');
        $menu->getTranslation('en')->setPublished(true);
        $manager->persist($menu);
        // services
        $services = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $services->createTranslations($transClass, array('en', 'fr'));
        $services->setParent($root);
        $services->getTranslation('fr')->setName('Services');
        $services->getTranslation('fr')->setPublished(true);
        $services->getTranslation('en')->setName('Services');
        $services->getTranslation('en')->setPublished(true);
        $manager->persist($services);
            // promenade de chien
            $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
            $menu->createTranslations($transClass, array('en', 'fr'));
            $menu->setPage($manager->merge($this->getReference('page4')));
            $menu->setParent($services);
            $menu->getTranslation('fr')->setName('Promenade de chien');
            $menu->getTranslation('fr')->setPublished(true);
            $menu->getTranslation('en')->setName('Dog walk');
            $menu->getTranslation('en')->setPublished(true);
            $manager->persist($menu);
            // visites quotidiennes
            $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
            $menu->createTranslations($transClass, array('en', 'fr'));
            $menu->setPage($manager->merge($this->getReference('page5')));
            $menu->setParent($services);
            $menu->getTranslation('fr')->setName('Visites quotidiennes');
            $menu->getTranslation('fr')->setPublished(true);
            $menu->getTranslation('en')->setName('Daily visits');
            $menu->getTranslation('en')->setPublished(true);
            $manager->persist($menu);
            // promenade de chien
            $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
            $menu->createTranslations($transClass, array('en', 'fr'));
            $menu->setPage($manager->merge($this->getReference('page6')));
            $menu->setParent($services);
            $menu->getTranslation('fr')->setName('Garde d\'animaux');
            $menu->getTranslation('fr')->setPublished(true);
            $menu->getTranslation('en')->setName('Pet sitting');
            $menu->getTranslation('en')->setPublished(true);
            $manager->persist($menu);
        // photos
        $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $menu->createTranslations($transClass, array('en', 'fr'));
        $menu->setPage($manager->merge($this->getReference('page1')));
        $menu->setParent($root);
        $menu->getTranslation('fr')->setName('Photos');
        $menu->getTranslation('fr')->setPublished(true);
        $menu->getTranslation('en')->setName('Photos');
        $menu->getTranslation('en')->setPublished(true);
        $manager->persist($menu);
        // testimonials
        $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $menu->createTranslations($transClass, array('en', 'fr'));
        $menu->setPage($manager->merge($this->getReference('page1')));
        $menu->setParent($root);
        $menu->getTranslation('fr')->setName('Témoignages');
        $menu->getTranslation('fr')->setPublished(true);
        $menu->getTranslation('en')->setName('Testimonials');
        $menu->getTranslation('en')->setPublished(true);
        $manager->persist($menu);
        // faq
        $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $menu->createTranslations($transClass, array('en', 'fr'));
        $menu->setPage($manager->merge($this->getReference('page1')));
        $menu->setParent($root);
        $menu->getTranslation('fr')->setName('FAQ');
        $menu->getTranslation('fr')->setPublished(true);
        $menu->getTranslation('en')->setName('FAQ');
        $menu->getTranslation('en')->setPublished(true);
        $manager->persist($menu);
        // contact
        $menu = new \Msi\Bundle\MenuBundle\Entity\Menu();
        $menu->createTranslations($transClass, array('en', 'fr'));
        $menu->setPage($manager->merge($this->getReference('page2')));
        $menu->setParent($root);
        $menu->getTranslation('fr')->setName('Contact');
        $menu->getTranslation('fr')->setPublished(true);
        $menu->getTranslation('en')->setName('Contact');
        $menu->getTranslation('en')->setPublished(true);
        $manager->persist($menu);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
