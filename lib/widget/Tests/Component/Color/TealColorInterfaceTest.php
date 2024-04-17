<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component\Color;

use WBW\Bundle\WidgetBundle\Component\Color\TealColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Teal color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class TealColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("teal", TealColorInterface::TEAL_COLOR_NAME);
    }
}
