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

use WBW\Bundle\CommonBundle\Controller\TwigController;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Twig controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Controller
 */
class TwigControllerTest extends AbstractWebTestCase {

    /**
     * Test functionAction()
     *
     * @return void
     */
    public function testFunctionAction(): void {

        $arg = "string";
        $exp = md5("string");

        $client = $this->client;

        $client->request("POST", "/twig/function/md5", ["args" => [$arg]]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals($exp, $res[0]);
    }

    /**
     * Test functionAction()
     *
     * @return void
     */
    public function testFunctionActionWithStatus404(): void {

        $client = $this->client;

        $client->request("POST", "/twig/function/exception");
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Test resourceAction()
     *
     * @return void
     */
    public function testResourceAction(): void {

        $client = $this->client;

        $client->request("GET", "/twig/resource/404.js");
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("text/html; charset=", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Test resourceAction()
     *
     * @return void
     */
    public function testResourceActionWithJavascript(): void {

        $client = $this->client;

        $client->request("GET", "/twig/resource/WBWCommonLeaflet.js");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/javascript", $client->getResponse()->headers->get("Content-Type"));
        $this->assertNotNull($client->getResponse()->headers->get("Last-Modified"));
    }

    /**
     * Test resourceAction()
     *
     * @return void
     */
    public function testResourceActionWithStylesheet(): void {

        $client = $this->client;

        $client->request("GET", "/twig/resource/WBWCommonTest.css");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("text/css; charset=", $client->getResponse()->headers->get("Content-Type"));
        $this->assertNotNull($client->getResponse()->headers->get("Last-Modified"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.controller.twig", TwigController::SERVICE_NAME);
    }
}
