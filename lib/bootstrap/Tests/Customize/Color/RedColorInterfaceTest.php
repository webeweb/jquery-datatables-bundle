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

use WBW\Bundle\BootstrapBundle\Customize\Color\RedColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Red color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class RedColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#f8d7da", RedColorInterface::RED_COLOR_VALUE_100);
        $this->assertEquals("#f1aeb5", RedColorInterface::RED_COLOR_VALUE_200);
        $this->assertEquals("#ea868f", RedColorInterface::RED_COLOR_VALUE_300);
        $this->assertEquals("#e35d6a", RedColorInterface::RED_COLOR_VALUE_400);
        $this->assertEquals("#dc3545", RedColorInterface::RED_COLOR_VALUE_500);
        $this->assertEquals("#b02a37", RedColorInterface::RED_COLOR_VALUE_600);
        $this->assertEquals("#842029", RedColorInterface::RED_COLOR_VALUE_700);
        $this->assertEquals("#58151c", RedColorInterface::RED_COLOR_VALUE_800);
        $this->assertEquals("#2c0b0e", RedColorInterface::RED_COLOR_VALUE_900);
    }
}
