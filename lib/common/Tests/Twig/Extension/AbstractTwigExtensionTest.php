<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension\TestTwigExtension;
use WBW\Bundle\CommonBundle\Twig\Extension\AbstractTwigExtension;
use WBW\Library\Symfony\Assets\NavigationNodeInterface;

/**
 * Abstract Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class AbstractTwigExtensionTest extends AbstractTestCase {

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        $obj = new TestTwigExtension($twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(0, $res);
    }

    /**
     * Test h()
     *
     * @return void
     */
    public function testH(): void {

        $arg = [
            "type" => "text/javascript",
        ];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/AbstractTwigExtensionTest.testCoreHtmlElement.html.txt");

        $this->assertEquals($exp, AbstractTwigExtension::h("script", "\n    $(document).ready(function() {});\n", $arg) . "\n");
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__constructor(): void {

        $this->assertEquals("&nbsp;", AbstractTwigExtension::DEFAULT_CONTENT);
        $this->assertEquals(NavigationNodeInterface::DEFAULT_HREF, AbstractTwigExtension::DEFAULT_HREF);

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        $obj = new TestTwigExtension($twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($twigEnvironment, $obj->getTwigEnvironment());
    }
}
