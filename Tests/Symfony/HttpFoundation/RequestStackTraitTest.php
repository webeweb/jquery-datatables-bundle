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

use Symfony\Component\HttpFoundation\RequestStack;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\HttpFoundation\TestRequestStackTrait;

/**
 * Request stack trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\HttpFoundation
 */
class RequestStackTraitTest extends AbstractTestCase {

    /**
     * Test setRequestStack()
     *
     * @return void
     */
    public function testSetRequestStack(): void {

        // Set a Request stack mock.
        $requestStack = new RequestStack();

        $obj = new TestRequestStackTrait();

        $obj->setRequestStack($requestStack);
        $this->assertSame($requestStack, $obj->getRequestStack());
    }
}
