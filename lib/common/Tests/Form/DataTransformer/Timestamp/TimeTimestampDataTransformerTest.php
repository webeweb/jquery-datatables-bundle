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

namespace WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\Timestamp;

use Symfony\Component\Form\DataTransformerInterface;
use WBW\Bundle\CommonBundle\Form\DataTransformer\Timestamp\TimeTimestampDataTransformer;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Time timestamp data transformer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\Timestamp
 */
class TimeTimestampDataTransformerTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TimeTimestampDataTransformer();

        $this->assertInstanceOf(DataTransformerInterface::class, $obj);

        $this->assertEquals("H:i:s", $obj->getFormat());
        $this->assertEquals("UTC", $obj->getTimezone());
    }
}
