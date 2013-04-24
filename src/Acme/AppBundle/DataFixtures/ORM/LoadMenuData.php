<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Acme\AppBundle\Entity\Menu;

class LoadMenuData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $dic;
    protected $menuManager;

    public function setContainer(ContainerInterface $dic = null)
    {
        $this->dic = $dic;
        $this->menuManager = $this->dic->get('msi_cmf.menu_root_manager');
    }

    public function load(ObjectManager $manager)
    {
        // ADMIN MENU
        // root
        $root = $this->menuManager->create();
        $this->menuManager->createTranslations($root, array('fr'));
        $root->getTranslation()->setPublished(true)->setName('admin');
        $manager->persist($root);
        $manager->flush();
            // sites
            $menu = $this->menuManager->create();
            $this->menuManager->createTranslations($menu, array('fr'));
            $menu->getTranslation()->setRoute('@msi_cmf_site_admin_list');
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('Sites');
            $manager->persist($menu);
            // security
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('Sécurité');
            $manager->persist($security);
                // users
                $menu = $this->menuManager->create();
                $this->menuManager->createTranslations($menu, array('fr'));
                $menu->getTranslation()->setRoute('@msi_user_user_admin_list');
                $menu->setParent($security);
                $menu->getTranslation()->setPublished(true)->setName('Utilisateurs');
                $manager->persist($menu);
                // groups
                $menu = $this->menuManager->create();
                $this->menuManager->createTranslations($menu, array('fr'));
                $menu->getTranslation()->setRoute('@msi_user_group_admin_list');
                $menu->setParent($security);
                $menu->getTranslation()->setPublished(true)->setName('Groupes');
                $manager->persist($menu);
            // menu
            $menu = $this->menuManager->create();
            $this->menuManager->createTranslations($menu, array('fr'));
            $menu->getTranslation()->setRoute('@msi_cmf_menu_root_admin_list');
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('Menus');
            $manager->persist($menu);


        // main1 MENU
        // root
        $root = $this->menuManager->create();
        $this->menuManager->createTranslations($root, array('fr'));
        $root->getTranslation()->setPublished(true)->setName('main1');
        $manager->persist($root);
        $manager->flush();
            // Introduction
            $menu = $this->menuManager->create();
            $this->menuManager->createTranslations($menu, array('fr'));
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('réservations');
            $manager->persist($menu);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('restaurants');
            $manager->persist($security);
            // Introduction
            $menu = $this->menuManager->create();
            $this->menuManager->createTranslations($menu, array('fr'));
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('traiteur');
            $manager->persist($menu);
            // Introduction
            $menu = $this->menuManager->create();
            $this->menuManager->createTranslations($menu, array('fr'));
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('magasinage en-ligne');
            $manager->persist($menu);

        // main2 MENU
        // root
        $root = $this->menuManager->create();
        $this->menuManager->createTranslations($root, array('fr'));
        $root->getTranslation()->setPublished(true)->setName('main2');
        $manager->persist($root);
        $manager->flush();
            // Introduction
            $menu = $this->menuManager->create();
            $this->menuManager->createTranslations($menu, array('fr'));
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('à propos de nous');
            $menu->setPage($manager->merge($this->getReference('page2')));
            $manager->persist($menu);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('nos services');
            $security->setPage($manager->merge($this->getReference('page4')));
            $manager->persist($security);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('réservations de groupe');
            $security->setPage($manager->merge($this->getReference('page5')));
            $manager->persist($security);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('certificats cadeau');
            $security->setPage($manager->merge($this->getReference('page3')));
            $manager->persist($security);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('infolettre');
            $manager->persist($security);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('presse & évènements');
            $manager->persist($security);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('carrières');
            $manager->persist($security);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('concession de licences');
            $manager->persist($security);
            // Voyages
            $security = $this->menuManager->create();
            $this->menuManager->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('nous joindre');
            $manager->persist($security);

        // FLUSH
        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}
