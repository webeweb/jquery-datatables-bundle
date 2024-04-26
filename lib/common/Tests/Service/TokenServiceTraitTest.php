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

namespace WBW\Bundle\CommonBundle\Tests\Service;

use WBW\Bundle\CommonBundle\Service\TokenServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Service\TestTokenServiceTrait;

/**
 * Token generator service trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class TokenServiceTraitTest extends AbstractTestCase {

    /**
     * Test setTokenService()
     *
     * @return void
     */
    public function testSetTokenService(): void {

        // Set a Token service mock.
        $tokenService = $this->getMockBuilder(TokenServiceInterface::class)->getMock();

        $obj = new TestTokenServiceTrait();

        $obj->setTokenService($tokenService);
        $this->assertSame($tokenService, $obj->getTokenService());
    }
}
