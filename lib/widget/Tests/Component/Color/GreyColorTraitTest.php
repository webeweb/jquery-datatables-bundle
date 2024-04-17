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

use WBW\Bundle\WidgetBundle\Component\Color\GreyColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestGreyColorTrait;

/**
 * Grey color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class GreyColorTraitTest extends AbstractTestCase {

    /**
     * Test setGreyColor()
     *
     * @return void
     */
    public function testSetGreyColor(): void {

        // Set a Grey color mock.
        $greyColor = $this->getMockBuilder(GreyColorInterface::class)->getMock();

        $obj = new TestGreyColorTrait();

        $obj->setGreyColor($greyColor);
        $this->assertSame($greyColor, $obj->getGreyColor());
    }
}
