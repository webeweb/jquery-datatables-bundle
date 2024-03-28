<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Symfony\EventDispatcher;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\EventDispatcher\TestEventDispatcherTrait;

/**
 * Event dispatcher trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\EventDispatcher
 */
class EventDispatcherTraitTest extends AbstractTestCase {

    /**
     * Test setEventDispatcher()
     *
     * @return void
     */
    public function testSetEventDispatcher(): void {

        $obj = new TestEventDispatcherTrait();

        $obj->setEventDispatcher($this->eventDispatcher);
        $this->assertSame($this->eventDispatcher, $obj->getEventDispatcher());
    }
}
