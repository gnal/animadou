<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Animadou\Bundle\AppBundle\Entity\Menu;

class LoadMenuData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $dic;

    public function setContainer(ContainerInterface $dic = null)
    {
        $this->dic = $dic;
    }

    public function load(ObjectManager $manager)
    {
        // ADMIN MENU
        // root
        $root = new Menu();
        $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($root, array('fr'));
        $root->getTranslation()->setPublished(true)->setName('admin');
        $manager->persist($root);
        $manager->flush();
            // sites
            $menu = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, array('fr'));
            $menu->getTranslation()->setRoute('@msi_cmf_site_admin_list');
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('Sites');
            $manager->persist($menu);
            // security
            $security = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('Sécurité');
            $manager->persist($security);
                // users
                $menu = new Menu();
                $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, array('fr'));
                $menu->getTranslation()->setRoute('@msi_user_user_admin_list');
                $menu->setParent($security);
                $menu->getTranslation()->setPublished(true)->setName('Utilisateurs');
                $manager->persist($menu);
                // groups
                $menu = new Menu();
                $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, array('fr'));
                $menu->getTranslation()->setRoute('@msi_user_group_admin_list');
                $menu->setParent($security);
                $menu->getTranslation()->setPublished(true)->setName('Groupes');
                $manager->persist($menu);
            // menu
            $menu = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, array('fr'));
            $menu->getTranslation()->setRoute('@msi_cmf_menu_root_admin_list');
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('Menus');
            $manager->persist($menu);


        // main1 MENU
        // root
        $root = new Menu();
        $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($root, array('fr'));
        $root->getTranslation()->setPublished(true)->setName('main1');
        $manager->persist($root);
        $manager->flush();
            // Introduction
            $menu = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, array('fr'));
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('Introduction');
            $manager->persist($menu);
            // Voyages
            $security = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('Voyages');
            $manager->persist($security);
            // Introduction
            $menu = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, array('fr'));
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('Nos conseillers');
            $manager->persist($menu);

        // main2 MENU
        // root
        $root = new Menu();
        $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($root, array('fr'));
        $root->getTranslation()->setPublished(true)->setName('main2');
        $manager->persist($root);
        $manager->flush();
            // Introduction
            $menu = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, array('fr'));
            $menu->setParent($root);
            $menu->getTranslation()->setPublished(true)->setName('Témoignages conseillers');
            $manager->persist($menu);
            // Voyages
            $security = new Menu();
            $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($security, array('fr'));
            $security->setParent($root);
            $security->getTranslation()->setPublished(true)->setName('Obtenez un devis');
            $manager->persist($security);

        // FLUSH
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
