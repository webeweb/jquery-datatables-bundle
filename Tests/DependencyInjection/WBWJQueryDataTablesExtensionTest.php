<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\DependencyInjection;

use Exception;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\Configuration;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\WBWJQueryDataTablesExtension;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\DependencyInjection
 */
class DataTablesExtensionTest extends AbstractTestCase {

    /**
     * Configs.
     *
     * @var array
     */
    private $configs;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Bootstrap renderer Twig extension mock
        $this->containerBuilder->set("wbw.core.twig.extension.renderer", new RendererTwigExtension($this->twigEnvironment));

        // Set a configs array mock.
        $this->configs = [
            WBWJQueryDataTablesExtension::EXTENSION_ALIAS => [
                "twig" => true,
            ],
        ];
    }

    /**
     * Tests the getAlias() method.
     *
     * @return void
     */
    public function testGetAlias(): void {

        $obj = new WBWJQueryDataTablesExtension();

        $this->assertEquals(WBWJQueryDataTablesExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Tests the getConfiguration() method.
     *
     * @return void
     */
    public function testGetConfiguration(): void {

        $obj = new WBWJQueryDataTablesExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWJQueryDataTablesExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        // Managers
        $this->assertInstanceOf(DataTablesManager::class, $this->containerBuilder->get(DataTablesManager::SERVICE_NAME));

        // Twig extensions.
        $this->assertInstanceOf(DataTablesTwigExtension::class, $this->containerBuilder->get(DataTablesTwigExtension::SERVICE_NAME));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoadWithoutTwig(): void {

        // Set the configs mock.
        $this->configs[WBWJQueryDataTablesExtension::EXTENSION_ALIAS]["twig"] = false;

        $obj = new WBWJQueryDataTablesExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        try {

            $this->containerBuilder->get(DataTablesTwigExtension::SERVICE_NAME);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ServiceNotFoundException::class, $ex);
            $this->assertStringContainsString(DataTablesTwigExtension::SERVICE_NAME, $ex->getMessage());
        }
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_jquery_datatables", WBWJQueryDataTablesExtension::EXTENSION_ALIAS);
    }
}
