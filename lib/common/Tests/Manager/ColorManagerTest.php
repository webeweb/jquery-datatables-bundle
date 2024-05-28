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
use WBW\Bundle\CommonBundle\Manager\ColorManager;
use WBW\Bundle\CommonBundle\Manager\ColorManagerInterface;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Color manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class ColorManagerTest extends AbstractTestCase {

    /**
     * Color provider.
     *
     * @var ColorProviderInterface|null
     */
    private $colorProvider;

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

        // Set a Color provider mock.
        $this->colorProvider = $this->getMockBuilder(ColorProviderInterface::class)->getMock();
        $this->colorProvider->expects($this->any())->method("getName")->willReturn("name");
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        $obj = new ColorManager($this->logger);

        $obj->addProvider($this->colorProvider);
        $this->assertSame($this->colorProvider, $obj->getProviders()[0]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProviderWithAlreadyRegisteredException(): void {

        $obj = new ColorManager($this->logger);
        $obj->addProvider($this->colorProvider);

        try {

            $obj->addProvider($this->colorProvider);
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

        $obj = new ColorManager($this->logger);

        try {

            $obj->addProvider($provider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements " . ColorProviderInterface::class, $ex->getMessage());
        }
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.manager.color", ColorManager::SERVICE_NAME);

        $obj = new ColorManager($this->logger);

        $this->assertInstanceOf(ManagerInterface::class, $obj);
        $this->assertInstanceOf(ColorManagerInterface::class, $obj);

        $this->assertEquals([], $obj->getProviders());
    }
}
