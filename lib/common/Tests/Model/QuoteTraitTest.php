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

namespace WBW\Bundle\CommonBundle\Tests\Model;

use WBW\Bundle\CommonBundle\Model\QuoteInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Model\TestQuoteTrait;

/**
 * Quote trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Model
 */
class QuoteTraitTest extends AbstractTestCase {

    /**
     * Test setQuote()
     *
     * @return void
     */
    public function testSetQuote(): void {

        // Set a Quote mock.
        $quote = $this->getMockBuilder(QuoteInterface::class)->getMock();

        $obj = new TestQuoteTrait();

        $obj->setQuote($quote);
        $this->assertSame($quote, $obj->getQuote());
    }
}
