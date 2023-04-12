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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Assets\TestImageRendererTrait;

/**
 * Image renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Assets
 */
class ImageRendererTraitTest extends AbstractTestCase {

    /**
     * Tests renderImage()
     *
     * @return void
     */
    public function testRenderImage(): void {

        $obj = new TestImageRendererTrait();

        $this->assertNull($obj->renderImage(null));
        $this->assertEquals('<img src="src"/>', $obj->renderImage("src"));
        $this->assertEquals('<img src="src" alt="alt"/>', $obj->renderImage("src", "alt"));
        $this->assertEquals('<img src="src" alt="alt" width="width"/>', $obj->renderImage("src", "alt", "width"));
        $this->assertEquals('<img src="src" alt="alt" width="width" height="height"/>', $obj->renderImage("src", "alt", "width", "height"));
    }
}
