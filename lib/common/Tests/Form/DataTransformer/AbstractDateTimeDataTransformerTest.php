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

namespace WBW\Bundle\CommonBundle\Tests\Form\DataTransformer;

use DateTime;
use DateTimeZone;
use Throwable;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer\TestAbstractDateTimeDataTransformer;

/**
 * Abstract date/time data transformer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\DataTransformer
 */
class AbstractDateTimeDataTransformerTest extends AbstractTestCase {

    /**
     * Test newDateTimeZone()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNewDateTimeZone(): void {

        $obj = new TestAbstractDateTimeDataTransformer("Y-m-d H:i:s", "UTC");

        $res = $obj->newDateTimeZone();
        $this->assertEquals("UTC", $res->getName());
    }

    /**
     * Test newDateTimeZone()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNewDateTimeZoneWithoutTimeZone(): void {

        $obj = new TestAbstractDateTimeDataTransformer("Y-m-d H:i:s", null);

        $this->assertNull($obj->newDateTimeZone());
    }

    /**
     * Test reverseTransform()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testReverseTransform(): void {

        // Set a date/time mock.
        $dateTime = new DateTime("2021-03-23 19:00:00", new DateTimeZone("UTC"));

        $obj = new TestAbstractDateTimeDataTransformer("Y-m-d H:i:s", "UTC");

        $fmt = $obj->getFormat();
        $arg = $dateTime->format($fmt);

        $this->assertEquals(null, $obj->reverseTransform(null));
        $this->assertEquals(null, $obj->reverseTransform(""));
        $this->assertEquals(null, $obj->reverseTransform("exception"));
        $this->assertEquals($dateTime, $obj->reverseTransform($arg));
    }

    /**
     * Test setFormat()
     *
     * @return void
     */
    public function testSetFormat(): void {

        $obj = new TestAbstractDateTimeDataTransformer("Y-m-d H:i:s", "UTC");

        $obj->setFormat("format");
        $this->assertEquals("format", $obj->getFormat());
    }

    /**
     * Test setTimezone()
     *
     * @return void
     */
    public function testSetTimezone(): void {

        $obj = new TestAbstractDateTimeDataTransformer("Y-m-d H:i:s", "UTC");

        $obj->setTimezone("timezone");
        $this->assertEquals("timezone", $obj->getTimezone());
    }

    /**
     * Test transform()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testTransform(): void {

        // Set a date/time mock.
        $dateTime = new DateTime("2021-03-23 19:00:00", new DateTimeZone("UTC"));

        $obj = new TestAbstractDateTimeDataTransformer("Y-m-d H:i:s", "UTC");

        $fmt = $obj->getFormat();
        $exp = $dateTime->format($fmt);

        $this->assertEquals(null, $obj->transform(null));
        $this->assertEquals($exp, $obj->transform($dateTime));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractDateTimeDataTransformer("Y-m-d H:i:s", "UTC");

        $this->assertEquals("Y-m-d H:i:s", $obj->getFormat());
        $this->assertEquals("UTC", $obj->getTimezone());
    }
}
