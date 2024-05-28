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

use WBW\Bundle\BootstrapBundle\Customize\Color\OrangeColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Orange color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class OrangeColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#ffe5d0", OrangeColorInterface::ORANGE_COLOR_VALUE_100);
        $this->assertEquals("#fecba1", OrangeColorInterface::ORANGE_COLOR_VALUE_200);
        $this->assertEquals("#feb272", OrangeColorInterface::ORANGE_COLOR_VALUE_300);
        $this->assertEquals("#fd9843", OrangeColorInterface::ORANGE_COLOR_VALUE_400);
        $this->assertEquals("#fd7e14", OrangeColorInterface::ORANGE_COLOR_VALUE_500);
        $this->assertEquals("#ca6510", OrangeColorInterface::ORANGE_COLOR_VALUE_600);
        $this->assertEquals("#984c0c", OrangeColorInterface::ORANGE_COLOR_VALUE_700);
        $this->assertEquals("#653208", OrangeColorInterface::ORANGE_COLOR_VALUE_800);
        $this->assertEquals("#331904", OrangeColorInterface::ORANGE_COLOR_VALUE_900);
    }
}
