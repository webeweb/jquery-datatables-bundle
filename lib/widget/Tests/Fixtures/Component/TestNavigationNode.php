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

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Component;

use WBW\Bundle\WidgetBundle\Component\AbstractNavigationNode;

/**
 * Test navigation node.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Component
 */
class TestNavigationNode extends AbstractNavigationNode {

    /**
     * Constructor.
     *
     * @param string $label The name.
     * @param string|null $icon The icon.
     * @param string|null $uri The URI.
     * @param string $matcher The matcher.
     */
    public function __construct(string $label, string $icon = null, string $uri = null, string $matcher = self::MATCHER_URL) {
        parent::__construct($label, $icon, $uri, $matcher);
    }
}
