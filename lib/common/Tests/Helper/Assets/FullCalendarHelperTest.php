<?php

declare(strict_types=1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Helper\Assets;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\CommonBundle\Helper\Assets\FullCalendarHelper;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Full calendar helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Helper\Assets
 */
class FullCalendarHelperTest extends AbstractTestCase {

    /**
     * Request.
     *
     * @var Request|null
     */
    private $request;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Request mock.
        $this->request = new Request([
            "start" => "2013-12-01T00:00:00-05:00",
            "end"   => "2014-01-12T00:00:00-05:00",
        ]);
    }

    /**
     * Test parseEndDateTime()
     *
     * @return void
     */
    public function testParseEndDateTime(): void {

        $res = FullCalendarHelper::parseEndDateTime($this->request);
        $this->assertInstanceOf(DateTime::class, $res);

        $this->assertEquals("2014-01-12 00:00", $res->format("Y-m-d H:i"));
    }

    /**
     * Test parseStartDateTime()
     *
     * @return void
     */
    public function testParseStartDateTime(): void {

        $res = FullCalendarHelper::parseStartDateTime($this->request);
        $this->assertInstanceOf(DateTime::class, $res);

        $this->assertEquals("2013-12-01 00:00", $res->format("Y-m-d H:i"));
    }
}
