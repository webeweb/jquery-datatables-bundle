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

use WBW\Bundle\WidgetBundle\Component\Color\LightBlueColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestLightBlueColorTrait;

/**
 * Light blue color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class LightBlueColorTraitTest extends AbstractTestCase {

    /**
     * Test setLightBlueColor()
     *
     * @return void
     */
    public function testSetLightBlueColor(): void {

        // Set a Light blue color mock.
        $lightBlueColor = $this->getMockBuilder(LightBlueColorInterface::class)->getMock();

        $obj = new TestLightBlueColorTrait();

        $obj->setLightBlueColor($lightBlueColor);
        $this->assertSame($lightBlueColor, $obj->getLightBlueColor());
    }
}
