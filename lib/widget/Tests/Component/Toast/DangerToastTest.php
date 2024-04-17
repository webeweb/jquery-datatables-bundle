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

namespace WBW\Bundle\WidgetBundle\Tests\Component\Toast;

use WBW\Bundle\WidgetBundle\Component\Toast\DangerToast;
use WBW\Bundle\WidgetBundle\Component\ToastInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Danger toast test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Toast
 */
class DangerToastTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DangerToast("danger");

        $this->assertEquals(ToastInterface::TOAST_TYPE_DANGER, $obj->getType());
        $this->assertEquals("danger", $obj->getContent());
    }
}
