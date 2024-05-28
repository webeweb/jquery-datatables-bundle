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

namespace WBW\Bundle\CommonBundle\Tests\HttpFoundation;

use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation\TestResponseTrait;

/**
 * Response trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\HttpFoundation
 */
class ResponseTraitTest extends AbstractTestCase {

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Response mock.
        $response = new Response();

        $obj = new TestResponseTrait();

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
