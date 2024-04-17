<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use WBW\Bundle\WidgetBundle\Component\ButtonInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Button interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class ButtonInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("danger", ButtonInterface::BUTTON_TYPE_DANGER);
        $this->assertEquals("info", ButtonInterface::BUTTON_TYPE_INFO);
        $this->assertEquals("success", ButtonInterface::BUTTON_TYPE_SUCCESS);
        $this->assertEquals("warning", ButtonInterface::BUTTON_TYPE_WARNING);
    }
}
