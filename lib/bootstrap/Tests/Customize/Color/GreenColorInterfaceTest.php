<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Customize\Color;

use WBW\Bundle\BootstrapBundle\Customize\Color\GreenColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Green color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class GreenColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#d1e7dd", GreenColorInterface::GREEN_COLOR_VALUE_100);
        $this->assertEquals("#a3cfbb", GreenColorInterface::GREEN_COLOR_VALUE_200);
        $this->assertEquals("#75b798", GreenColorInterface::GREEN_COLOR_VALUE_300);
        $this->assertEquals("#479f76", GreenColorInterface::GREEN_COLOR_VALUE_400);
        $this->assertEquals("#198754", GreenColorInterface::GREEN_COLOR_VALUE_500);
        $this->assertEquals("#146c43", GreenColorInterface::GREEN_COLOR_VALUE_600);
        $this->assertEquals("#0f5132", GreenColorInterface::GREEN_COLOR_VALUE_700);
        $this->assertEquals("#0a3622", GreenColorInterface::GREEN_COLOR_VALUE_800);
        $this->assertEquals("#051b11", GreenColorInterface::GREEN_COLOR_VALUE_900);
    }
}
