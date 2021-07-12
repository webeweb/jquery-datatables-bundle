<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Exception;
use WBW\Bundle\CoreBundle\DependencyInjection\ConfigurationHelper;
use WBW\Bundle\CoreBundle\Tests\Fixtures\Helper\TestAssetsHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Assets helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class AssetsHelperTest extends AbstractTestCase {

    /**
     * Directory "assets".
     *
     * @var string
     */
    private $directoryAssets;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set the directories.
        $this->directoryAssets = realpath(__DIR__ . "/../../Resources/assets");
    }

    /**
     * Tests the listAssets() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testListAssets(): void {

        $directory = realpath(__DIR__ . "/../../DependencyInjection");

        // Load the YAML configuration.
        $config   = ConfigurationHelper::loadYamlConfig($directory, "assets");
        $version  = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["version"];
        $requires = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["requires"];
        $plugins  = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["plugins"];

        $res = TestAssetsHelper::listAssets($this->directoryAssets);
        $this->assertCount(17, $res);

        $i = -1;

        $this->assertRegexp("/datatables\-" . preg_quote($version) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-autofill\-" . preg_quote($plugins["autofill"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-buttons\-" . preg_quote($plugins["buttons"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/datatables\-colreorder\-" . preg_quote($plugins["colreorder"]["version"]) . "\.zip$/", $res[++$i]);
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
        $this->assertRegexp("/editable\-table\.zip$/", $res[++$i]);
    }
}
