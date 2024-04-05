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

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use WBW\Bundle\BootstrapBundle\Component\ProgressBarInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestAbstractProgressBar;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;

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

        // Set the expected data.
        $data = file_get_contents(__DIR__ . "/../Fixtures/Component/AbstractProgressBarTest.testJsonSerialize.json");
        $json = json_decode($data, true);

        $obj = new TestAbstractProgressBar("test");
        $obj->setAnimated(true);
        $obj->setContent(BaseSerializerKeys::CONTENT);
        $obj->setHeight(16);
        $obj->setMin(0);
        $obj->setMax(100);
        $obj->setStriped(true);
        $obj->setValue(50);

        $res = $obj->jsonSerialize();
        $this->assertCount(9, $res);

        $this->assertEquals($json, $res);
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
