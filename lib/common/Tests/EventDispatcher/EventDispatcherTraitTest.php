<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Event\TestAbstractEvent;
use WBW\Bundle\CommonBundle\Tests\Fixtures\EventDispatcher\TestEventDispatcherTrait;

/**
 * Event dispatcher trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventDispatcher
 */
class EventDispatcherTraitTest extends AbstractTestCase {

    /**
     * Test dispatch()
     *
     * @return void
     */
    public function testDispatch(): void {

        // Set an Event mock.
        $event = new TestAbstractEvent("test");

        // Set an Event dispatcher mock.
        $eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)->getMock();
        $eventDispatcher->expects($this->any())->method("dispatch")->willReturn($event);

        $obj = new TestEventDispatcherTrait();

        $obj->setEventDispatcher($eventDispatcher);
        $this->assertSame($event, $obj->dispatch($event));

        $obj->setEventDispatcher(null);
        $this->assertSame($event, $obj->dispatch($event));
    }

    /**
     * Test setEventDispatcher()
     *
     * @return void
     */
    public function testSetEventDispatcher(): void {

        // Set an Event dispatcher mock.
        $eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)->getMock();

        $obj = new TestEventDispatcherTrait();

        $obj->setEventDispatcher($eventDispatcher);
        $this->assertSame($eventDispatcher, $obj->getEventDispatcher());
    }
}
