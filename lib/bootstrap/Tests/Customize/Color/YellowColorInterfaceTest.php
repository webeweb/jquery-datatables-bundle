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

use WBW\Bundle\BootstrapBundle\Customize\Color\YellowColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Yellow color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class YellowColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#fff3cd", YellowColorInterface::YELLOW_COLOR_VALUE_100);
        $this->assertEquals("#ffe69c", YellowColorInterface::YELLOW_COLOR_VALUE_200);
        $this->assertEquals("#ffda6a", YellowColorInterface::YELLOW_COLOR_VALUE_300);
        $this->assertEquals("#ffcd39", YellowColorInterface::YELLOW_COLOR_VALUE_400);
        $this->assertEquals("#ffc107", YellowColorInterface::YELLOW_COLOR_VALUE_500);
        $this->assertEquals("#cc9a06", YellowColorInterface::YELLOW_COLOR_VALUE_600);
        $this->assertEquals("#997404", YellowColorInterface::YELLOW_COLOR_VALUE_700);
        $this->assertEquals("#664d03", YellowColorInterface::YELLOW_COLOR_VALUE_800);
        $this->assertEquals("#332701", YellowColorInterface::YELLOW_COLOR_VALUE_900);
    }
}
