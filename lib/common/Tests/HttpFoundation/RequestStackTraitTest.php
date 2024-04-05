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

namespace WBW\Bundle\CommonBundle\Tests\HttpFoundation;

use Symfony\Component\HttpFoundation\RequestStack;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation\TestRequestStackTrait;

/**
 * Request stack trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\HttpFoundation
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
