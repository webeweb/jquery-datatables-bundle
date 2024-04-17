<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use WBW\Bundle\WidgetBundle\Component\NavigationNodeInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestNavigationNodeTrait;

/**
 * Navigation node trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class NavigationNodeTraitTest extends AbstractTestCase {

    /**
     * Test setNavigationNode()
     *
     * @return void
     */
    public function testSetNavigationNode(): void {

        // Set a NavigationNode mock.
        $navigationNode = $this->getMockBuilder(NavigationNodeInterface::class)->getMock();

        $obj = new TestNavigationNodeTrait();

        $obj->setNavigationNode($navigationNode);
        $this->assertSame($navigationNode, $obj->getNavigationNode());
    }
}