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

use WBW\Bundle\WidgetBundle\Component\Color\BlueColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestBlueColorTrait;

/**
 * Blue color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class BlueColorTraitTest extends AbstractTestCase {

    /**
     * Test setBlueColor()
     *
     * @return void
     */
    public function testSetBlueColor(): void {

        // Set a Blue color mock.
        $blueColor = $this->getMockBuilder(BlueColorInterface::class)->getMock();

        $obj = new TestBlueColorTrait();

        $obj->setBlueColor($blueColor);
        $this->assertSame($blueColor, $obj->getBlueColor());
    }
}
