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

namespace WBW\Bundle\CommonBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ServerBag;
use WBW\Bundle\CommonBundle\Controller\HostController;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;
use WBW\Library\Common\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * Host controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Controller
 */
class HostControllerTest extends AbstractWebTestCase {

    /**
     * Test cpuAction()
     *
     * @return void
     */
    public function testCpuAction(): void {

        $client = $this->client;

        $client->request("GET", "/host/cpu");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);
        $this->assertCount(4, $res);

        $this->assertTrue($res[BaseSerializerKeys::SUCCESS]);
        $this->assertNull($res[BaseSerializerKeys::MESSAGE]);
        $this->assertNull($res[BaseSerializerKeys::ERRORS]);
        $this->assertCount(8, $res[BaseSerializerKeys::DATA]);

        $this->assertArrayHasKey(BaseSerializerKeys::US, $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey(BaseSerializerKeys::SY, $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey(BaseSerializerKeys::NI, $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey(BaseSerializerKeys::ID, $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey(BaseSerializerKeys::WA, $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey(BaseSerializerKeys::HI, $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey(BaseSerializerKeys::SI, $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey(BaseSerializerKeys::ST, $res[BaseSerializerKeys::DATA]);
    }

    /**
     * Test hardDisksAction()
     *
     * @return void
     */
    public function testHardDisksAction(): void {

        $client = $this->client;

        $client->request("GET", "/host/hard-disks");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);
        $this->assertCount(4, $res);

        $this->assertTrue($res[BaseSerializerKeys::SUCCESS]);
        $this->assertNull($res[BaseSerializerKeys::MESSAGE]);
        $this->assertNull($res[BaseSerializerKeys::ERRORS]);
        $this->assertNotCount(0, $res[BaseSerializerKeys::DATA]);

        $this->assertArrayHasKey(BaseSerializerKeys::AVAILABLE, $res[BaseSerializerKeys::DATA][0]);
        $this->assertArrayHasKey(BaseSerializerKeys::FILE_SYSTEM, $res[BaseSerializerKeys::DATA][0]);
        $this->assertArrayHasKey(BaseSerializerKeys::MOUNTED_ON, $res[BaseSerializerKeys::DATA][0]);
        $this->assertArrayHasKey(BaseSerializerKeys::NAME, $res[BaseSerializerKeys::DATA][0]);
        $this->assertArrayHasKey(BaseSerializerKeys::TYPE, $res[BaseSerializerKeys::DATA][0]);
        $this->assertArrayHasKey(BaseSerializerKeys::USED, $res[BaseSerializerKeys::DATA][0]);
        $this->assertArrayHasKey(BaseSerializerKeys::USE_PERCENT, $res[BaseSerializerKeys::DATA][0]);
    }

    /**
     * Test memoryAction()
     *
     * @return void
     */
    public function testMemoryAction(): void {

        $client = $this->client;

        $client->request("GET", "/host/memory");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);
        $this->assertCount(4, $res);

        $this->assertTrue($res[BaseSerializerKeys::SUCCESS]);
        $this->assertNull($res[BaseSerializerKeys::MESSAGE]);
        $this->assertNull($res[BaseSerializerKeys::ERRORS]);
        $this->assertNotCount(0, $res[BaseSerializerKeys::DATA]);

        $this->assertArrayHasKey("MemAvailable", $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey("MemFree", $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey("MemTotal", $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey("SwapFree", $res[BaseSerializerKeys::DATA]);
        $this->assertArrayHasKey("SwapTotal", $res[BaseSerializerKeys::DATA]);
    }

    /**
     * Test retrieveInformationDatabase()
     *
     * @return void
     */
    public function testRetrieveInformationDatabase(): void {

        $obj = new HostController();
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->retrieveInformationDatabase();
        $this->assertCount(6, $res);

        $this->assertArrayHasKey("driver", $res);
        $this->assertArrayHasKey("dbname", $res);
        $this->assertArrayHasKey("host", $res);
        $this->assertArrayHasKey("port", $res);
        $this->assertArrayHasKey("user", $res);
        $this->assertArrayHasKey("serverVersion", $res);
    }

    /**
     * Test retrieveInformationServer()
     *
     * @return void
     */
    public function testRetrieveInformationServer(): void {

        // Set a Request mock.
        $request         = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $request->server = $this->getMockBuilder(ServerBag::class)->disableOriginalConstructor()->getMock();

        $obj = new HostController();
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->retrieveInformationServer($request);
        $this->assertCount(5, $res);

        $this->assertArrayHasKey("maxExecutionTime", $res);
        $this->assertArrayHasKey("memoryLimit", $res);
        $this->assertArrayHasKey("phpUname", $res);
        $this->assertArrayHasKey("phpVersion", $res);
        $this->assertArrayHasKey("serverSoftware", $res);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.controller.host", HostController::SERVICE_NAME);
    }
}
