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

namespace WBW\Bundle\WidgetBundle\Tests\Component\Navigation;

use JsonSerializable;
use WBW\Bundle\WidgetBundle\Component\Navigation\BreadcrumbNode;
use WBW\Bundle\WidgetBundle\Component\NavigationNodeInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Breadcrumb node test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Navigation
 */
class BreadcrumbNodeTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BreadcrumbNode("id");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(NavigationNodeInterface::class, $obj);

        $this->assertFalse($obj->getActive());
        $this->assertFalse($obj->getEnable());
        $this->assertNull($obj->getIcon());
        $this->assertEquals(NavigationNodeInterface::MATCHER_URL, $obj->getMatcher());
        $this->assertNull($obj->getUri());
        $this->assertFalse($obj->getVisible());
    }
}
