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

use WBW\Bundle\WidgetBundle\Component\Color\WhiteColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestWhiteColorTrait;

/**
 * White color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class WhiteColorTraitTest extends AbstractTestCase {

    /**
     * Test setWhiteColor()
     *
     * @return void
     */
    public function testSetWhiteColor(): void {

        // Set a White color mock.
        $whiteColor = $this->getMockBuilder(WhiteColorInterface::class)->getMock();

        $obj = new TestWhiteColorTrait();

        $obj->setWhiteColor($whiteColor);
        $this->assertSame($whiteColor, $obj->getWhiteColor());
    }
}
