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

namespace WBW\Bundle\CommonBundle\Tests\HttpFoundation;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation\TestRequestTrait;

/**
 * Request trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\HttpFoundation
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
