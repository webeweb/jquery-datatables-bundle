<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\FooterLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestFooterLayoutProviderTrait;

/**
 * Footer layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class FooterLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setFooterLayoutProvider()
     *
     * @return void
     */
    public function testSetFooterLayoutProvider(): void {

        // Set a Footer layout provider mock.
        $footerLayoutProvider = $this->getMockBuilder(FooterLayoutProviderInterface::class)->getMock();

        $obj = new TestFooterLayoutProviderTrait();

        $obj->setFooterLayoutProvider($footerLayoutProvider);
        $this->assertSame($footerLayoutProvider, $obj->getFooterLayoutProvider());
    }
}
