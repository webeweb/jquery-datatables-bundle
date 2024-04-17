<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Component\Breadcrumb\Glyphicon;

use WBW\Library\Symfony\Assets\Navigation\BreadcrumbNode;

/**
 * Breadcrumb item "new".
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component\Breadcrumb\Glyphicon
 */
class BreadcrumbItemNew extends BreadcrumbNode {

    /**
     * Constructor.
     *
     * @param string|null $route The route.
     * @param string $matcher The matcher.
     */
    public function __construct(?string $route, string $matcher = self::MATCHER_URL) {
        parent::__construct("navigation.item.new", "g:plus", $route, $matcher);
    }
}