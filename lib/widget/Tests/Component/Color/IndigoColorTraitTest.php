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

use WBW\Bundle\WidgetBundle\Component\Color\IndigoColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestIndigoColorTrait;

/**
 * Indigo color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class IndigoColorTraitTest extends AbstractTestCase {

    /**
     * Test setIndigoColor()
     *
     * @return void
     */
    public function testSetIndigoColor(): void {

        // Set an Indigo color mock.
        $indigoColor = $this->getMockBuilder(IndigoColorInterface::class)->getMock();

        $obj = new TestIndigoColorTrait();

        $obj->setIndigoColor($indigoColor);
        $this->assertSame($indigoColor, $obj->getIndigoColor());
    }
}
