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

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Navigation\Glyphicon;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon\NavigationItemUsersGroups;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\NavigationNodeInterface;

/**
 * Navigation item "users groups" test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Navigation\Glyphicon
 */
class NavigationItemUsersGroupsTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new NavigationItemUsersGroups("route");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(NavigationNodeInterface::class, $obj);

        $this->assertEquals("navigation.item.users_groups", $obj->getLabel());
        $this->assertEquals("g:user", $obj->getIcon());
        $this->assertEquals(NavigationNodeInterface::MATCHER_URL, $obj->getMatcher());
        $this->assertEquals("route", $obj->getUri());
    }
}
