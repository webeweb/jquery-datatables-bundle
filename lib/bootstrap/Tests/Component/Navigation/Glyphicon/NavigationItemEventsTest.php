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

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\Navigation\Glyphicon\NavigationItemEvents;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\NavigationNodeInterface;

/**
 * Navigation item "events" test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Navigation\Glyphicon
 */
class NavigationItemEventsTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new NavigationItemEvents("route");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(NavigationNodeInterface::class, $obj);

        $this->assertEquals("navigation.item.events", $obj->getLabel());
        $this->assertEquals("g:calendar", $obj->getIcon());
        $this->assertEquals(NavigationNodeInterface::MATCHER_URL, $obj->getMatcher());
        $this->assertEquals("route", $obj->getUri());
    }
}
