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

use WBW\Bundle\CommonBundle\Provider\StylesheetProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\TestStylesheetProviderTrait;

/**
 * Stylesheet provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class StylesheetProviderTraitTest extends AbstractTestCase {

    /**
     * Test setProvider()
     *
     * @return void
     */
    public function testSetProvider(): void {

        // Set a Stylesheet provider mock.
        $stylesheetProvider = $this->getMockBuilder(StylesheetProviderInterface::class)->getMock();

        $obj = new TestStylesheetProviderTrait();

        $obj->setStylesheetProvider($stylesheetProvider);
        $this->assertSame($stylesheetProvider, $obj->getStylesheetProvider());
    }
}
