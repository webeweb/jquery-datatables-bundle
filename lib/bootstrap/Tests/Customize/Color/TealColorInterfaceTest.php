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

use WBW\Bundle\BootstrapBundle\Customize\Color\TealColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Teal color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class TealColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#d2f4ea", TealColorInterface::TEAL_COLOR_VALUE_100);
        $this->assertEquals("#a6e9d5", TealColorInterface::TEAL_COLOR_VALUE_200);
        $this->assertEquals("#79dfc1", TealColorInterface::TEAL_COLOR_VALUE_300);
        $this->assertEquals("#4dd4ac", TealColorInterface::TEAL_COLOR_VALUE_400);
        $this->assertEquals("#20c997", TealColorInterface::TEAL_COLOR_VALUE_500);
        $this->assertEquals("#1aa179", TealColorInterface::TEAL_COLOR_VALUE_600);
        $this->assertEquals("#13795b", TealColorInterface::TEAL_COLOR_VALUE_700);
        $this->assertEquals("#0d503c", TealColorInterface::TEAL_COLOR_VALUE_800);
        $this->assertEquals("#06281e", TealColorInterface::TEAL_COLOR_VALUE_900);
    }
}
