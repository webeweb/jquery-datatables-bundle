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

use WBW\Bundle\WidgetBundle\Component\Color\BlackColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestBlackColorTrait;

/**
 * Black color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class BlackColorTraitTest extends AbstractTestCase {

    /**
     * Test setBlackColor()
     *
     * @return void
     */
    public function testSetBlackColor(): void {

        // Set a Black color mock.
        $blackColor = $this->getMockBuilder(BlackColorInterface::class)->getMock();

        $obj = new TestBlackColorTrait();

        $obj->setBlackColor($blackColor);
        $this->assertSame($blackColor, $obj->getBlackColor());
    }
}
