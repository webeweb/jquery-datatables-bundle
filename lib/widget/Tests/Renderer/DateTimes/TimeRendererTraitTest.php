<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Renderer\DateTimes;

use DateTime;
use Throwable;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\DateTimes\TestTimeRendererTrait;

/**
 * Time renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\DateTimes
 */
class TimeRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderDate()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRenderDate(): void {

        $obj = new TestTimeRendererTrait();

        $this->assertEquals("", $obj->renderTime(null));
        $this->assertEquals("14:00:00", $obj->renderTime(new DateTime("2022-03-03 14:00:00")));
        $this->assertEquals("14.00.00", $obj->renderTime(new DateTime("2022-03-03 14:00:00"), "H.i.s"));
    }
}
