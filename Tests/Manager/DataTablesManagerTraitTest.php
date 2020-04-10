<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Manager;

use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Manager\TestDataTablesManagerTrait;

/**
 * DataTables manager trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Manager
 */
class DataTablesManagerTraitTest extends AbstractTestCase {

    /**
     * Tests the setDataTablesManager() method.
     *
     * @return void
     */
    public function testSetDataTablesManager() {

        // Set a DataTables manager mock.
        $dataTablesManager = new DataTablesManager();

        $obj = new TestDataTablesManagerTrait();

        $obj->setDataTablesManager($dataTablesManager);
        $this->assertSame($dataTablesManager, $obj->getDataTablesManager());
    }

    /**
     * Tests the __construct() mmethod.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestDataTablesManagerTrait();

        $this->assertNull($obj->getDataTablesManager());
    }
}
