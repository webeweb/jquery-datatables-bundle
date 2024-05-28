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

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Manager\StylesheetManager;
use WBW\Bundle\CommonBundle\Manager\StylesheetManagerInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Provider\StylesheetProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Stylesheet manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class StylesheetManagerTest extends AbstractTestCase {

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Stylesheet provider.
     *
     * @var StylesheetProviderInterface|null
     */
    private $stylesheetProvider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Stylesheet provider mock.
        $this->stylesheetProvider = $this->getMockBuilder(StylesheetProviderInterface::class)->getMock();
        $this->stylesheetProvider->expects($this->any())->method("getStylesheets")->willReturn([]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        $obj = new StylesheetManager($this->logger);

        $obj->addProvider($this->stylesheetProvider);
        $this->assertSame($this->stylesheetProvider, $obj->getProviders()[0]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProviderWithAlreadyRegisteredException(): void {

        $obj = new StylesheetManager($this->logger);
        $obj->addProvider($this->stylesheetProvider);

        try {

            $obj->addProvider($this->stylesheetProvider);
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

        $obj = new StylesheetManager($this->logger);

        try {

            $obj->addProvider($provider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements " . StylesheetProviderInterface::class, $ex->getMessage());
        }
    }

    /**
     * Test getStylesheets()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetStylesheets(): void {

        $obj = new StylesheetManager($this->logger);

        $obj->addProvider($this->stylesheetProvider);
        $this->assertEquals([], $obj->getStylesheets());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.manager.stylesheet", StylesheetManager::SERVICE_NAME);

        $obj = new StylesheetManager($this->logger);

        $this->assertInstanceOf(ManagerInterface::class, $obj);
        $this->assertInstanceOf(StylesheetManagerInterface::class, $obj);

        $this->assertEquals([], $obj->getProviders());
    }
}
