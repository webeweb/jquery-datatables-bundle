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

namespace WBW\Bundle\BootstrapBundle\Tests\Provider;

use WBW\Bundle\BootstrapBundle\Provider\JavascriptProvider;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;

/**
 * Javascript provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Provider
 */
class JavascriptProviderTest extends AbstractTestCase {

    /**
     * Test getJavascripts()
     *
     * @return void
     */
    public function testGetJavascript(): void {

        $exp = [
            "WBWBootstrapNotify"    => "@WBWBootstrap/twig/WBWBootstrapNotify.js.twig",
            "WBWBootstrapSelect"    => "@WBWBootstrap/twig/WBWBootstrapSelect.js.twig",
            "WBWBootstrapTooltip"   => "@WBWBootstrap/twig/WBWBootstrapTooltip.js.twig",
            "WBWBootstrapWysihtml5" => "@WBWBootstrap/twig/WBWBootstrapWysihtml5.js.twig",
        ];

        $obj = new JavascriptProvider();

        $this->assertEquals($exp, $obj->getJavascripts());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.provider.javascript", JavascriptProvider::SERVICE_NAME);

        $obj = new JavascriptProvider();

        $this->assertInstanceOf(ProviderInterface::class, $obj);
        $this->assertInstanceOf(JavascriptProviderInterface::class, $obj);
    }
}
