<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Toast;

use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Toast\TestToastTrait;
use WBW\Bundle\WidgetBundle\Toast\ToastInterface;

/**
 * Toast trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Toast
 */
class ToastTraitTest extends AbstractTestCase {

    /**
     * Test setToast()
     *
     * @return void
     */
    public function testSetToast(): void {

        // Set a Toast mock.
        $toast = $this->getMockBuilder(ToastInterface::class)->getMock();

        $obj = new TestToastTrait();

        $obj->setToast($toast);
        $this->assertSame($toast, $obj->getToast());
    }
}
