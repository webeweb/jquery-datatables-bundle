<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Icon;

use WBW\Bundle\WidgetBundle\Icon\IconInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Icon\TestIconTrait;

/**
 * Icon trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Icon
 */
class IconTraitTest extends AbstractTestCase {

    /**
     * Test setIcon()
     *
     * @return void
     */
    public function testSetIcon(): void {

        // Set an Icon mock.
        $icon = $this->getMockBuilder(IconInterface::class)->getMock();

        $obj = new TestIconTrait();

        $obj->setIcon($icon);
        $this->assertSame($icon, $obj->getIcon());
    }
}
