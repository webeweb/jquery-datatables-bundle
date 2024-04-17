<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

/**
 * Navigation node trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 */
trait NavigationNodeTrait {

    /**
     * Navigation node.
     *
     * @var NavigationNodeInterface|null
     */
    protected $navigationNode;

    /**
     * Get the navigation node.
     *
     * @return NavigationNodeInterface|null Returns the navigation node.
     */
    public function getNavigationNode(): ?NavigationNodeInterface {
        return $this->navigationNode;
    }

    /**
     * Set the navigation node.
     *
     * @param NavigationNodeInterface|null $navigationNode The navigation node.
     * @return self Returns this instance.
     */
    protected function setNavigationNode(?NavigationNodeInterface $navigationNode): self {
        $this->navigationNode = $navigationNode;
        return $this;
    }
}
