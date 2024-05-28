<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Controller;

use Symfony\Component\Routing\RouterInterface;
use WBW\Bundle\CommonBundle\Provider\JavascriptProvider;
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

        /** @var RouterInterface $router */
        $router = static::$kernel->getContainer()->get("router");

        $provider = new JavascriptProvider();
        foreach ($provider->getJavascripts() as $k => $v) {

            $uri = $router->generate("wbw_common_twig_resource", ["name" => $k, "type" => "js"]);

            $client->request("GET", $uri);
            $this->assertEquals(200, $client->getResponse()->getStatusCode(), $v);
            $this->assertEquals("application/javascript", $client->getResponse()->headers->get("Content-Type"), $v);
        }
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
