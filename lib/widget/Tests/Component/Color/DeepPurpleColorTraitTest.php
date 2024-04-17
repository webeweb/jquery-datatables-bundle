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

use WBW\Bundle\WidgetBundle\Component\Color\DeepPurpleColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestDeepPurpleColorTrait;

/**
 * Deep purple color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class DeepPurpleColorTraitTest extends AbstractTestCase {

    /**
     * Test setDeepPurpleColor()
     *
     * @return void
     */
    public function testSetDeepPurpleColor(): void {

        // Set a Deep purple color mock.
        $deepPurpleColor = $this->getMockBuilder(DeepPurpleColorInterface::class)->getMock();

        $obj = new TestDeepPurpleColorTrait();

        $obj->setDeepPurpleColor($deepPurpleColor);
        $this->assertSame($deepPurpleColor, $obj->getDeepPurpleColor());
    }
}
