<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use WBW\Bundle\CommonBundle\Manager\QuoteManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestQuoteManagerTrait;

/**
 * Quote manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class QuoteManagerTraitTest extends AbstractTestCase {

    /**
     * Test setQuoteManager()
     *
     * @return void
     */
    public function testSetQuoteManager(): void {

        // Set a Quote manager mock.
        $quoteManager = $this->getMockBuilder(QuoteManagerInterface::class)->getMock();

        $obj = new TestQuoteManagerTrait();

        $obj->setQuoteManager($quoteManager);
        $this->assertSame($quoteManager, $obj->getQuoteManager());
    }
}
