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

namespace WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\Timestamp;

use WBW\Bundle\CommonBundle\Form\DataTransformer\Timestamp\DateTimestampDataTransformer;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Date timestamp data transformer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\Timestamp
 */
class DateTimestampDataTransformerTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DateTimestampDataTransformer();

        $this->assertEquals("Y-m-d", $obj->getFormat());
        $this->assertEquals("UTC", $obj->getTimezone());
    }
}
