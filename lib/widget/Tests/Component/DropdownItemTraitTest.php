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

use WBW\Bundle\WidgetBundle\Component\DropdownItemInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestDropdownItemTrait;

/**
 * Dropdown item trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class DropdownItemTraitTest extends AbstractTestCase {

    /**
     * Test setDropdownItem()
     *
     * @return void
     */
    public function testSetDropdownItem(): void {

        // Set a Dropdown item mock.
        $dropdownItem = $this->getMockBuilder(DropdownItemInterface::class)->getMock();

        $obj = new TestDropdownItemTrait();

        $obj->setDropdownItem($dropdownItem);
        $this->assertSame($dropdownItem, $obj->getDropdownItem());
    }
}
