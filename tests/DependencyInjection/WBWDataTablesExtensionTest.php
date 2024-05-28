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

namespace WBW\Bundle\DataTablesBundle\Tests\DependencyInjection;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\DataTablesBundle\Command\DataTablesProviderListCommand;
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
        $this->assertInstanceOf(DataTablesProviderListCommand::class, $this->containerBuilder->get(DataTablesProviderListCommand::SERVICE_NAME));

        // Controllers
        $this->assertInstanceOf(DataTablesController::class, $this->containerBuilder->get(DataTablesController::SERVICE_NAME));

        // Managers
        $this->assertInstanceOf(DataTablesManager::class, $this->containerBuilder->get(DataTablesManager::SERVICE_NAME));

        // Twig extensions
        $this->assertInstanceOf(DataTablesTwigExtension::class, $this->containerBuilder->get(DataTablesTwigExtension::SERVICE_NAME));
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
