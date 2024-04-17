<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component\Color;

use WBW\Bundle\WidgetBundle\Component\Color\BlueGreyColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestBlueGreyColorTrait;

/**
 * Blue grey color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class BlueGreyColorTraitTest extends AbstractTestCase {

    /**
     * Test setBlueGreyColor()
     *
     * @return void
     */
    public function testSetBlueGreyColor(): void {

        // Set a Blue grey color mock.
        $blueGreyColor = $this->getMockBuilder(BlueGreyColorInterface::class)->getMock();

        $obj = new TestBlueGreyColorTrait();

        $obj->setBlueGreyColor($blueGreyColor);
        $this->assertSame($blueGreyColor, $obj->getBlueGreyColor());
    }
}
