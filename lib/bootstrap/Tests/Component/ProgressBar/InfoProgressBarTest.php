<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\ProgressBar\InfoProgressBar;
use WBW\Bundle\BootstrapBundle\Component\ProgressBarInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\ProgressBarInterface as BaseProgressBarInterface;

/**
 * Info progress bar test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar
 */
class InfoProgressBarTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new InfoProgressBar();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ProgressBarInterface::class, $obj);

        $this->assertEquals(BaseProgressBarInterface::PROGRESS_BAR_TYPE_INFO, $obj->getType());
    }
}
