<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Model\ProgressBar;

use WBW\Bundle\BootstrapBundle\Model\ProgressBar\InfoProgressBar;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\ProgressBarInterface as BaseProgressBarInterface;

/**
 * Info progress bar test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Model\ProgressBar
 */
class InfoProgressBarTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new InfoProgressBar();

        $this->assertEquals(BaseProgressBarInterface::PROGRESS_BAR_TYPE_INFO, $obj->getType());
    }
}
