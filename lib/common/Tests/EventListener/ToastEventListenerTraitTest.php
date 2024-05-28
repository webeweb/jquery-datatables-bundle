<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use WBW\Bundle\CommonBundle\EventListener\ToastEventListenerInterface;
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

        // Set a Toast event listener mock.
        $toastEventListener = $this->getMockBuilder(ToastEventListenerInterface::class)->getMock();

        $obj = new TestToastEventListenerTrait();

        $obj->setToastEventListener($toastEventListener);
        $this->assertSame($toastEventListener, $obj->getToastEventListener());
    }
}
