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

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Command\ListJavascriptProviderCommand;
use WBW\Bundle\CommonBundle\Command\ListQuoteProviderCommand;
use WBW\Bundle\CommonBundle\Command\UnzipAssetsCommand;
use WBW\Bundle\CommonBundle\Controller\HostController;
use WBW\Bundle\CommonBundle\Controller\TwigController;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;
use WBW\Bundle\CommonBundle\EventListener\KernelEventListener;
use WBW\Bundle\CommonBundle\EventListener\NotificationEventListener;
use WBW\Bundle\CommonBundle\EventListener\SecurityEventListener;
use WBW\Bundle\CommonBundle\EventListener\ToastEventListener;
use WBW\Bundle\CommonBundle\Manager\ColorManager;
use WBW\Bundle\CommonBundle\Manager\JavascriptManager;
use WBW\Bundle\CommonBundle\Manager\LayoutManager;
use WBW\Bundle\CommonBundle\Manager\QuoteManager;
use WBW\Bundle\CommonBundle\Manager\StylesheetManager;
use WBW\Bundle\CommonBundle\Provider\JavascriptProvider;
use WBW\Bundle\CommonBundle\Provider\Quote\WorldsWisdomQuoteProvider;
use WBW\Bundle\CommonBundle\Service\SessionService;
use WBW\Bundle\CommonBundle\Service\StatementService;
use WBW\Bundle\CommonBundle\Service\TokenService;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Twig\Extension\AssetsTwigExtension;
use WBW\Bundle\CommonBundle\Twig\Extension\ContainerTwigExtension;
use WBW\Bundle\CommonBundle\Twig\Extension\QuoteTwigExtension;
use WBW\Bundle\CommonBundle\Twig\Extension\StringTwigExtension;

/**
 * Common extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection
 */
class WBWCommonExtensionTest extends AbstractTestCase {

    /**
     * Configs.
     *
     * @var array<string,mixed>|null
     */
    private $configs;

    /**
     * Container builder.
     *
     * @var ContainerBuilder|null
     */
    private $containerBuilder;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a configs array mock.
        $this->configs = [
            WBWCommonExtension::EXTENSION_ALIAS => [
                "security" => true,
                "quote"    => [
                    "worlds_wisdom" => true,
                ],
            ],
        ];

        // Set an Entity manager mock.
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();

        // Set a Token storage mock.
        $tokenStorage = $this->getMockBuilder(TokenStorageInterface::class)->getMock();

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Parameter bag mock.
        $parameterBag = new ParameterBag([
            "kernel.environment" => "test",
            "kernel.project_dir" => realpath(__DIR__ . "/../../../../tests/Fixtures/app"),
        ]);

        // Set a Container builder mock.
        $this->containerBuilder = new ContainerBuilder($parameterBag);

        $this->containerBuilder->set("doctrine.orm.entity_manager", $entityManager);
        $this->containerBuilder->set("logger", $logger);
        $this->containerBuilder->set("router", $router);
        $this->containerBuilder->set("security.token_storage", $tokenStorage);
        $this->containerBuilder->set("translator", $translator);
        $this->containerBuilder->set("twig", $twigEnvironment);

        $this->containerBuilder->set("Psr\\Container\\ContainerInterface", $this->containerBuilder);
    }

    /**
     * Test load()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWCommonExtension();

        $obj->load($this->configs, $this->containerBuilder);

        // Commands
        $this->assertInstanceOf(ListJavascriptProviderCommand::class, $this->containerBuilder->get(ListJavascriptProviderCommand::SERVICE_NAME));
        $this->assertInstanceOf(ListQuoteProviderCommand::class, $this->containerBuilder->get(ListQuoteProviderCommand::SERVICE_NAME));
        $this->assertInstanceOf(UnzipAssetsCommand::class, $this->containerBuilder->get(UnzipAssetsCommand::SERVICE_NAME));

        // Controllers
        $this->assertInstanceOf(HostController::class, $this->containerBuilder->get(HostController::SERVICE_NAME));
        $this->assertInstanceOf(TwigController::class, $this->containerBuilder->get(TwigController::SERVICE_NAME));

        // Event listeners
        $this->assertInstanceOf(KernelEventListener::class, $this->containerBuilder->get(KernelEventListener::SERVICE_NAME));
        $this->assertInstanceOf(NotificationEventListener::class, $this->containerBuilder->get(NotificationEventListener::SERVICE_NAME));
        $this->assertInstanceOf(SecurityEventListener::class, $this->containerBuilder->get(SecurityEventListener::SERVICE_NAME));
        $this->assertInstanceOf(ToastEventListener::class, $this->containerBuilder->get(ToastEventListener::SERVICE_NAME));

        // Managers
        $this->assertInstanceOf(ColorManager::class, $this->containerBuilder->get(ColorManager::SERVICE_NAME));
        $this->assertInstanceOf(JavascriptManager::class, $this->containerBuilder->get(JavascriptManager::SERVICE_NAME));
        $this->assertInstanceOf(LayoutManager::class, $this->containerBuilder->get(LayoutManager::SERVICE_NAME));
        $this->assertInstanceOf(QuoteManager::class, $this->containerBuilder->get(QuoteManager::SERVICE_NAME));
        $this->assertInstanceOf(StylesheetManager::class, $this->containerBuilder->get(StylesheetManager::SERVICE_NAME));

        // Providers
        $this->assertInstanceOf(JavascriptProvider::class, $this->containerBuilder->get(JavascriptProvider::SERVICE_NAME));
        $this->assertInstanceOf(WorldsWisdomQuoteProvider::class, $this->containerBuilder->get(WorldsWisdomQuoteProvider::SERVICE_NAME));

        // Services
        $this->assertInstanceOf(SessionService::class, $this->containerBuilder->get(SessionService::SERVICE_NAME));
        $this->assertInstanceOf(StatementService::class, $this->containerBuilder->get(StatementService::SERVICE_NAME));
        $this->assertInstanceOf(TokenService::class, $this->containerBuilder->get(TokenService::SERVICE_NAME));

        // Twig extensions
        $this->assertInstanceOf(AssetsTwigExtension::class, $this->containerBuilder->get(AssetsTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(ContainerTwigExtension::class, $this->containerBuilder->get(ContainerTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(QuoteTwigExtension::class, $this->containerBuilder->get(QuoteTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(StringTwigExtension::class, $this->containerBuilder->get(StringTwigExtension::SERVICE_NAME));
    }

    /**
     * Test loadYamlConfig()
     *
     * @return void
     */
    public function testLoadYamlConfig(): void {

        // Set a path mock.
        $path = realpath(__DIR__ . "/../Fixtures/Resources/config");

        $res = WBWCommonExtension::loadYamlConfig($path, "config");
        $this->assertNotEquals([], $res);
    }

    /**
     * Test loadYamlConfig()
     *
     * @return void
     */
    public function testLoadYamlConfigWithoutFilename(): void {

        // Set a path mock.
        $path = realpath(__DIR__ . "/../Fixtures/Resources/config");

        $res = WBWCommonExtension::loadYamlConfig($path, "error");
        $this->assertEquals([], $res);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_common", WBWCommonExtension::EXTENSION_ALIAS);
    }
}
