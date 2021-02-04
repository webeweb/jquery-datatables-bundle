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

use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\WBWJQueryDataTablesExtension;
use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesBundle;

/**
 * jQuery DataTables bundle test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 */
class WBWJQueryDataTablesBundleTest extends AbstractTestCase {

    /**
     * Tests the build() method.
     *
     * @return void
     */
    public function testBuild(): void {

        $obj = new WBWJQueryDataTablesBundle();

        $this->assertNull($obj->build($this->containerBuilder));
    }

    /**
     * Tests the getAssetsRelativeDirectory() method.
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory(): void {

        $obj = new WBWJQueryDataTablesBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Tests the getContainerExtension() method.
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWJQueryDataTablesBundle();

        $this->assertInstanceOf(WBWJQueryDataTablesExtension::class, $obj->getContainerExtension());
    }
}
