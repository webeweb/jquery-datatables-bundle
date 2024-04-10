<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Event;

use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Event
 */
class DataTablesEventTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.event.pre_delete", DataTablesEvent::PRE_DELETE);
        $this->assertEquals("wbw.datatables.event.pre_edit", DataTablesEvent::PRE_EDIT);
        $this->assertEquals("wbw.datatables.event.pre_export", DataTablesEvent::PRE_EXPORT);
        $this->assertEquals("wbw.datatables.event.pre_index", DataTablesEvent::PRE_INDEX);
        $this->assertEquals("wbw.datatables.event.pre_serialize", DataTablesEvent::PRE_SERIALIZE);
        $this->assertEquals("wbw.datatables.event.pre_show", DataTablesEvent::PRE_SHOW);
        $this->assertEquals("wbw.datatables.event.post_delete", DataTablesEvent::POST_DELETE);
        $this->assertEquals("wbw.datatables.event.post_edit", DataTablesEvent::POST_EDIT);
        $this->assertEquals("wbw.datatables.event.post_export", DataTablesEvent::POST_EXPORT);
        $this->assertEquals("wbw.datatables.event.post_index", DataTablesEvent::POST_INDEX);

        // Set a DataTables provider mock.
        $provider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $obj = new DataTablesEvent([], "test", $provider);

        $this->assertEquals("test", $obj->getEventName());
        $this->assertEquals([], $obj->getEntities());
        $this->assertSame($provider, $obj->getProvider());
    }
}
