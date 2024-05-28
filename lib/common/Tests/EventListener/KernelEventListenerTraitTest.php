<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use WBW\Bundle\CommonBundle\EventListener\KernelEventListenerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener\TestKernelEventListenerTrait;

/**
 * Kernel event listener trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventListener
 */
class KernelEventListenerTraitTest extends AbstractTestCase {

    /**
     * Test setKernelEventListener()
     *
     * @return void
     */
    public function testSetKernelEventListener(): void {

        // Set a Kernel event listener mock.
        $kernelEventListener = $this->getMockBuilder(KernelEventListenerInterface::class)->getMock();

        $obj = new TestKernelEventListenerTrait();

        $obj->setKernelEventListener($kernelEventListener);
        $this->assertSame($kernelEventListener, $obj->getKernelEventListener());
    }
}
