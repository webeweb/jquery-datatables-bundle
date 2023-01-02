<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests;

use Throwable;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;
use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\WBWJQueryDataTablesExtension;
use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesBundle;
use WBW\Library\Symfony\Helper\AssetsHelper;

/**
 * jQuery DataTables bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 */
class WBWJQueryDataTablesBundleTest extends AbstractTestCase {

    /**
     * Tests build()
     *
     * @return void
     */
    public function testBuild(): void {

        $obj = new WBWJQueryDataTablesBundle();

        $this->assertNull($obj->build($this->containerBuilder));
    }

    /**
     * Tests getAssetsRelativeDirectory()
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory(): void {

        $obj = new WBWJQueryDataTablesBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Tests getContainerExtension()
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWJQueryDataTablesBundle();

        $this->assertInstanceOf(WBWJQueryDataTablesExtension::class, $obj->getContainerExtension());
    }

    /**
     * Tests listAssets()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testListAssets(): void {

        $config = realpath(__DIR__ . "/../DependencyInjection");
        $assets = realpath(__DIR__ . "/../Resources/assets");

        // Load the YAML configuration.
        $config   = ConfigurationHelper::loadYamlConfig($config, "assets");
        $version  = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["version"];
        $requires = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["requires"];
        $plugins  = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["plugins"];

        $res = AssetsHelper::listAssets($assets);
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
}
