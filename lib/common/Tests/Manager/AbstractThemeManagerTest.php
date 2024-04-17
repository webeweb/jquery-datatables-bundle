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
use Twig\Environment;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestAbstractThemeManager;
use WBW\Library\Symfony\Provider\ThemeProviderInterface;

/**
 * Abstract theme manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class AbstractThemeManagerTest extends AbstractTestCase {

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Twig environment.
     *
     * @var Environment|null
     */
    private $twigEnvironment;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        /** @var array<string,mixed> $globals */
        $globals = [];

        // Set addGlobal() callback.
        $addGlobal = function(string $name, $value) use (&$globals): void {
            $globals[$name] = $value;
        };

        // Set getGlobals() callback.
        $getGlobals = function() use (&$globals): array {
            return $globals;
        };

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Twig environment mock.
        $this->twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();
        $this->twigEnvironment->expects($this->any())->method("addGlobal")->willReturnCallback($addGlobal);
        $this->twigEnvironment->expects($this->any())->method("getGlobals")->willReturnCallback($getGlobals);
    }

    /**
     * Test addGlobal()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddGlobal(): void {

        // Set a Theme provider mock.
        $provider = $this->getMockBuilder(ThemeProviderInterface::class)->getMock();

        $obj = new TestAbstractThemeManager($this->logger, $this->twigEnvironment);
        $obj->setProvider(ThemeProviderInterface::class, $provider);

        $obj->addGlobal();

        $res = $this->twigEnvironment->getGlobals();
        $this->assertCount(1, $res);

        $this->assertArrayHasKey("ThemeProvider", $res);
        $this->assertInstanceOf(ThemeProviderInterface::class, $res["ThemeProvider"]);
    }

    /**
     * Test addGlobal()
     *
     * @return void
     */
    public function testAddGlobalWithNull(): void {

        $obj = new TestAbstractThemeManager($this->logger, $this->twigEnvironment);

        $obj->addGlobal();

        $res = $this->twigEnvironment->getGlobals();
        $this->assertCount(0, $res);
    }

    /**
     * Test setProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetProvider(): void {

        // Set a Theme provider mock.
        $provider = $this->getMockBuilder(ThemeProviderInterface::class)->getMock();

        $obj = new TestAbstractThemeManager($this->logger, $this->twigEnvironment);

        $obj->setProvider(ThemeProviderInterface::class, $provider);
        $this->assertSame($provider, $obj->getProvider(ThemeProviderInterface::class));
    }

    /**
     * Test setProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetProviderWithOverwrite(): void {

        // Set a Theme provider mock.
        $provider1 = $this->getMockBuilder(ThemeProviderInterface::class)->getMock();
        $provider2 = $this->getMockBuilder(ThemeProviderInterface::class)->getMock();

        $obj = new TestAbstractThemeManager($this->logger, $this->twigEnvironment);

        $obj->setProvider(ThemeProviderInterface::class, $provider1);
        $this->assertSame($provider1, $obj->getProvider(ThemeProviderInterface::class));

        $obj->setProvider(ThemeProviderInterface::class, $provider2);
        $this->assertSame($provider2, $obj->getProvider(ThemeProviderInterface::class));
    }

    /**
     * Test __construct()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function test__construct(): void {

        $obj = new TestAbstractThemeManager($this->logger, $this->twigEnvironment);

        $this->assertSame($this->logger, $obj->getLogger());
        $this->assertNull($obj->getProvider(ThemeProviderInterface::class));
        $this->assertCount(0, $obj->getProviders());

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}
