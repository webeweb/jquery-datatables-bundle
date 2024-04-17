<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use JsonSerializable;
use WBW\Bundle\WidgetBundle\Component\AlertInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestAlert;

/**
 * Abstract alert test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class AbstractAlertTest extends AbstractTestCase {

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new TestAlert("test");

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAlert("test");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(AlertInterface::class, $obj);

        $this->assertNull($obj->getContent());
        $this->assertEquals("test", $obj->getType());
    }
}
