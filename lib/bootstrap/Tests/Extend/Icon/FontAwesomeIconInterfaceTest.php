<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Extend\Icon;

use WBW\Bundle\BootstrapBundle\Extend\Icon\FontAwesomeIconInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Font Awesome icon interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Assets\Icon
 */
class FontAwesomeIconInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("pulse", FontAwesomeIconInterface::FONT_AWESOME_ANIMATION_PULSE);
        $this->assertEquals("spin", FontAwesomeIconInterface::FONT_AWESOME_ANIMATION_SPIN);

        $this->assertEquals("", FontAwesomeIconInterface::FONT_AWESOME_FONT);
        $this->assertEquals("b", FontAwesomeIconInterface::FONT_AWESOME_FONT_BOLD);
        $this->assertEquals("d", FontAwesomeIconInterface::FONT_AWESOME_FONT_DUOTONE);
        $this->assertEquals("l", FontAwesomeIconInterface::FONT_AWESOME_FONT_LIGHT);
        $this->assertEquals("r", FontAwesomeIconInterface::FONT_AWESOME_FONT_REGULAR);
        $this->assertEquals("s", FontAwesomeIconInterface::FONT_AWESOME_FONT_SOLID);

        $this->assertEquals("left", FontAwesomeIconInterface::FONT_AWESOME_PULL_LEFT);
        $this->assertEquals("right", FontAwesomeIconInterface::FONT_AWESOME_PULL_RIGHT);

        $this->assertEquals("2x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_2X);
        $this->assertEquals("3x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_3X);
        $this->assertEquals("4x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_4X);
        $this->assertEquals("5x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_5X);
        $this->assertEquals("6x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_6X);
        $this->assertEquals("7x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_7X);
        $this->assertEquals("8x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_8X);
        $this->assertEquals("9x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_9X);
        $this->assertEquals("10x", FontAwesomeIconInterface::FONT_AWESOME_SIZE_10X);
        $this->assertEquals("lg", FontAwesomeIconInterface::FONT_AWESOME_SIZE_LG);
        $this->assertEquals("sm", FontAwesomeIconInterface::FONT_AWESOME_SIZE_SM);
        $this->assertEquals("xs", FontAwesomeIconInterface::FONT_AWESOME_SIZE_XS);
    }
}
