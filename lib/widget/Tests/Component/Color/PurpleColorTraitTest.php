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

use WBW\Bundle\WidgetBundle\Component\Color\PurpleColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestPurpleColorTrait;

/**
 * Purple color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class PurpleColorTraitTest extends AbstractTestCase {

    /**
     * Test setPurpleColor()
     *
     * @return void
     */
    public function testSetPurpleColor(): void {

        // Set a Purple color mock.
        $purpleColor = $this->getMockBuilder(PurpleColorInterface::class)->getMock();

        $obj = new TestPurpleColorTrait();

        $obj->setPurpleColor($purpleColor);
        $this->assertSame($purpleColor, $obj->getPurpleColor());
    }
}
