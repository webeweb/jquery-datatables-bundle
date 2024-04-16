<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Icon;

use JsonSerializable;
use WBW\Bundle\WidgetBundle\Icon\IconInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Icon\TestIcon;

/**
 * Abstract icon test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Icon
 */
class AbstractIconTest extends AbstractTestCase {

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new TestIcon();

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestIcon();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(IconInterface::class, $obj);

        $this->assertNull($obj->getName());
        $this->assertNull($obj->getStyle());
    }
}
