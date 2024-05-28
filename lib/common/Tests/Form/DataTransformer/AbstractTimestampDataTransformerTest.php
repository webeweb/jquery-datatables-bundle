<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Form\DataTransformer;

use DateTime;
use DateTimeZone;
use Symfony\Component\Form\DataTransformerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer\TestAbstractTimestampDataTransformer;

/**
 * Abstract timestamp data transformer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\DataTransformer
 */
class AbstractTimestampDataTransformerTest extends AbstractTestCase {

    /**
     * Test reverseTransform()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testReverseTransform(): void {

        // Set a date/time mock.
        $dateTime = new DateTime("2021-03-23 19:00:00", new DateTimeZone("UTC"));

        $obj = new TestAbstractTimestampDataTransformer("Y-m-d H:i:s", "UTC");

        $fmt = $obj->getFormat();
        $arg = $dateTime->format($fmt);

        $this->assertEquals(null, $obj->reverseTransform(null));
        $this->assertEquals(null, $obj->reverseTransform(""));
        $this->assertEquals($dateTime->getTimestamp(), $obj->reverseTransform($arg));
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

        $obj = new TestAbstractTimestampDataTransformer("Y-m-d H:i:s", "UTC");

        $this->assertInstanceOf(DataTransformerInterface::class, $obj);

        $fmt = $obj->getFormat();
        $exp = $dateTime->format($fmt);

        $this->assertEquals(null, $obj->transform(null));
        $this->assertEquals($exp, $obj->transform($dateTime->getTimestamp()));
    }
}
