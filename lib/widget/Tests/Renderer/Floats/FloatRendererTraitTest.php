<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Renderer\Floats;

use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Floats\TestFloatRendererTrait;

/**
 * Float renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Floats
 */
class FloatRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderFloat() methods.
     *
     * @return void
     */
    public function testRenderFloat(): void {

        $obj = new TestFloatRendererTrait();

        $this->assertEquals("", $obj->renderFloat(null));
        $this->assertEquals("1,000.00", $obj->renderFloat(1000));
        $this->assertEquals("1,000.000", $obj->renderFloat(1000, 3));
        $this->assertEquals("1 000,000", $obj->renderFloat(1000, 3, ",", " "));
    }

    /**
     * Test renderPercent() methods.
     *
     * @return void
     */
    public function testRenderPercent(): void {

        $obj = new TestFloatRendererTrait();

        $this->assertNull($obj->renderPercent(null));
        $this->assertEquals("100.00 %", $obj->renderPercent(100));
    }

    /**
     * Test renderPrice() methods.
     *
     * @return void
     */
    public function testRenderPrice(): void {

        $obj = new TestFloatRendererTrait();

        $this->assertNull($obj->renderPrice(null));
        $this->assertEquals("1,000.00 €", $obj->renderPrice(1000));
        $this->assertEquals("1,000.00 $", $obj->renderPrice(1000, "$"));
    }
}
