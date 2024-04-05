<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
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
use WBW\Bundle\CommonBundle\Manager\ThemeManager;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Provider\Theme\ApplicationThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\BreadcrumbsThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\FooterThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\HookDropdownThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\NavigationThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\NotificationsDropdownThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\SearchThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\TasksDropdownThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\UserInfoThemeProviderInterface;

/**
 * Theme manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class ThemeManagerTest extends AbstractTestCase {

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

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        // Set the Theme provider mocks.
        $obj->setApplicationThemeProvider($this->getMockBuilder(ApplicationThemeProviderInterface::class)->getMock());
        $obj->setBreadcrumbsThemeProvider($this->getMockBuilder(BreadcrumbsThemeProviderInterface::class)->getMock());
        $obj->setHookDropdownThemeProvider($this->getMockBuilder(HookDropdownThemeProviderInterface::class)->getMock());
        $obj->setFooterThemeProvider($this->getMockBuilder(FooterThemeProviderInterface::class)->getMock());
        $obj->setNavigationThemeProvider($this->getMockBuilder(NavigationThemeProviderInterface::class)->getMock());
        $obj->setNotificationsDropdownThemeProvider($this->getMockBuilder(NotificationsDropdownThemeProviderInterface::class)->getMock());
        $obj->setSearchThemeProvider($this->getMockBuilder(SearchThemeProviderInterface::class)->getMock());
        $obj->setTasksDropdownThemeProvider($this->getMockBuilder(TasksDropdownThemeProviderInterface::class)->getMock());
        $obj->setUserInfoThemeProvider($this->getMockBuilder(UserInfoThemeProviderInterface::class)->getMock());

        $obj->addGlobal();

        $res = $this->twigEnvironment->getGlobals();
        $this->assertCount(9, $res);

        $this->assertArrayHasKey("ApplicationThemeProvider", $res);
        $this->assertInstanceOf(ApplicationThemeProviderInterface::class, $res["ApplicationThemeProvider"]);

        $this->assertArrayHasKey("BreadcrumbsThemeProvider", $res);
        $this->assertInstanceOf(BreadcrumbsThemeProviderInterface::class, $res["BreadcrumbsThemeProvider"]);

        $this->assertArrayHasKey("FooterThemeProvider", $res);
        $this->assertInstanceOf(FooterThemeProviderInterface::class, $res["FooterThemeProvider"]);

        $this->assertArrayHasKey("HookDropdownThemeProvider", $res);
        $this->assertInstanceOf(HookDropdownThemeProviderInterface::class, $res["HookDropdownThemeProvider"]);

        $this->assertArrayHasKey("NavigationThemeProvider", $res);
        $this->assertInstanceOf(NavigationThemeProviderInterface::class, $res["NavigationThemeProvider"]);

        $this->assertArrayHasKey("NotificationsDropdownThemeProvider", $res);
        $this->assertInstanceOf(NotificationsDropdownThemeProviderInterface::class, $res["NotificationsDropdownThemeProvider"]);

        $this->assertArrayHasKey("TasksDropdownThemeProvider", $res);
        $this->assertInstanceOf(TasksDropdownThemeProviderInterface::class, $res["TasksDropdownThemeProvider"]);

        $this->assertArrayHasKey("SearchThemeProvider", $res);
        $this->assertInstanceOf(SearchThemeProviderInterface::class, $res["SearchThemeProvider"]);

        $this->assertArrayHasKey("UserInfoThemeProvider", $res);
        $this->assertInstanceOf(UserInfoThemeProviderInterface::class, $res["UserInfoThemeProvider"]);
    }

    /**
     * Test hasProviders()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testHasProviders(): void {

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $this->assertFalse($obj->hasProviders());

        $obj->setApplicationThemeProvider($this->getMockBuilder(ApplicationThemeProviderInterface::class)->getMock());
        $this->assertTrue($obj->hasProviders());
    }

    /**
     * Test setApplicationThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetApplicationThemeProvider(): void {

        // Set an Application theme provider mock.
        $provider = $this->getMockBuilder(ApplicationThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setApplicationThemeProvider($this->getMockBuilder(ApplicationThemeProviderInterface::class)->getMock());
        $this->assertNotSame($provider, $obj->getApplicationThemeProvider());

        $obj->setApplicationThemeProvider($provider);
        $this->assertSame($provider, $obj->getApplicationThemeProvider());
    }

    /**
     * Test setBreadcrumbsThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetBreadcrumbsThemeProvider(): void {

        // Set a Breadcrumbs theme provider mock.
        $provider = $this->getMockBuilder(BreadcrumbsThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setBreadcrumbsThemeProvider($provider);
        $this->assertSame($provider, $obj->getBreadcrumbsThemeProvider());
    }

    /**
     * Test setFooterThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetFooterThemeProvider(): void {

        // Set a Footer theme provider mock.
        $provider = $this->getMockBuilder(FooterThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setFooterThemeProvider($provider);
        $this->assertSame($provider, $obj->getFooterThemeProvider());
    }

    /**
     * Test setHookDropdownThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetHookDropdownThemeProvider(): void {

        // Set a Hook dropdown theme provider mock.
        $provider = $this->getMockBuilder(HookDropdownThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setHookDropdownThemeProvider($provider);
        $this->assertSame($provider, $obj->getHookDropdownThemeProvider());
    }

    /**
     * Test setNavigationThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetNavigationThemeProvider(): void {

        // Set a Navigation theme provider mock.
        $provider = $this->getMockBuilder(NavigationThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setNavigationThemeProvider($provider);
        $this->assertSame($provider, $obj->getNavigationThemeProvider());
    }

    /**
     * Test setNotificationsDropdownThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetNotificationsDropdownThemeProvider(): void {

        // Set a Notifications dropdown theme provider mock.
        $provider = $this->getMockBuilder(NotificationsDropdownThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setNotificationsDropdownThemeProvider($provider);
        $this->assertSame($provider, $obj->getNotificationsDropdownThemeProvider());
    }

    /**
     * Test setSearchThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetSearchThemeProvider(): void {

        // Set a Search theme provider mock.
        $provider = $this->getMockBuilder(SearchThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setSearchThemeProvider($provider);
        $this->assertSame($provider, $obj->getSearchThemeProvider());
    }

    /**
     * Test setTasksDropdownThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetTasksDropdownThemeProvider(): void {

        // Set a Tasks dropdown theme provider mock.
        $provider = $this->getMockBuilder(TasksDropdownThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setTasksDropdownThemeProvider($provider);
        $this->assertSame($provider, $obj->getTasksDropdownThemeProvider());
    }

    /**
     * Test setUserInfoThemeProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetUserInfoThemeProvider(): void {

        // Set a User info theme provider mock.
        $provider = $this->getMockBuilder(UserInfoThemeProviderInterface::class)->getMock();

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $obj->setUserInfoThemeProvider($provider);
        $this->assertSame($provider, $obj->getUserInfoThemeProvider());
    }

    /**
     * Test __construct()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.manager.theme", ThemeManager::SERVICE_NAME);

        $obj = new ThemeManager($this->logger, $this->twigEnvironment);

        $this->assertNull($obj->getApplicationThemeProvider());
        $this->assertNull($obj->getBreadcrumbsThemeProvider());
        $this->assertNull($obj->getFooterThemeProvider());
        $this->assertNull($obj->getHookDropdownThemeProvider());
        $this->assertNull($obj->getNavigationThemeProvider());
        $this->assertNull($obj->getNotificationsDropdownThemeProvider());
        $this->assertNull($obj->getSearchThemeProvider());
        $this->assertNull($obj->getTasksDropdownThemeProvider());
        $this->assertNull($obj->getUserInfoThemeProvider());
    }
}
