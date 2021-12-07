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

use WBW\Bundle\JQuery\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Event
 */
class DataTablesEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.jquery.datatables.event.pre_delete", DataTablesEvent::PRE_DELETE);
        $this->assertEquals("wbw.jquery.datatables.event.pre_edit", DataTablesEvent::PRE_EDIT);
        $this->assertEquals("wbw.jquery.datatables.event.pre_export", DataTablesEvent::PRE_EXPORT);
        $this->assertEquals("wbw.jquery.datatables.event.pre_index", DataTablesEvent::PRE_INDEX);
        $this->assertEquals("wbw.jquery.datatables.event.pre_serialize", DataTablesEvent::PRE_SERIALIZE);
        $this->assertEquals("wbw.jquery.datatables.event.pre_show", DataTablesEvent::PRE_SHOW);
        $this->assertEquals("wbw.jquery.datatables.event.post_delete", DataTablesEvent::POST_DELETE);
        $this->assertEquals("wbw.jquery.datatables.event.post_edit", DataTablesEvent::POST_EDIT);
        $this->assertEquals("wbw.jquery.datatables.event.post_export", DataTablesEvent::POST_EXPORT);
        $this->assertEquals("wbw.jquery.datatables.event.post_index", DataTablesEvent::POST_INDEX);

        // Set a DataTables provider mock.
        $provider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $obj = new DataTablesEvent("eventName", [], $provider);

        $this->assertEquals("eventName", $obj->getEventName());
        $this->assertEquals([], $obj->getEntities());
        $this->assertSame($provider, $obj->getProvider());
    }
}
