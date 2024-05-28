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

use WBW\Bundle\BootstrapBundle\Customize\Color\BlueColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Blue color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class BlueColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#cfe2ff", BlueColorInterface::BLUE_COLOR_VALUE_100);
        $this->assertEquals("#9ec5fe", BlueColorInterface::BLUE_COLOR_VALUE_200);
        $this->assertEquals("#6ea8fe", BlueColorInterface::BLUE_COLOR_VALUE_300);
        $this->assertEquals("#3d8bfd", BlueColorInterface::BLUE_COLOR_VALUE_400);
        $this->assertEquals("#0d6efd", BlueColorInterface::BLUE_COLOR_VALUE_500);
        $this->assertEquals("#0a58ca", BlueColorInterface::BLUE_COLOR_VALUE_600);
        $this->assertEquals("#084298", BlueColorInterface::BLUE_COLOR_VALUE_700);
        $this->assertEquals("#052c65", BlueColorInterface::BLUE_COLOR_VALUE_800);
        $this->assertEquals("#031633", BlueColorInterface::BLUE_COLOR_VALUE_900);
    }
}
