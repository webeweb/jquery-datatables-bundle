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

namespace WBW\Bundle\WidgetBundle\Tests\Component\Color;

use WBW\Bundle\WidgetBundle\Component\Color\CyanColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestCyanColorTrait;

/**
 * Cyan color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class CyanColorTraitTest extends AbstractTestCase {

    /**
     * Test setCyanColor()
     *
     * @return void
     */
    public function testSetCyanColor(): void {

        // Set a Cyan color mock.
        $cyanColor = $this->getMockBuilder(CyanColorInterface::class)->getMock();

        $obj = new TestCyanColorTrait();

        $obj->setCyanColor($cyanColor);
        $this->assertSame($cyanColor, $obj->getCyanColor());
    }
}
