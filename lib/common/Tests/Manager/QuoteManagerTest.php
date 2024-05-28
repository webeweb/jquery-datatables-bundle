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

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Manager\QuoteManager;
use WBW\Bundle\CommonBundle\Manager\QuoteManagerInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Quote manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class QuoteManagerTest extends AbstractTestCase {

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Quote provider.
     *
     * @var QuoteProviderInterface
     */
    private $quoteProvider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Quote provider mock.
        $this->quoteProvider = $this->getMockBuilder(QuoteProviderInterface::class)->getMock();
        $this->quoteProvider->expects($this->any())->method("getDomain")->willReturn("domain");
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        $obj = new QuoteManager($this->logger);

        $obj->addProvider($this->quoteProvider);
        $this->assertSame($this->quoteProvider, $obj->getProviders()[0]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProviderWithAlreadyRegisteredException(): void {

        $obj = new QuoteManager($this->logger);
        $obj->addProvider($this->quoteProvider);

        try {

            $obj->addProvider($this->quoteProvider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(AlreadyRegisteredProviderException::class, $ex);
        }
    }

    /**
     * Test containsProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testContainsProvider(): void {

        $obj = new QuoteManager($this->logger);

        $this->assertFalse($obj->containsProvider($this->quoteProvider));

        $obj->addProvider($this->quoteProvider);
        $this->assertTrue($obj->containsProvider($this->quoteProvider));
    }

    /**
     * Test contains()
     *
     * @return void
     */
    public function testContainsWithInvalidArgumentException(): void {

        // Set a Provider mock.
        $provider = $this->getMockBuilder(ProviderInterface::class)->getMock();

        $obj = new QuoteManager($this->logger);

        try {

            $obj->containsProvider($provider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements " . QuoteProviderInterface::class, $ex->getMessage());
        }
    }

    /**
     * Test getProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetProvider(): void {

        $obj = new QuoteManager($this->logger);
        $obj->addProvider($this->quoteProvider);

        $this->assertSame($this->quoteProvider, $obj->getProvider("domain"));
        $this->assertNull($obj->getProvider("github"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.manager.quote", QuoteManager::SERVICE_NAME);

        $obj = new QuoteManager($this->logger);

        $this->assertInstanceOf(ManagerInterface::class, $obj);
        $this->assertInstanceOf(QuoteManagerInterface::class, $obj);

        $this->assertEquals([], $obj->getProviders());
    }
}
