<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Event;

use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\ToastInterface;

/**
 * Toast event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Event
 */
class ToastEventTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__constructor(): void {

        $this->assertEquals("wbw.common.event.toast.danger", ToastEvent::DANGER);
        $this->assertEquals("wbw.common.event.toast.info", ToastEvent::INFO);
        $this->assertEquals("wbw.common.event.toast.success", ToastEvent::SUCCESS);
        $this->assertEquals("wbw.common.event.toast.warning", ToastEvent::WARNING);

        // Set a Toast mock.
        $toast = $this->getMockBuilder(ToastInterface::class)->getMock();

        $obj = new ToastEvent($toast, "test");

        $this->assertEquals("test", $obj->getEventName());
        $this->assertSame($toast, $obj->getToast());
    }
}
