<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Event;

use WBW\Bundle\JQuery\DataTablesBundle\Event\DataTablesEvents;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesEvents;

/**
 * DataTables events test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Event
 */
class DataTablesEventsTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_PRE_DELETE, DataTablesEvents::DATATABLES_PRE_DELETE);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_PRE_EDIT, DataTablesEvents::DATATABLES_PRE_EDIT);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_PRE_EXPORT, DataTablesEvents::DATATABLES_PRE_EXPORT);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_PRE_INDEX, DataTablesEvents::DATATABLES_PRE_INDEX);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_PRE_SHOW, DataTablesEvents::DATATABLES_PRE_SHOW);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_POST_DELETE, DataTablesEvents::DATATABLES_POST_DELETE);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_POST_EDIT, DataTablesEvents::DATATABLES_POST_EDIT);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_POST_EXPORT, DataTablesEvents::DATATABLES_POST_EXPORT);
        $this->assertEquals(WBWJQueryDataTablesEvents::DATATABLES_POST_INDEX, DataTablesEvents::DATATABLES_POST_INDEX);
    }
}
