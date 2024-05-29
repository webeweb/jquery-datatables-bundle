<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use Psr\Log\LoggerInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Manager\LayoutManager;
use WBW\Bundle\CommonBundle\Manager\LayoutManagerInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\ApplicationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\BreadcrumbsLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\FooterLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\HookDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\NavigationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\NotificationsDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\SearchLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\TasksDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\UserInfoLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Layout manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class LayoutManagerTest extends AbstractTestCase {

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
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        // Set a Provider mock.
        $provider = $this->getMockBuilder(ProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->addProvider($provider);
        $this->assertFalse($obj->hasProviders());
    }

    /**
     * Test hasProviders()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testHasProviders(): void {

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $this->assertFalse($obj->hasProviders());
    }

    /**
     * Test registerTwigGlobals()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRegisterTwigGlobals(): void {

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);
        $obj->setApplicationLayoutProvider($this->getMockBuilder(ApplicationLayoutProviderInterface::class)->getMock());
        $obj->setBreadcrumbsLayoutProvider($this->getMockBuilder(BreadcrumbsLayoutProviderInterface::class)->getMock());
        $obj->setHookDropdownLayoutProvider($this->getMockBuilder(HookDropdownLayoutProviderInterface::class)->getMock());
        $obj->setFooterLayoutProvider($this->getMockBuilder(FooterLayoutProviderInterface::class)->getMock());
        $obj->setNavigationLayoutProvider($this->getMockBuilder(NavigationLayoutProviderInterface::class)->getMock());
        $obj->setNotificationsDropdownLayoutProvider($this->getMockBuilder(NotificationsDropdownLayoutProviderInterface::class)->getMock());
        $obj->setSearchLayoutProvider($this->getMockBuilder(SearchLayoutProviderInterface::class)->getMock());
        $obj->setTasksDropdownLayoutProvider($this->getMockBuilder(TasksDropdownLayoutProviderInterface::class)->getMock());
        $obj->setUserInfoLayoutProvider($this->getMockBuilder(UserInfoLayoutProviderInterface::class)->getMock());

        $obj->registerTwigGlobals();

        $res = $this->twigEnvironment->getGlobals();
        $this->assertCount(9, $res);

        $this->assertInstanceOf(ApplicationLayoutProviderInterface::class, $res["applicationLayoutProvider"]);
        $this->assertInstanceOf(BreadcrumbsLayoutProviderInterface::class, $res["breadcrumbsLayoutProvider"]);
        $this->assertInstanceOf(FooterLayoutProviderInterface::class, $res["footerLayoutProvider"]);
        $this->assertInstanceOf(HookDropdownLayoutProviderInterface::class, $res["hookDropdownLayoutProvider"]);
        $this->assertInstanceOf(NavigationLayoutProviderInterface::class, $res["navigationLayoutProvider"]);
        $this->assertInstanceOf(NotificationsDropdownLayoutProviderInterface::class, $res["notificationsDropdownLayoutProvider"]);
        $this->assertInstanceOf(TasksDropdownLayoutProviderInterface::class, $res["tasksDropdownLayoutProvider"]);
        $this->assertInstanceOf(SearchLayoutProviderInterface::class, $res["searchLayoutProvider"]);
        $this->assertInstanceOf(UserInfoLayoutProviderInterface::class, $res["userInfoLayoutProvider"]);
    }

    /**
     * Test registerTwigGlobals()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRegisterTwigGlobalsWithoutProviders(): void {

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->registerTwigGlobals();

        $res = $this->twigEnvironment->getGlobals();
        $this->assertCount(0, $res);
    }

    /**
     * Test setApplicationLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetApplicationLayoutProvider(): void {

        // Set an Application layout provider mock.
        $provider = $this->getMockBuilder(ApplicationLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setApplicationLayoutProvider($provider);
        $this->assertSame($provider, $obj->getApplicationLayoutProvider());
    }

    /**
     * Test setBreadcrumbsLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetBreadcrumbsLayoutProvider(): void {

        // Set a Breadcrumbs layout provider mock.
        $provider = $this->getMockBuilder(BreadcrumbsLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setBreadcrumbsLayoutProvider($provider);
        $this->assertSame($provider, $obj->getBreadcrumbsLayoutProvider());
    }

    /**
     * Test setFooterLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetFooterLayoutProvider(): void {

        // Set a Footer layout provider mock.
        $provider = $this->getMockBuilder(FooterLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setFooterLayoutProvider($provider);
        $this->assertSame($provider, $obj->getFooterLayoutProvider());
    }

    /**
     * Test setHookDropdownLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetHookDropdownLayoutProvider(): void {

        // Set a Hook dropdown layout provider mock.
        $provider = $this->getMockBuilder(HookDropdownLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setHookDropdownLayoutProvider($provider);
        $this->assertSame($provider, $obj->getHookDropdownLayoutProvider());
    }

    /**
     * Test setNavigationLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetNavigationLayoutProvider(): void {

        // Set a Navigation layout provider mock.
        $provider = $this->getMockBuilder(NavigationLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setNavigationLayoutProvider($provider);
        $this->assertSame($provider, $obj->getNavigationLayoutProvider());
    }

    /**
     * Test setNotificationsDropdownLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetNotificationsDropdownLayoutProvider(): void {

        // Set a Notifications dropdown layout provider mock.
        $provider = $this->getMockBuilder(NotificationsDropdownLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setNotificationsDropdownLayoutProvider($provider);
        $this->assertSame($provider, $obj->getNotificationsDropdownLayoutProvider());
    }

    /**
     * Test setSearchLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetSearchLayoutProvider(): void {

        // Set a Search layout provider mock.
        $provider = $this->getMockBuilder(SearchLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setSearchLayoutProvider($provider);
        $this->assertSame($provider, $obj->getSearchLayoutProvider());
    }

    /**
     * Test setTasksDropdownLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetTasksDropdownLayoutProvider(): void {

        // Set a Tasks dropdown layout provider mock.
        $provider = $this->getMockBuilder(TasksDropdownLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setTasksDropdownLayoutProvider($provider);
        $this->assertSame($provider, $obj->getTasksDropdownLayoutProvider());
    }

    /**
     * Test setUserInfoLayoutProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetUserInfoLayoutProvider(): void {

        // Set a User info layout provider mock.
        $provider = $this->getMockBuilder(UserInfoLayoutProviderInterface::class)->getMock();

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $obj->setUserInfoLayoutProvider($provider);
        $this->assertSame($provider, $obj->getUserInfoLayoutProvider());
    }

    /**
     * Test __construct()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.manager.layout", LayoutManager::SERVICE_NAME);

        $obj = new LayoutManager($this->logger, $this->twigEnvironment);

        $this->assertInstanceOf(LayoutManagerInterface::class, $obj);

        $this->assertSame($this->logger, $obj->getLogger());
        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());

        $this->assertNull($obj->getApplicationLayoutProvider());
        $this->assertNull($obj->getBreadcrumbsLayoutProvider());
        $this->assertNull($obj->getFooterLayoutProvider());
        $this->assertNull($obj->getHookDropdownLayoutProvider());
        $this->assertNull($obj->getNavigationLayoutProvider());
        $this->assertNull($obj->getNotificationsDropdownLayoutProvider());
        $this->assertNull($obj->getSearchLayoutProvider());
        $this->assertNull($obj->getTasksDropdownLayoutProvider());
        $this->assertNull($obj->getUserInfoLayoutProvider());
    }
}
