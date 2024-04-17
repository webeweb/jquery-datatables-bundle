<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use WBW\Bundle\WidgetBundle\Component\ToastInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Toast interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class ToastInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("danger", ToastInterface::TOAST_TYPE_DANGER);
        $this->assertEquals("info", ToastInterface::TOAST_TYPE_INFO);
        $this->assertEquals("success", ToastInterface::TOAST_TYPE_SUCCESS);
        $this->assertEquals("warning", ToastInterface::TOAST_TYPE_WARNING);
    }
}
