<?php

namespace Animadoo\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadPageBlockData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $block = new \Msi\Bundle\PageBundle\Entity\PageBlock();
        $block
            ->setName('contact content')
            ->setType('msi_block.block.text.type')
            ->setEnabled(true)
            ->setSetting('name', 'content')
            ->setSetting('content_fr', '<div class="row">
    <div class="span6">
        <p>Pellentesque ut massa vitae tortor consequat adipiscing. Nunc consequat rutrum urna eu rhoncus. Aliquam erat volutpat. Aenean id nisl vel nisl sodales pharetra.</p><p class="muted">514.826.5695<br>hello@animadoo.ca</p>
    </div>
    <div class="span6">
        ...
    </div>
</div>')
        ;
        $block->getPages()->add($manager->merge($this->getReference('page2')));
        $manager->persist($block);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
