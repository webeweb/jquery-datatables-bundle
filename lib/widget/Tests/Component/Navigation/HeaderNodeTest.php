<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component\Navigation;

use WBW\Bundle\WidgetBundle\Component\Navigation\HeaderNode;
use WBW\Bundle\WidgetBundle\Component\NavigationNodeInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Header node test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Navigation
 */
class HeaderNodeTest extends AbstractTestCase {

    /**
     * Test addNode()
     *
     * @return void
     */
    public function testAddNode(): void {

        // Set a Navigation node mock.
        $node = $this->getMockBuilder(NavigationNodeInterface::class)->getMock();

        $obj = new HeaderNode("id");

        $this->assertSame($obj, $obj->addNode($node));
        $this->assertEquals([], $obj->getNodes());

        $this->assertNull($node->getParent());
        $this->assertNull($node->getAlphabeticalTreeNodeParent());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new HeaderNode("id");

        $this->assertFalse($obj->getActive());
        $this->assertTrue($obj->getEnable());
        $this->assertNull($obj->getIcon());
        $this->assertNull($obj->getMatcher());
        $this->assertNull($obj->getUri());
        $this->assertTrue($obj->getVisible());
    }
}
