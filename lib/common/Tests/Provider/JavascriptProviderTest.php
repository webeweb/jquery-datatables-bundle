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

namespace WBW\Bundle\CommonBundle\Tests\Provider;

use WBW\Bundle\CommonBundle\Provider\JavascriptProvider;
use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Javascript provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class JavascriptProviderTest extends AbstractTestCase {

    /**
     * Test getJavascripts()
     *
     * @return void
     */
    public function testGetJavascripts(): void {

        $obj = new JavascriptProvider();

        $exp = [
            "WBWCommonJQueryInputMask" => "@WBWCommon/twig/WBWCommonJQueryInputMask.js.twig",
            "WBWCommonLeaflet"         => "@WBWCommon/twig/WBWCommonLeaflet.js.twig",
            "WBWCommonSweetAlert"      => "@WBWCommon/twig/WBWCommonSweetAlert.js.twig",
            "WBWCommonWaitMe"          => "@WBWCommon/twig/WBWCommonWaitMe.js.twig",
        ];

        $this->assertEquals($exp, $obj->getJavascripts());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.provider.javascript", JavascriptProvider::SERVICE_NAME);

        $obj = new JavascriptProvider();

        $this->assertInstanceOf(ProviderInterface::class, $obj);
        $this->assertInstanceOf(JavascriptProviderInterface::class, $obj);
    }
}
