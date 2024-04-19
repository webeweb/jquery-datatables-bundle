<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license basicrmation, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\ProgressBar\BasicProgressBar;
use WBW\Bundle\BootstrapBundle\Component\ProgressBarInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Basic progress bar test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\ProgressBar
 */
class BasicProgressBarTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BasicProgressBar();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ProgressBarInterface::class, $obj);

        $this->assertNull($obj->getType());
    }
}
