<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\DateTime;

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

        $this->assertEquals("Y-m-d", $obj->getFormat());
        $this->assertEquals("UTC", $obj->getTimezone());
    }
}
