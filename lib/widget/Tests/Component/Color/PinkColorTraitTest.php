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

use WBW\Bundle\WidgetBundle\Component\Color\PinkColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestPinkColorTrait;

/**
 * Pink color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class PinkColorTraitTest extends AbstractTestCase {

    /**
     * Test setPinkColor()
     *
     * @return void
     */
    public function testSetPinkColor(): void {

        // Set a Pink color mock.
        $pinkColor = $this->getMockBuilder(PinkColorInterface::class)->getMock();

        $obj = new TestPinkColorTrait();

        $obj->setPinkColor($pinkColor);
        $this->assertSame($pinkColor, $obj->getPinkColor());
    }
}
