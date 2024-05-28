<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\ProgressBarInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestAbstractProgressBar;

/**
 * Abstract progress bar test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class AbstractProgressBarTest extends AbstractTestCase {

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new TestAbstractProgressBar("test");

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test setAnimated()
     *
     * @return void
     */
    public function testSetAnimated(): void {

        $obj = new TestAbstractProgressBar("type");

        $obj->setAnimated(true);
        $this->assertTrue($obj->getAnimated());
    }

    /**
     * Test setStriped()
     *
     * @return void
     */
    public function testSetStriped(): void {

        $obj = new TestAbstractProgressBar("type");

        $obj->setStriped(true);
        $this->assertTrue($obj->getStriped());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractProgressBar("type");

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ProgressBarInterface::class, $obj);

        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getMax());
        $this->assertNull($obj->getMin());
        $this->assertEquals("type", $obj->getType());
        $this->assertNull($obj->getValue());

        $this->assertNull($obj->getAnimated());
        $this->assertEquals("progress-bar-", $obj->getPrefix());
        $this->assertNull($obj->getStriped());
    }
}
