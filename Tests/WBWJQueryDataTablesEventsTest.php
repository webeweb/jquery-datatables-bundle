<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests;

use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesEvents;

/**
 * jQuery DataTables events test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 */
class WBWJQueryDataTablesEventsTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("wbw.jquery.datatables.event.pre_delete", WBWJQueryDataTablesEvents::DATATABLES_PRE_DELETE);
        $this->assertEquals("wbw.jquery.datatables.event.pre_edit", WBWJQueryDataTablesEvents::DATATABLES_PRE_EDIT);
        $this->assertEquals("wbw.jquery.datatables.event.pre_export", WBWJQueryDataTablesEvents::DATATABLES_PRE_EXPORT);
        $this->assertEquals("wbw.jquery.datatables.event.pre_index", WBWJQueryDataTablesEvents::DATATABLES_PRE_INDEX);
        $this->assertEquals("wbw.jquery.datatables.event.pre_show", WBWJQueryDataTablesEvents::DATATABLES_PRE_SHOW);
        $this->assertEquals("wbw.jquery.datatables.event.post_delete", WBWJQueryDataTablesEvents::DATATABLES_POST_DELETE);
        $this->assertEquals("wbw.jquery.datatables.event.post_edit", WBWJQueryDataTablesEvents::DATATABLES_POST_EDIT);
        $this->assertEquals("wbw.jquery.datatables.event.post_export", WBWJQueryDataTablesEvents::DATATABLES_POST_EXPORT);
        $this->assertEquals("wbw.jquery.datatables.event.post_index", WBWJQueryDataTablesEvents::DATATABLES_POST_INDEX);
    }
}
