<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\DateTimes;

use DateTime;
use Exception;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\DateTimes\TestDateRendererTrait;

/**
 * Date renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\DateTimes
 */
class DateRendererTraitTest extends AbstractTestCase {

    /**
     * Tests the renderDate() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRenderDate(): void {

        $obj = new TestDateRendererTrait();

        $this->assertEquals("", $obj->renderDate(null));
        $this->assertEquals("2019-01-14", $obj->renderDate(new DateTime("2019-01-14")));
        $this->assertEquals("14/01/2019", $obj->renderDate(new DateTime("2019-01-14"), "d/m/Y"));
    }
}
