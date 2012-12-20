<?php

namespace Animadou\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Msi\Bundle\CmfBundle\Entity\Site;

class LoadSiteData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $site = new Site();
        $site->setName('animadou');
        $site->setEnabled(true);
        $site->setIsDefault(true);
        $site->setLocale('fr');
        $site->setLocales(array(
            'fr',
            'en',
        ));
        $site->createTranslations('Msi\Bundle\CmfBundle\Entity\SiteTranslation', array('fr', 'en'));
        $site->getTranslation('fr')->setBrand('Animadou');
        $site->getTranslation('en')->setBrand('Animadou');
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
