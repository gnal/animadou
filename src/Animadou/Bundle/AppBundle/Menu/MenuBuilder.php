<?php

namespace Animadou\Bundle\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $this->getMainMenu($factory);

        $menu->setChildrenAttribute('class', 'nav nav-pills');
        $this->setDropdownMenuAttributes($menu);

        foreach ($menu as $row) {
            if ($row->hasChildren()) {
                $row->setExtra('safe_label', true);
                $row->setLabel($row->getName().' <b class="caret"></b>');
            }
        }

        $this->findCurrent($menu);

        return $menu;
    }

    protected function getMainMenu($factory)
    {
        $root = $this->container->get('msi_cmf.menu_root_manager')->findRootByName('main');

        if (!$root) {
            return $factory->createItem('void');
        }

        $menu = $factory->createFromNode($root);
        if (!$menu->getExtra('published')) {
            foreach ($menu->getChildren() as $child) {
                $menu->removeChild($child);
            }
        }
        $this->removeUnpublished($menu);

        return $menu;
    }

    protected function setDropdownMenuAttributes($menuItem)
    {
        foreach ($menuItem->getChildren() as $child) {
            if ($child->hasChildren()) {
                $child->setAttribute('class', 'dropdown');
                $child->setLinkAttribute('class', 'dropdown-toggle');
                $child->setLinkAttribute('data-toggle', 'dropdown');
                $child->setChildrenAttribute('class', 'dropdown-menu');
            }
            $this->setDropdownSubmenuAttributes($child);
        }
    }

    protected function setDropdownSubmenuAttributes($menuItem)
    {
        foreach ($menuItem->getChildren() as $child) {
            if ($child->hasChildren()) {
                $child->setAttribute('class', 'dropdown-submenu');
                $child->setChildrenAttribute('class', 'dropdown-menu');
                $child->setLinkAttribute('tabindex', -1);
            }
        }
    }

    protected function findCurrent($node)
    {
        $requestUri = $this->container->get('request')->getRequestUri();
        foreach ($node->getChildren() as $child) {
            $menuUri = $child->getUri();
            if ($menuUri === $requestUri) {
                $child->setCurrent(true);
            } else {
                $child->setCurrent(false);
                $this->findCurrent($child);
            }
        }
    }

    public function removeUnpublished($node)
    {
        foreach ($node->getChildren() as $child) {
            if ($child->hasChildren()) {
                $this->removeUnpublished($child);
            }
            if (!$child->getExtra('published')) {
                $child->getParent()->removeChild($child);
            }
        }
    }
}
