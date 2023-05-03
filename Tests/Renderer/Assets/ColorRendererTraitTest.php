<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Assets;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Assets\TestColorRendererTrait;

/**
 * Color renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Assets
 */
class ColorRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderColor()
     *
     * @return void
     */
    public function testRenderColor(): void {

        $obj = new TestColorRendererTrait();

        $this->assertNull($obj->renderColor(null));
        $this->assertEquals('<div style="background-color: #ffffff;"></div>', $obj->renderColor("#ffffff"));
        $this->assertEquals('<div style="background-color: #ffffff; width: 50px;"></div>', $obj->renderColor("#ffffff", 50));
        $this->assertEquals('<div style="background-color: #ffffff; width: 50px; height: 30px;"></div>', $obj->renderColor("#ffffff", 50, 30));
    }
}
