<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Provider\Quote;

use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Quote\TestAbstractQuoteProvider;

/**
 * Abstract quote provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class AbstractQuoteProviderTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractQuoteProvider();

        $this->assertInstanceOf(ProviderInterface::class, $obj);
        $this->assertInstanceOf(QuoteProviderInterface::class, $obj);

        $this->assertEquals([], $obj->getAuthors());
        $this->assertEquals([], $obj->getQuotes());
    }
}
