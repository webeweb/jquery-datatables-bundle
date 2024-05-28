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

use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\TestQuoteProviderTrait;

/**
 * Quote provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class QuoteProviderTraitTest extends AbstractTestCase {

    /**
     * Test setProvider()
     *
     * @return void
     */
    public function testSetProvider(): void {

        // Set a Quote provider mock.
        $quoteProvider = $this->getMockBuilder(QuoteProviderInterface::class)->getMock();

        $obj = new TestQuoteProviderTrait();

        $obj->setQuoteProvider($quoteProvider);
        $this->assertSame($quoteProvider, $obj->getQuoteProvider());
    }
}
