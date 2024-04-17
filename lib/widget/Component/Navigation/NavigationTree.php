<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component\Navigation;

use WBW\Bundle\WidgetBundle\Component\AbstractNavigationNode;

/**
 * Navigation tree.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Navigation
 */
class NavigationTree extends AbstractNavigationNode {

    /**
     * Constructor.
     *
     * @param string $label The label.
     */
    public function __construct(string $label) {
        parent::__construct($label);
    }
}
