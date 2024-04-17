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

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Navigation\Glyphicon;

use WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon\NavigationItemNewUsersGroup;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\NavigationNodeInterface;

/**
 * Navigation item "new users group" test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Navigation\Glyphicon
 */
class NavigationItemNewUsersGroupTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new NavigationItemNewUsersGroup("route");

        $this->assertEquals("navigation.item.new", $obj->getLabel());
        $this->assertEquals("g:plus", $obj->getIcon());
        $this->assertEquals(NavigationNodeInterface::MATCHER_URL, $obj->getMatcher());
        $this->assertEquals("route", $obj->getUri());
    }
}