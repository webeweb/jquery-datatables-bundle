<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Routing;

use Symfony\Component\Routing\RouterInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Routing\TestRouterTrait;

/**
 * Router trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Routing
 */
class RouterTraitTest extends AbstractTestCase {

    /**
     * Test setRouter()
     *
     * @return void
     */
    public function testSetRouter(): void {

        // Set a Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();

        $obj = new TestRouterTrait();

        $obj->setRouter($router);
        $this->assertSame($router, $obj->getRouter());
    }
}
