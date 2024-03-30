<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use WBW\Bundle\CommonBundle\EventListener\ToastEventListener;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener\TestToastEventListenerTrait;

/**
 * Toast event listener trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventListener
 */
class ToastEventListenerTraitTest extends AbstractTestCase {

    /**
     * Test setToastEventListener()
     *
     * @return void
     */
    public function testSetToastEventListener(): void {

        // Set a Session service mock.
        $sessionService = $this->getMockBuilder(SessionServiceInterface::class)->getMock();

        // Set a Toast event listener mock.
        $toastEventListener = new ToastEventListener($sessionService);

        $obj = new TestToastEventListenerTrait();

        $obj->setToastEventListener($toastEventListener);
        $this->assertSame($toastEventListener, $obj->getToastEventListener());
    }
}
