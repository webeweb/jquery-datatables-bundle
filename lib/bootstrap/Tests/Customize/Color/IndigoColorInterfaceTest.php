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

use WBW\Bundle\BootstrapBundle\Customize\Color\IndigoColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Indigo color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class IndigoColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#e0cffc", IndigoColorInterface::INDIGO_COLOR_VALUE_100);
        $this->assertEquals("#c29ffa", IndigoColorInterface::INDIGO_COLOR_VALUE_200);
        $this->assertEquals("#a370f7", IndigoColorInterface::INDIGO_COLOR_VALUE_300);
        $this->assertEquals("#8540f5", IndigoColorInterface::INDIGO_COLOR_VALUE_400);
        $this->assertEquals("#6610f2", IndigoColorInterface::INDIGO_COLOR_VALUE_500);
        $this->assertEquals("#520dc2", IndigoColorInterface::INDIGO_COLOR_VALUE_600);
        $this->assertEquals("#3d0a91", IndigoColorInterface::INDIGO_COLOR_VALUE_700);
        $this->assertEquals("#290661", IndigoColorInterface::INDIGO_COLOR_VALUE_800);
        $this->assertEquals("#140330", IndigoColorInterface::INDIGO_COLOR_VALUE_900);
    }
}
