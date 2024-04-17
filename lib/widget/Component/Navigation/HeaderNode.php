<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component\Navigation;

use WBW\Bundle\WidgetBundle\Component\AbstractNavigationNode;
use WBW\Bundle\WidgetBundle\Component\NavigationNodeInterface;

/**
 * Header node.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Navigation
 */
class HeaderNode extends AbstractNavigationNode {

    /**
     * Constructor.
     *
     * @param string $label The label.
     * @param string|null $icon The icon.
     */
    public function __construct(string $label, string $icon = null) {
        parent::__construct($label, $icon, null, null);

        $this->setEnable(true);
    }

    /**
     * {@inheritDoc}
     */
    public function addNode(NavigationNodeInterface $node): NavigationNodeInterface {
        return $this;
    }
}
