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

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Manager\JavascriptManager;
use WBW\Bundle\CommonBundle\Manager\JavascriptManagerInterface;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Javascript manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class JavascriptManagerTest extends AbstractTestCase {

    /**
     * Javascript provider.
     *
     * @var JavascriptProviderInterface|null
     */
    private $javascriptProvider;

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Javascript provider mock.
        $this->javascriptProvider = $this->getMockBuilder(JavascriptProviderInterface::class)->getMock();
        $this->javascriptProvider->expects($this->any())->method("getJavascripts")->willReturn([]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        $obj = new JavascriptManager($this->logger);

        $obj->addProvider($this->javascriptProvider);
        $this->assertSame($this->javascriptProvider, $obj->getProviders()[0]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProviderWithAlreadyRegisteredException(): void {

        $obj = new JavascriptManager($this->logger);
        $obj->addProvider($this->javascriptProvider);

        try {

            $obj->addProvider($this->javascriptProvider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(AlreadyRegisteredProviderException::class, $ex);
        }
    }

    /**
     * Test addProvider()
     *
     * @return void
     */
    public function testAddProviderWithInvalidArgumentException(): void {

        // Set a Provider mock.
        $provider = $this->getMockBuilder(ProviderInterface::class)->getMock();

        $obj = new JavascriptManager($this->logger);

        try {

            $obj->addProvider($provider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements " . JavascriptProviderInterface::class, $ex->getMessage());
        }
    }

    /**
     * Test getJavascripts()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetJavascripts(): void {

        $obj = new JavascriptManager($this->logger);

        $obj->addProvider($this->javascriptProvider);
        $this->assertEquals([], $obj->getJavascripts());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.manager.javascript", JavascriptManager::SERVICE_NAME);

        $obj = new JavascriptManager($this->logger);

        $this->assertInstanceOf(ManagerInterface::class, $obj);
        $this->assertInstanceOf(JavascriptManagerInterface::class, $obj);

        $this->assertEquals([], $obj->getProviders());
    }
}
