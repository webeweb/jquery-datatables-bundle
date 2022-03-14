<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Controller;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractWebTestCase;

/**
 * Layout controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Controller
 */
class LayoutControllerTest extends AbstractWebTestCase {

    /**
     * Tests javascriptsAction()
     *
     * @return void
     */
    public function testJavascriptsAction(): void {

        $client = $this->client;

        $client->request("GET", "/javascripts");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Tests stylesheetsAction()
     *
     * @return void
     */
    public function testStylesheetsAction(): void {

        $client = $this->client;

        $client->request("GET", "/stylesheets");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }
}
