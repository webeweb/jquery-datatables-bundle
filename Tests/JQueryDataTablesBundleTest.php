<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests;

use WBW\Bundle\JQuery\DatatablesBundle\JQueryDataTablesBundle;

/**
 * jQuery DataTables bundle test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests
 * @final
 */
final class JQueryDataTablesBundleTest extends AbstractFrameworkTestCase {

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();
    }

    /**
     * Tests the build() method.
     *
     * @return void
     */
    public function testBuild() {

        $obj = new JQueryDataTablesBundle();

        $obj->build($this->containerBuilder);
    }

}
