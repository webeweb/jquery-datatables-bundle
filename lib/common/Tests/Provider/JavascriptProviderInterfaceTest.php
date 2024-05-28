<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Provider;

use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Javascript provider interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class JavascriptProviderInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("application/javascript", JavascriptProviderInterface::JAVASCRIPT_PROVIDER_CONTENT_TYPE);
        $this->assertEquals("js", JavascriptProviderInterface::JAVASCRIPT_PROVIDER_EXTENSION);
        $this->assertEquals("wbw.common.provider.javascript", JavascriptProviderInterface::JAVASCRIPT_PROVIDER_TAG_NAME);
    }
}
