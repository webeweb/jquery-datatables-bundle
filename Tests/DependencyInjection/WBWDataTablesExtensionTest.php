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

use Throwable;
use WBW\Bundle\CoreBundle\Twig\Extension\AssetsTwigExtension;
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
     * @var array<string,mixed>
     */
    private $configs;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Bootstrap renderer Twig extension mock
        $this->containerBuilder->set(AssetsTwigExtension::SERVICE_NAME, new AssetsTwigExtension($this->twigEnvironment));

        // Set a configs array mock.
        $this->configs = [
            WBWDataTablesExtension::EXTENSION_ALIAS => [],
        ];
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

        // Twig extensions.
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
