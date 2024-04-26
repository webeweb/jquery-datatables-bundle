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

namespace WBW\Bundle\CommonBundle\Tests\Provider\Quote;

use WBW\Bundle\CommonBundle\Provider\Quote\WorldsWisdomQuoteProvider;
use WBW\Bundle\CommonBundle\Provider\Quote\YamlQuoteProvider;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * World's wisdom quote provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Quote
 */
class WorldsWisdomQuoteProviderTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertStringEndsWith("/Resources/assets/quote/WorldsWisdom.fr.yml", WorldsWisdomQuoteProvider::RESOURCE_PATH);
        $this->assertEquals("wbw.common.provider.quote.worlds_wisdom", WorldsWisdomQuoteProvider::SERVICE_NAME);

        $obj = new WorldsWisdomQuoteProvider();

        $this->assertInstanceOf(QuoteProviderInterface::class, $obj);
        $this->assertInstanceOf(YamlQuoteProvider::class, $obj);
    }
}
