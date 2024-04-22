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

use WBW\Bundle\BootstrapBundle\Customize\Color\PinkColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Pink color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class PinkColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#f7d6e6", PinkColorInterface::PINK_COLOR_VALUE_100);
        $this->assertEquals("#efadce", PinkColorInterface::PINK_COLOR_VALUE_200);
        $this->assertEquals("#e685b5", PinkColorInterface::PINK_COLOR_VALUE_300);
        $this->assertEquals("#de5c9d", PinkColorInterface::PINK_COLOR_VALUE_400);
        $this->assertEquals("#d63384", PinkColorInterface::PINK_COLOR_VALUE_500);
        $this->assertEquals("#ab296a", PinkColorInterface::PINK_COLOR_VALUE_600);
        $this->assertEquals("#801f4f", PinkColorInterface::PINK_COLOR_VALUE_700);
        $this->assertEquals("#561435", PinkColorInterface::PINK_COLOR_VALUE_800);
        $this->assertEquals("#2b0a1a", PinkColorInterface::PINK_COLOR_VALUE_900);
    }
}
