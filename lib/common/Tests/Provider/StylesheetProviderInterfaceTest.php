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

use WBW\Bundle\CommonBundle\Provider\StylesheetProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Stylesheet provider interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class StylesheetProviderInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("text/css; charset=utf-8", StylesheetProviderInterface::STYLESHEET_PROVIDER_CONTENT_TYPE);
        $this->assertEquals("css", StylesheetProviderInterface::STYLESHEET_PROVIDER_EXTENSION);
        $this->assertEquals("wbw.common.provider.stylesheet", StylesheetProviderInterface::STYLESHEET_PROVIDER_TAG_NAME);
    }
}
