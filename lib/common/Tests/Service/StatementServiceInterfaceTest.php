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

use WBW\Bundle\CommonBundle\Service\StatementServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Statement service interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class StatementServiceInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals('/\n\-{2}\ =+\n/', StatementServiceInterface::STATEMENT_SEPARATOR);
    }
}
