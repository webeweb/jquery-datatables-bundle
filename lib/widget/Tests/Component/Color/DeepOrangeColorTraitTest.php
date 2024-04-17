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

use WBW\Bundle\WidgetBundle\Component\Color\DeepOrangeColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestDeepOrangeColorTrait;

/**
 * Deep orange color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class DeepOrangeColorTraitTest extends AbstractTestCase {

    /**
     * Test setDeepOrangeColor()
     *
     * @return void
     */
    public function testSetDeepOrangeColor(): void {

        // Set a Deep orange color mock.
        $deepOrangeColor = $this->getMockBuilder(DeepOrangeColorInterface::class)->getMock();

        $obj = new TestDeepOrangeColorTrait();

        $obj->setDeepOrangeColor($deepOrangeColor);
        $this->assertSame($deepOrangeColor, $obj->getDeepOrangeColor());
    }
}
