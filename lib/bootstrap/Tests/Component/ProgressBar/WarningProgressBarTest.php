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

namespace WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar;

use WBW\Bundle\BootstrapBundle\Component\ProgressBar\WarningProgressBar;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Component\ProgressBarInterface as BaseProgressBarInterface;

/**
 * Warning progress bar test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar
 */
class WarningProgressBarTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new WarningProgressBar();

        $this->assertEquals(BaseProgressBarInterface::PROGRESS_BAR_TYPE_WARNING, $obj->getType());
    }
}
