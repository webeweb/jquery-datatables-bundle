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

use WBW\Bundle\BootstrapBundle\Customize\Color\PurpleColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Purple color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class PurpleColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#e2d9f3", PurpleColorInterface::PURPLE_COLOR_VALUE_100);
        $this->assertEquals("#c5b3e6", PurpleColorInterface::PURPLE_COLOR_VALUE_200);
        $this->assertEquals("#a98eda", PurpleColorInterface::PURPLE_COLOR_VALUE_300);
        $this->assertEquals("#8c68cd", PurpleColorInterface::PURPLE_COLOR_VALUE_400);
        $this->assertEquals("#6f42c1", PurpleColorInterface::PURPLE_COLOR_VALUE_500);
        $this->assertEquals("#59359a", PurpleColorInterface::PURPLE_COLOR_VALUE_600);
        $this->assertEquals("#432874", PurpleColorInterface::PURPLE_COLOR_VALUE_700);
        $this->assertEquals("#2c1a4d", PurpleColorInterface::PURPLE_COLOR_VALUE_800);
        $this->assertEquals("#160d27", PurpleColorInterface::PURPLE_COLOR_VALUE_900);
    }
}
