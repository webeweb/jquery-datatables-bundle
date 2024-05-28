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

namespace WBW\Bundle\DataTablesBundle\Tests;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Throwable;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\DataTablesBundle\DependencyInjection\WBWDataTablesExtension;
use WBW\Bundle\DataTablesBundle\WBWDataTablesBundle;
use WBW\Library\Widget\Helper\AssetsHelper;

/**
 * DataTables bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests
 */
class WBWDataTablesBundleTest extends AbstractTestCase {

    /**
     * Test assets.
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAssets(): void {

        // Load the YAML configuration.
        $assets   = WBWCommonExtension::loadYamlConfig(__DIR__ . "/../src/Resources/config", "assets");
        $version  = $assets["assets"]["wbw.datatables.assets"]["version"];
        $plugins  = $assets["assets"]["wbw.datatables.assets"]["plugins"];
        $requires = $assets["assets"]["wbw.datatables.assets"]["requires"];

        $res = AssetsHelper::listAssets(__DIR__ . "/../src/Resources/assets");
        $this->assertCount(19, $res);

        $i = -1;

        $this->assertRegexp("/datatables\-" . preg_quote($version) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-autofill\-" . preg_quote($plugins["autofill"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-buttons\-" . preg_quote($plugins["buttons"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-colreorder\-" . preg_quote($plugins["colreorder"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-datetime\-" . preg_quote($plugins["datetime"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-fixedcolumns\-" . preg_quote($plugins["fixedcolumns"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-fixedheader\-" . preg_quote($plugins["fixedheader"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-jszip\-" . preg_quote($requires["jszip"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-keytable\-" . preg_quote($plugins["keytable"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-pdfmake\-" . preg_quote($requires["pdfmake"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-responsive\-" . preg_quote($plugins["responsive"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-rowgroup\-" . preg_quote($plugins["rowgroup"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-rowreorder\-" . preg_quote($plugins["rowreorder"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-scroller\-" . preg_quote($plugins["scroller"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-searchbuilder\-" . preg_quote($plugins["searchbuilder"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-searchpanes\-" . preg_quote($plugins["searchpanes"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-select\-" . preg_quote($plugins["select"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-staterestore\-" . preg_quote($plugins["staterestore"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/editable\-table\.zip$/", $res[++$i]);
    }

    /**
     * Test build()
     *
     * @return void
     */
    public function testBuild(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new WBWDataTablesBundle();

        $obj->build($containerBuilder);
        $this->assertNull(null);
    }

    /**
     * Test getAssetsRelativeDirectory()
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory(): void {

        $obj = new WBWDataTablesBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Test getContainerExtension()
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWDataTablesBundle();

        $this->assertInstanceOf(WBWDataTablesExtension::class, $obj->getContainerExtension());
    }

    /**
     * Test getTranslationDomain()
     *
     * @return void
     */
    public function testGetTranslationDomain(): void {

        $this->assertEquals(WBWDataTablesBundle::TRANSLATION_DOMAIN, WBWDataTablesBundle::getTranslationDomain());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("WBWDataTablesBundle", WBWDataTablesBundle::TRANSLATION_DOMAIN);

        $obj = new WBWDataTablesBundle();

        $this->assertInstanceOf(AssetsProviderInterface::class, $obj);
    }
}
