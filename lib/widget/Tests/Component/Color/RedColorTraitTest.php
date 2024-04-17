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

use WBW\Bundle\WidgetBundle\Component\Color\RedColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color\TestRedColorTrait;

/**
 * Red color trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Color
 */
class RedColorTraitTest extends AbstractTestCase {

    /**
     * Test setRedColor()
     *
     * @return void
     */
    public function testSetRedColor(): void {

        // Set a Red color mock.
        $redColor = $this->getMockBuilder(RedColorInterface::class)->getMock();

        $obj = new TestRedColorTrait();

        $obj->setRedColor($redColor);
        $this->assertSame($redColor, $obj->getRedColor());
    }
}
