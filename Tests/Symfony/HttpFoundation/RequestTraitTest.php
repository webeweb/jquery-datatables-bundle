<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Symfony\HttpFoundation;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\HttpFoundation\TestRequestTrait;

/**
 * Request trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\HttpFoundation
 */
class RequestTraitTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Request mock.
        $request = new Request();

        $obj = new TestRequestTrait();

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }
}
