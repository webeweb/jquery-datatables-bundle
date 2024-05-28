<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Service;

use WBW\Bundle\CommonBundle\Service\TokenService;
use WBW\Bundle\CommonBundle\Service\TokenServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Token generator service test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class TokenServiceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.service.token", TokenService::SERVICE_NAME);

        $obj = new TokenService();

        $this->assertInstanceOf(TokenServiceInterface::class, $obj);
    }
}
