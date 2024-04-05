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

use WBW\Bundle\CommonBundle\Form\DataTransformer\DateTime\DefaultDateTimeDataTransformer;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Default date/time data transformer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\DataTransformer\DateTime
 */
class DefaultDateTimeDataTransformerTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DefaultDateTimeDataTransformer();

        $this->assertEquals("Y-m-d H:i:s", $obj->getFormat());
        $this->assertEquals("UTC", $obj->getTimezone());
    }
}
