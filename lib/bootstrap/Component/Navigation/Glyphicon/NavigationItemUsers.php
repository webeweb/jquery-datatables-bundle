<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon;

use WBW\Library\Widget\Component\Navigation\NavigationNode;

/**
 * Navigation item "users"
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon
 */
class NavigationItemUsers extends NavigationNode {

    /**
     * Constructor.
     *
     * @param string|null $route The route.
     * @param string $matcher The matcher.
     */
    public function __construct(?string $route, string $matcher = self::MATCHER_URL) {
        parent::__construct("navigation.item.users", "g:user", $route, $matcher);
    }
}
