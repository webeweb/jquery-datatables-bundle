<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer;

use DateTime;
use Exception;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\TestDateTimeRendererTrait;

/**
 * Date/time renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer
 */
class DateTimeRendererTraitTest extends AbstractTestCase {

    /**
     * Tests the renderDateTime() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRenderDateTime(): void {

        $obj = new TestDateTimeRendererTrait();

        $this->assertEquals("", $obj->renderDateTime(null));
        $this->assertEquals("2019-01-14 18:15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00")));
        $this->assertEquals("14/01/2019 18h15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00"), "d/m/Y H\hi"));
    }
}
