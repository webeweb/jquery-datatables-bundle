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

        $this->assertEquals("webeweb.jquerydatatables.event.pre_delete", DataTablesEvents::DATATABLES_PRE_DELETE);
        $this->assertEquals("webeweb.jquerydatatables.event.pre_edit", DataTablesEvents::DATATABLES_PRE_EDIT);
        $this->assertEquals("webeweb.jquerydatatables.event.pre_export", DataTablesEvents::DATATABLES_PRE_EXPORT);
        $this->assertEquals("webeweb.jquerydatatables.event.pre_index", DataTablesEvents::DATATABLES_PRE_INDEX);
        $this->assertEquals("webeweb.jquerydatatables.event.pre_show", DataTablesEvents::DATATABLES_PRE_SHOW);
        $this->assertEquals("webeweb.jquerydatatables.event.post_delete", DataTablesEvents::DATATABLES_POST_DELETE);
        $this->assertEquals("webeweb.jquerydatatables.event.post_edit", DataTablesEvents::DATATABLES_POST_EDIT);
        $this->assertEquals("webeweb.jquerydatatables.event.post_export", DataTablesEvents::DATATABLES_POST_EXPORT);
        $this->assertEquals("webeweb.jquerydatatables.event.post_index", DataTablesEvents::DATATABLES_POST_INDEX);
    }
}
