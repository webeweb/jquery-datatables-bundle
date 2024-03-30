<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar;

use WBW\Bundle\BootstrapBundle\Component\ProgressBar\DangerProgressBar;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\ProgressBarInterface as BaseProgressBarInterface;

/**
 * Danger progress bar test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar
 */
class DangerProgressBarTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DangerProgressBar();

        $this->assertEquals(BaseProgressBarInterface::PROGRESS_BAR_TYPE_DANGER, $obj->getType());
    }
}
