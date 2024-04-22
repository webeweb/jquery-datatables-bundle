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

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestAbstractManager;

/**
 * Abstract manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class AbstractManagerTest extends AbstractTestCase {

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Provider.
     *
     * @var ProviderInterface|null
     */
    private $provider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Provider mock.
        $this->provider = $this->getMockBuilder(ProviderInterface::class)->getMock();
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        $obj = new TestAbstractManager($this->logger);

        $obj->addProvider($this->provider);
        $this->assertSame($this->provider, $obj->getProviders()[0]);
        $this->assertEquals(1, $obj->size());
    }

    /**
     * Test containsProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testContainsProvider(): void {

        $obj = new TestAbstractManager($this->logger);

        $this->assertFalse($obj->containsProvider($this->provider));

        $obj->addProvider($this->provider);
        $this->assertTrue($obj->containsProvider($this->provider));
    }

    /**
     * Test hasProviders()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testHasProviders(): void {

        $obj = new TestAbstractManager($this->logger);

        $this->assertFalse($obj->hasProviders());

        $obj->addProvider($this->provider);
        $this->assertTrue($obj->hasProviders());
    }

    /**
     * Test indexOfProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testIndexOfProvider(): void {

        // Set a Provider mock.
        $provider = $this->getMockBuilder(ProviderInterface::class)->getMock();

        $obj = new TestAbstractManager($this->logger);

        $obj->addProvider($provider);
        $this->assertEquals(-1, $obj->indexOfProvider($this->provider));

        $obj->addProvider($this->provider);
        $this->assertEquals(1, $obj->indexOfProvider($this->provider));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractManager($this->logger);

        $this->assertInstanceOf(ManagerInterface::class, $obj);

        $this->assertEquals([], $obj->getProviders());
        $this->assertEquals(0, $obj->size());
    }
}
