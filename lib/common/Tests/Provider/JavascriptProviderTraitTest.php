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

use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\TestJavascriptProviderTrait;

/**
 * Javascript provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class JavascriptProviderTraitTest extends AbstractTestCase {

    /**
     * Test setProvider()
     *
     * @return void
     */
    public function testSetProvider(): void {

        // Set a Javascript provider mock.
        $javascriptProvider = $this->getMockBuilder(JavascriptProviderInterface::class)->getMock();

        $obj = new TestJavascriptProviderTrait();

        $obj->setJavascriptProvider($javascriptProvider);
        $this->assertSame($javascriptProvider, $obj->getJavascriptProvider());
    }
}
