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

use DateInterval;
use DateTime;
use InvalidArgumentException;
use Throwable;
use WBW\Bundle\CommonBundle\Provider\Quote\WorldsWisdomQuoteProvider;
use WBW\Bundle\CommonBundle\Provider\Quote\YamlQuoteProvider;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Quote\TestYamlQuoteProvider;

/**
 * YAML quote provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Quote
 */
class YamlQuoteProviderTest extends AbstractTestCase {

    /**
     * Filename.
     *
     * @var string
     */
    private $filename;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        $this->filename = realpath(WorldsWisdomQuoteProvider::RESOURCE_PATH);
    }

    /**
     * Test load()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        // Set a Date mock.
        $date = new DateTime("2016-01-01");

        $obj = new TestYamlQuoteProvider($this->filename);

        $obj->load();
        $this->assertCount(171, $obj->getAuthors());
        $this->assertCount(366, $obj->getQuotes());

        do {

            $day = $date->format("m.d");
            $this->assertArrayHasKey($day, $obj->getQuotes());

            $this->assertNotNull($obj->getQuotes()[$day]->getDate());
            $this->assertEquals($day, $obj->getQuotes()[$day]->getDate()->format("m.d"));

            $this->assertNotNull($obj->getQuotes()[$day]->getAuthor());
            $this->assertNotNull($obj->getQuotes()[$day]->getContent());
            $this->assertNotNull($obj->getQuotes()[$day]->getSaint());

            $date->add(new DateInterval("P1D"));
        } while ("2017" !== $date->format("Y"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new YamlQuoteProvider($this->filename);

        $this->assertInstanceOf(QuoteProviderInterface::class, $obj);

        $this->assertEquals($this->filename, $obj->getFilename());
        $this->assertEquals([], $obj->getAuthors());
        $this->assertEquals("WorldsWisdom.fr", $obj->getDomain());
        $this->assertEquals([], $obj->getQuotes());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__constructWithInvalidArgumentException(): void {

        try {

            new YamlQuoteProvider("exception");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The file "exception" was not found', $ex->getMessage());
        }
    }
}
