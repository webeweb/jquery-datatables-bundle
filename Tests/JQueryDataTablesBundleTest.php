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

use WBW\Bundle\JQuery\DataTablesBundle\DataTablesVersionInterface;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\JQueryDataTablesExtension;
use WBW\Bundle\JQuery\DataTablesBundle\JQueryDataTablesBundle;

/**
 * jQuery DataTables bundle test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 */
class JQueryDataTablesBundleTest extends AbstractTestCase {

    /**
     * Tests the build() method.
     *
     * @return void
     */
    public function testBuild() {

        $obj = new JQueryDataTablesBundle();

        $this->assertNull($obj->build($this->containerBuilder));
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals(DataTablesVersionInterface::DATATABLES_VERSION, JQueryDataTablesBundle::DATATABLES_VERSION);
    }

    /**
     * Tests the getAssetsRelativeDirectory() method.
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory() {

        $obj = new JQueryDataTablesBundle();

        $res = "/Resources/assets";
        $this->assertEquals($res, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Tests the getContainerExtension() method.
     *
     * @return void
     */
    public function testGetContainerExtension() {

        $obj = new JQueryDataTablesBundle();

        $res = $obj->getContainerExtension();
        $this->assertInstanceOf(JQueryDataTablesExtension::class, $res);
    }
}
