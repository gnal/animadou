<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadBlockData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;
    protected $blockManager;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->blockManager = $container->get('msi_cmf.page_block_manager');
    }

    public function load(ObjectManager $manager)
    {
//         $this->manager=$manager;
//         //about
//         $content = "<img style=\"margin-left: 20px;\" class=\"pull-right\" src=\"/uploads/images/mtlcuisine_apropos.jpg\" alt=\"0\"><p>L'idéologie de MTL Cuisine est très importante et nous l'appliquons à chacun de nos restaurants. Nous voulons offrir à notre clientèle des expériences culinaires mémorables dans le quartier en vogue du Vieux-Montréal. Dans chacun de nos restaurants nous rendons honneur à la gastronomie d'aujourd'hui en utilisant des aliments frais d'ici et d'ailleurs!</p>
//         <p>La qualité de nos repas, notre service hors pair, notre grande sélection de professionnelles et nos décors tendances font que chaque restaurant de MTL Cuisine est très réputé.</p>";
//         $this->createText('à propos de nous', $content, 'content', 'page2');

//         //gift
//         $content = "<img style=\"margin-left: 20px;\" class=\"pull-right\" src=\"/uploads/images/mtlcuisine_certificats.png\" alt=\"0\"><p>Offrez un cadeau gourmet à votre entourage!<br>
//         Vous pouvez offrir un certificat de l’un de nos restaurants mais aussi un certificat MTL Cuisine qui est valable dans tous nos restaurants.</p>
// <p>Recevoir un certificat cadeau MTL Cuisine permet  au gens de passer une beau moment dans le Vieux-Montréal où ils vivront une expérience gastronomique unique et mémorable!</p>";
//         $this->createText('certificats cadeau', $content, 'content', 'page3');

//         //service
//         $content = "<img style=\"margin-left: 20px;\" class=\"pull-right\" src=\"/uploads/images/mtlcuisine_apropos.jpg\" alt=\"0\"><p>MTL Cuisine offre également des services de consultation.</p>
// <p>Vous avez un projet en tête et il vous manque certains aspects avant de le concrétiser ? Grâce à notre expertise dans domaine, nous pouvons vous apporter de judicieux conseils afin de réaliser vos projets.</p>
// <p>Nous vous offrons nos services dans plusieurs secteurs :</p>
// <ul>
// <li>Concept et design
// <br>
// Nous pouvons vous aider à bâtir un concept pour votre projet ainsi que le design affilié à celui-ci.</li>
// <li>Gestion
// <br>
// Nous pouvons gérer ou mettre en place une équipe de gestion pour votre projet</li>
// <li>Marketing
// <br>
// Nous pouvons gérer ou mettre en place une équipe qui s’occupera des activités de marketing de votre projet.</li>
// </ul>
// <p>Pour de plus amples informations, veuillez nous contacter au <a target=\"_blank\" href=\"mailto:info@mtlcuisine.com\">info@mtlcuisine.com</a></p>
// ";
//         $this->createText('certificats cadeau', $content, 'content', 'page4');

//         //reservation de groupe
//         $content = "<p>Les restaurants de MTL Cuisine sont également conçus pour accueillir de grands groupes. Certains possèdent même des salles privées que vous pouvez réserver afin de souligner l’évènement de votre choix. Toutes les réservations de groupes sont prises en charge par la gérante des évènements de MTL Cuisine afin de répondre à vos besoins et de s’assurer de votre satisfaction. Nous vous offrons également la possibilité de réserver exclusivement l’un de nos restaurant le temps de votre évènement.</p>
// <p>Les restaurants de Mtl Cuisine sont des endroits idéals pour souligner une occasion qui vous est importante.</p>
// <ul>
// <li>Mariage</li>
// <li>Rencontre de bureau</li>
// <li>5 à7</li>
// <li>lancement</li>
// <li>anniversaire</li>
// <li>etc.</li>
// </ul>
// ";
//         $this->createText('réservations de groupe', $content, 'content', 'page5');

//         // FLUSH
//         $manager->flush();
    }

    public function createText($name, $body, $slot = 'content', $page = null)
    {
        $block = $this->blockManager->create();
        $this->container->get('msi_cmf.page_block_manager')->createTranslations($block, ['fr']);
        $block->setSlot($slot);
        $block
            ->setName($name)
            ->setType('msi_cmf.block.text')
        ;
        $block->getTranslation()
            ->setPublished(true)
            ->setSetting('body', $body);
        if ($page) {
            $block->getPages()->add($this->manager->merge($this->getReference($page)));
        }
        $this->manager->persist($block);
    }

    public function getOrder()
    {
        return 6;
    }
}
