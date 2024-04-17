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

use WBW\Bundle\WidgetBundle\Component\Color\AmberColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestAmberColorTrait;

/**
 * Amber color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class AmberColorTraitTest extends AbstractTestCase {

    /**
     * Test setAmberColor()
     *
     * @return void
     */
    public function testSetAmberColor(): void {

        // Set an Amber color mock.
        $amberColor = $this->getMockBuilder(AmberColorInterface::class)->getMock();

        $obj = new TestAmberColorTrait();

        $obj->setAmberColor($amberColor);
        $this->assertSame($amberColor, $obj->getAmberColor());
    }
}
