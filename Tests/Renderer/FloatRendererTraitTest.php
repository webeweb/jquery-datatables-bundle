<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\TestFloatRendererTrait;

/**
 * Float renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer
 */
class FloatRendererTraitTest extends AbstractTestCase {

    /**
     * Tests the renderFloat() methods.
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

}