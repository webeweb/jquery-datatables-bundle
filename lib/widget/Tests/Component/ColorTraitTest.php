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

use WBW\Bundle\WidgetBundle\Component\ColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestColorTrait;

/**
 * Color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class ColorTraitTest extends AbstractTestCase {

    /**
     * Test setColor()
     *
     * @return void
     */
    public function testSetColor(): void {

        // Set a Color mock.
        $color = $this->getMockBuilder(ColorInterface::class)->getMock();

        $obj = new TestColorTrait();

        $obj->setColor($color);
        $this->assertSame($color, $obj->getColor());
    }
}
