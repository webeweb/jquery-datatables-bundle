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

use WBW\Bundle\BootstrapBundle\Customize\Color\GrayColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Gray color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class GrayColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#f8f9fa", GrayColorInterface::GRAY_COLOR_VALUE_100);
        $this->assertEquals("#e9ecef", GrayColorInterface::GRAY_COLOR_VALUE_200);
        $this->assertEquals("#dee2e6", GrayColorInterface::GRAY_COLOR_VALUE_300);
        $this->assertEquals("#ced4da", GrayColorInterface::GRAY_COLOR_VALUE_400);
        $this->assertEquals("#adb5bd", GrayColorInterface::GRAY_COLOR_VALUE_500);
        $this->assertEquals("#6c757d", GrayColorInterface::GRAY_COLOR_VALUE_600);
        $this->assertEquals("#495057", GrayColorInterface::GRAY_COLOR_VALUE_700);
        $this->assertEquals("#343a40", GrayColorInterface::GRAY_COLOR_VALUE_800);
        $this->assertEquals("#212529", GrayColorInterface::GRAY_COLOR_VALUE_900);
    }
}
