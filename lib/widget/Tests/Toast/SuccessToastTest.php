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

namespace WBW\Bundle\WidgetBundle\Tests\Toast;

use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Toast\SuccessToast;
use WBW\Bundle\WidgetBundle\Toast\ToastInterface;

/**
 * Success toast test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Toast
 */
class SuccessToastTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new SuccessToast("success");

        $this->assertEquals(ToastInterface::TOAST_TYPE_SUCCESS, $obj->getType());
        $this->assertEquals("success", $obj->getContent());
    }
}
