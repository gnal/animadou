<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Animadou\Bundle\AppBundle\Entity\Site;

class LoadSiteData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;
    protected $siteManager;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->siteManager = $container->get('msi_cmf.site_manager');
    }

    public function load(ObjectManager $manager)
    {
        $site = new Site();
        $site->setHost('dev.animadou.com');
        $site->setEnabled(true);
        $site->setLocale('fr');
        $site->setLocales(array(
            'fr', 'en',
        ));
        $this->siteManager->createTranslations($site, array('fr', 'en'));
        $site->getTranslation('en')->setBrand('Animadou');
        $site->getTranslation('fr')->setBrand('Animadou');
        $this->addReference('site1', $site);
        $manager->persist($site);
        // FLUSH
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
