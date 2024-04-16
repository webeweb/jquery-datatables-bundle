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

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use WBW\Bundle\WidgetBundle\Component\ProgressBarInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Progress bar interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class ProgressBarInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("danger", ProgressBarInterface::PROGRESS_BAR_TYPE_DANGER);
        $this->assertEquals("info", ProgressBarInterface::PROGRESS_BAR_TYPE_INFO);
        $this->assertEquals("success", ProgressBarInterface::PROGRESS_BAR_TYPE_SUCCESS);
        $this->assertEquals("warning", ProgressBarInterface::PROGRESS_BAR_TYPE_WARNING);
    }
}
