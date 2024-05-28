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

namespace WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\DateTime;

use Symfony\Component\Form\DataTransformerInterface;
use WBW\Bundle\CommonBundle\Form\DataTransformer\DateTime\DateDateTimeDataTransformer;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Date date/time data transformer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\DateTime
 */
class DateDateTimeDataTransformerTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DateDateTimeDataTransformer();

        $this->assertInstanceOf(DataTransformerInterface::class, $obj);

        $this->assertEquals("Y-m-d", $obj->getFormat());
        $this->assertEquals("UTC", $obj->getTimezone());
    }
}
