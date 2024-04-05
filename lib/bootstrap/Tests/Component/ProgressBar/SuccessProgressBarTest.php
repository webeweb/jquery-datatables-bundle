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

namespace WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar;

use WBW\Bundle\BootstrapBundle\Component\ProgressBar\SuccessProgressBar;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\ProgressBarInterface as BaseProgressBarInterface;

/**
 * Success progress bar test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar
 */
class SuccessProgressBarTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new SuccessProgressBar();

        $this->assertEquals(BaseProgressBarInterface::PROGRESS_BAR_TYPE_SUCCESS, $obj->getType());
    }
}
