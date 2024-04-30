<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Controller;

use WBW\Bundle\BootstrapBundle\Tests\AbstractWebTestCase;
use WBW\Bundle\BootstrapBundle\WBWBootstrapBundle;

/**
 * Views controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Controller
 */
class ViewsControllerTest extends AbstractWebTestCase {

    /**
     * Test lib/bootstrap/Resources/views/layout.html.twig
     *
     * @return void
     */
    public function testLayoutAction(): void {

        $client = $this->client;

        $client->request("GET", "/bootstrap/layout");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertStringContainsString(WBWBootstrapBundle::BOOTSTRAP_VERSION_4 . "/css", $client->getResponse()->getContent());
        $this->assertStringContainsString(WBWBootstrapBundle::BOOTSTRAP_VERSION_4 . "/js", $client->getResponse()->getContent());
    }

    /**
     * Test lib/bootstrap/Resources/views/layout/_flash_bag.html.twig
     *
     * @return void
     */
    public function testLayoutFlashBagAction(): void {

        $client = $this->client;

        $client->request("GET", "/bootstrap/layout/flash-bag");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Controller/ViewsControllerTest.testLayoutFlashBagAction.html.txt") . "    ";
        $this->assertEquals($exp, $client->getResponse()->getContent());
    }

    /**
     * Test lib/bootstrap/Resources/views/layout/_no_data_to_display.html.twig
     *
     * @return void
     */
    public function testLayoutNoDataDisplayAction(): void {

        $client = $this->client;

        $client->request("GET", "/bootstrap/layout/no-data-to-display");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Test lib/bootstrap/Resources/views/layout/_work_in_progress.html.twig
     *
     * @return void
     */
    public function testLayoutWorkInProgressAction(): void {

        $client = $this->client;

        $client->request("GET", "/bootstrap/layout/work-in-progress");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }
}
