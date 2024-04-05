<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer\Assets;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Assets\TestIconRendererTrait;

/**
 * Icon renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Assets
 */
class IconRendererTraitTest extends AbstractTestCase {

    /**
     * Test the renderIcon() methods.
     *
     * @return void
     */
    public function testRenderIcon() {

        $obj = new TestIconRendererTrait();
        $obj->setTwigEnvironment($this->twigEnvironment);

        $this->assertEquals("", $obj->renderIcon(null));
        $this->assertEquals("", $obj->renderIcon(""));
        $this->assertEquals('<i class="fa fa-home"></i>', $obj->renderIcon("fa:home"));
    }
}
