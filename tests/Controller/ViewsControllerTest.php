<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Controller;

use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as BaseWebTestCase;

/**
 * Views controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Controller
 */
class ViewsControllerTest extends BaseWebTestCase {

    /**
     * Test src/Resources/views/assets/_javascripts.html.twig
     *
     * @return void
     */
    public function testAssetsJavascriptsAction(): void {

        $client = $this->client;

        $client->request("GET", "/assets/javascripts");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Test src/Resources/views/assets/_stylesheets.html.twig
     *
     * @return void
     */
    public function testAssetsStylesheetsAction(): void {

        $client = $this->client;

        $client->request("GET", "/assets/stylesheets");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }
}
