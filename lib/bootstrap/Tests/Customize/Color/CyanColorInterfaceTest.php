<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Customize\Color;

use WBW\Bundle\BootstrapBundle\Customize\Color\CyanColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Cyan color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class CyanColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#cff4fc", CyanColorInterface::CYAN_COLOR_VALUE_100);
        $this->assertEquals("#9eeaf9", CyanColorInterface::CYAN_COLOR_VALUE_200);
        $this->assertEquals("#6edff6", CyanColorInterface::CYAN_COLOR_VALUE_300);
        $this->assertEquals("#3dd5f3", CyanColorInterface::CYAN_COLOR_VALUE_400);
        $this->assertEquals("#0dcaf0", CyanColorInterface::CYAN_COLOR_VALUE_500);
        $this->assertEquals("#0aa2c0", CyanColorInterface::CYAN_COLOR_VALUE_600);
        $this->assertEquals("#087990", CyanColorInterface::CYAN_COLOR_VALUE_700);
        $this->assertEquals("#055160", CyanColorInterface::CYAN_COLOR_VALUE_800);
        $this->assertEquals("#032830", CyanColorInterface::CYAN_COLOR_VALUE_900);
   }
}
