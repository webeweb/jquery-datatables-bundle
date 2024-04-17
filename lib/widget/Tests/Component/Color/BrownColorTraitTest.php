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

use WBW\Bundle\WidgetBundle\Component\Color\BrownColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestBrownColorTrait;

/**
 * Brown color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class BrownColorTraitTest extends AbstractTestCase {

    /**
     * Test setBrownColor()
     *
     * @return void
     */
    public function testSetBrownColor(): void {

        // Set a Brown color mock.
        $brownColor = $this->getMockBuilder(BrownColorInterface::class)->getMock();

        $obj = new TestBrownColorTrait();

        $obj->setBrownColor($brownColor);
        $this->assertSame($brownColor, $obj->getBrownColor());
    }
}
