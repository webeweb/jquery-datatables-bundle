<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon;

use WBW\Bundle\WidgetBundle\Component\Navigation\NavigationNode;

/**
 * Navigation item "events".
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon
 */
class NavigationItemEvents extends NavigationNode {

    /**
     * Constructor.
     *
     * @param string|null $route The route.
     * @param string $matcher The matcher.
     */
    public function __construct(?string $route, string $matcher = self::MATCHER_URL) {
        parent::__construct("navigation.item.events", "g:calendar", $route, $matcher);
    }
}
