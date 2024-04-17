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

use WBW\Bundle\WidgetBundle\Component\Color\YellowColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestYellowColorTrait;

/**
 * Yellow color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class YellowColorTraitTest extends AbstractTestCase {

    /**
     * Test setYellowColor()
     *
     * @return void
     */
    public function testSetYellowColor(): void {

        // Set a Yellow color mock.
        $yellowColor = $this->getMockBuilder(YellowColorInterface::class)->getMock();

        $obj = new TestYellowColorTrait();

        $obj->setYellowColor($yellowColor);
        $this->assertSame($yellowColor, $obj->getYellowColor());
    }
}
