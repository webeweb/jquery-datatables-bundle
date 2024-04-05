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

use WBW\Bundle\BootstrapBundle\Component\AbstractAlert;
use WBW\Bundle\BootstrapBundle\Component\AlertInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestAbstractAlert;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;
use WBW\Library\Symfony\Assets\AlertInterface as BaseAlertInterface;

/**
 * Abstract alert test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class AbstractAlertTest extends AbstractTestCase {

    /**
     * Test enumTypes()
     *
     * @return void
     */
    public function testEnumTypes(): void {

        $res = [
            BaseAlertInterface::ALERT_TYPE_DANGER,
            AlertInterface::ALERT_TYPE_DARK,
            BaseAlertInterface::ALERT_TYPE_INFO,
            AlertInterface::ALERT_TYPE_LIGHT,
            AlertInterface::ALERT_TYPE_PRIMARY,
            AlertInterface::ALERT_TYPE_SECONDARY,
            BaseAlertInterface::ALERT_TYPE_SUCCESS,
            BaseAlertInterface::ALERT_TYPE_WARNING,
        ];
        $this->assertEquals($res, AbstractAlert::enumTypes());
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        // Set the expected data.
        $data = file_get_contents(__DIR__ . "/../Fixtures/Component/AbstractAlertTest.testJsonSerialize.json");
        $json = json_decode($data, true);

        $obj = new TestAbstractAlert("test");
        $obj->setContent(BaseSerializerKeys::CONTENT);
        $obj->setDismissible(true);

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res);

        $this->assertEquals($json, $res);
    }

    /**
     * Test setDismissible()
     *
     * @return void
     */
    public function testSetDismissible(): void {

        $obj = new TestAbstractAlert("test");

        $obj->setDismissible(true);
        $this->assertTrue($obj->getDismissible());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractAlert("test");

        $this->assertInstanceOf(AlertInterface::class, $obj);

        $this->assertNull($obj->getContent());
        $this->assertEquals("test", $obj->getType());

        $this->assertNull($obj->getDismissible());
        $this->assertEquals("alert-", $obj->getPrefix());
    }

}
