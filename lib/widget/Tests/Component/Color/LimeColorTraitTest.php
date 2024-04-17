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

use WBW\Bundle\WidgetBundle\Component\Color\LimeColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestLimeColorTrait;

/**
 * Lime color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class LimeColorTraitTest extends AbstractTestCase {

    /**
     * Test setLimeColor()
     *
     * @return void
     */
    public function testSetLimeColor(): void {

        // Set a Lime color mock.
        $limeColor = $this->getMockBuilder(LimeColorInterface::class)->getMock();

        $obj = new TestLimeColorTrait();

        $obj->setLimeColor($limeColor);
        $this->assertSame($limeColor, $obj->getLimeColor());
    }
}
