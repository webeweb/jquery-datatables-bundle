<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Symfony\Routing;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\Routing\TestRouterTrait;

/**
 * Router trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\Routing
 */
class RouterTraitTest extends AbstractTestCase {

    /**
     * Test setRouter()
     *
     * @return void
     */
    public function testSetRouter(): void {

        $obj = new TestRouterTrait();

        $obj->setRouter($this->router);
        $this->assertSame($this->router, $obj->getRouter());
    }
}