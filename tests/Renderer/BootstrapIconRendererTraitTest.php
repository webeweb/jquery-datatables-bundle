<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer;

use Twig\Environment;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\TestBootstrapIconRendererTrait;

/**
 * Bootstrap icon renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer
 */
class BootstrapIconRendererTraitTest extends AbstractTestCase {

    /**
     * Test the renderIcon() methods.
     *
     * @return void
     */
    public function testRenderIcon() {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        $obj = new TestBootstrapIconRendererTrait();

        $this->assertNull($obj->renderIcon(null));
        $this->assertNull($obj->renderIcon(""));
        $this->assertNull($obj->renderIcon("fa:home"));

        $obj->setTwigEnvironment($twigEnvironment);

        $this->assertNull($obj->renderIcon(null));
        $this->assertNull($obj->renderIcon(""));
        $this->assertEquals('<i class="fa fa-home"></i>', $obj->renderIcon("fa:home"));
    }
}
