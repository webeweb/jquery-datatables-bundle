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

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Navigation\Glyphicon;

use WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon\NavigationItemNewUser;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Component\NavigationNodeInterface;

/**
 * Navigation item "new user" test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Navigation\Glyphicon
 */
class NavigationItemNewUserTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new NavigationItemNewUser("route");

        $this->assertEquals("navigation.item.new", $obj->getLabel());
        $this->assertEquals("g:plus", $obj->getIcon());
        $this->assertEquals(NavigationNodeInterface::MATCHER_URL, $obj->getMatcher());
        $this->assertEquals("route", $obj->getUri());
    }
}
