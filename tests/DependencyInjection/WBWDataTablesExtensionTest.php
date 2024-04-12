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

namespace WBW\Bundle\DataTablesBundle\Tests\DependencyInjection;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AssetsTwigExtension as BootstrapAssetsTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\AlertTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ProgressBarTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\CodeTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\TypographyTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\FontAwesomeTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\GlyphiconTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\IconTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MaterialDesignIconicFontTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MeteoconsTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Layout\GridTwigExtension;
use WBW\Bundle\CommonBundle\EventListener\NotificationEventListener;
use WBW\Bundle\CommonBundle\EventListener\ToastEventListener;
use WBW\Bundle\CommonBundle\Service\SessionService;
use WBW\Bundle\CommonBundle\Twig\Extension\AssetsTwigExtension as CommonAssetsTwigExtension;
use WBW\Bundle\CommonBundle\Twig\Extension\ContainerTwigExtension;
use WBW\Bundle\DataTablesBundle\Command\ListDataTablesProviderCommand;
use WBW\Bundle\DataTablesBundle\Controller\DataTablesController;
use WBW\Bundle\DataTablesBundle\DependencyInjection\Configuration;
use WBW\Bundle\DataTablesBundle\DependencyInjection\WBWDataTablesExtension;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\DependencyInjection
 */
class WBWDataTablesExtensionTest extends AbstractTestCase {

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
            WBWDataTablesExtension::EXTENSION_ALIAS => [],
        ];

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Parameter bag mock.
        $parameterBag = new ParameterBag([
            "kernel.environment" => "test",
            "kernel.project_dir" => realpath(__DIR__ . "/../Fixtures/app"),
        ]);

        // Set a Container builder mock.
        $this->containerBuilder = new ContainerBuilder($parameterBag);

        $this->containerBuilder->set("logger", $logger);
        $this->containerBuilder->set("router", $router);
        $this->containerBuilder->set("translator", $translator);
        $this->containerBuilder->set("twig", $twigEnvironment);

        $this->containerBuilder->set("Psr\\Container\\ContainerInterface", $this->containerBuilder);
    }

    /**
     * Test getAlias()
     *
     * @return void
     */
    public function testGetAlias(): void {

        $obj = new WBWDataTablesExtension();

        $this->assertEquals(WBWDataTablesExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Test getConfiguration()
     *
     * @return void
     */
    public function testGetConfiguration(): void {

        $obj = new WBWDataTablesExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Test load()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWDataTablesExtension();

        $obj->load($this->configs, $this->containerBuilder);

        // Commands
        $this->assertInstanceOf(ListDataTablesProviderCommand::class, $this->containerBuilder->get(ListDataTablesProviderCommand::SERVICE_NAME));

        // Controllers
        $this->assertInstanceOf(DataTablesController::class, $this->containerBuilder->get(DataTablesController::SERVICE_NAME));

        // Managers
        $this->assertInstanceOf(DataTablesManager::class, $this->containerBuilder->get(DataTablesManager::SERVICE_NAME));

        // Twig extensions
        $this->assertInstanceOf(DataTablesTwigExtension::class, $this->containerBuilder->get(DataTablesTwigExtension::SERVICE_NAME));

        // === Bootstrap bundle ===============================================
        // Twig extensions
        $this->assertInstanceOf(BootstrapAssetsTwigExtension::class, $this->containerBuilder->get(BootstrapAssetsTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(AlertTwigExtension::class, $this->containerBuilder->get(AlertTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(BadgeTwigExtension::class, $this->containerBuilder->get(BadgeTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(ButtonTwigExtension::class, $this->containerBuilder->get(ButtonTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(LabelTwigExtension::class, $this->containerBuilder->get(LabelTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(ProgressBarTwigExtension::class, $this->containerBuilder->get(ProgressBarTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(CodeTwigExtension::class, $this->containerBuilder->get(CodeTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(TypographyTwigExtension::class, $this->containerBuilder->get(TypographyTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(FontAwesomeTwigExtension::class, $this->containerBuilder->get(FontAwesomeTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(GlyphiconTwigExtension::class, $this->containerBuilder->get(GlyphiconTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(IconTwigExtension::class, $this->containerBuilder->get(IconTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(MaterialDesignIconicFontTwigExtension::class, $this->containerBuilder->get(MaterialDesignIconicFontTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(MeteoconsTwigExtension::class, $this->containerBuilder->get(MeteoconsTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(GridTwigExtension::class, $this->containerBuilder->get(GridTwigExtension::SERVICE_NAME));

        // === Common bundle ==================================================
        // Event listeners
        $this->assertInstanceOf(NotificationEventListener::class, $this->containerBuilder->get(NotificationEventListener::SERVICE_NAME));
        $this->assertInstanceOf(ToastEventListener::class, $this->containerBuilder->get(ToastEventListener::SERVICE_NAME));

        // Services
        $this->assertInstanceOf(SessionService::class, $this->containerBuilder->get(SessionService::SERVICE_NAME));

        // Twig extensions
        $this->assertInstanceOf(CommonAssetsTwigExtension::class, $this->containerBuilder->get(CommonAssetsTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(ContainerTwigExtension::class, $this->containerBuilder->get(ContainerTwigExtension::SERVICE_NAME));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_datatables", WBWDataTablesExtension::EXTENSION_ALIAS);
    }
}
