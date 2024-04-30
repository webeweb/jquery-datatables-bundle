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

namespace WBW\Bundle\CommonBundle\Tests\Controller;

use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Views controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Controller
 */
class ViewsControllerTest extends AbstractWebTestCase {

    /**
     * Test lib/common/Resources/views/assets/_javascripts.html.twig
     *
     * @return void
     */
    public function testAssetsJavascriptsAction(): void {

        $client = $this->client;

        $client->request("GET", "/common/assets/javascripts");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("text/html; charset=", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Test lib/common/Resources/views/assets/_stylesheets.html.twig
     *
     * @return void
     */
    public function testAssetsStylesheetsAction(): void {

        $client = $this->client;

        $client->request("GET", "/common/assets/stylesheets");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("text/html; charset=", $client->getResponse()->headers->get("Content-Type"));
    }
}
