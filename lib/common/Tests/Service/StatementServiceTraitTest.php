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
use WBW\Bundle\CommonBundle\Tests\Fixtures\Service\TestStatementServiceTrait;

/**
 * Statement service trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class StatementServiceTraitTest extends AbstractTestCase {

    /**
     * Test setStatementService()
     *
     * @return void
     */
    public function testSetStatementService(): void {

        // Set a Statement service mock.
        $statementService = $this->getMockBuilder(StatementServiceInterface::class)->getMock();

        $obj = new TestStatementServiceTrait();

        $obj->setStatementService($statementService);
        $this->assertSame($statementService, $obj->getStatementService());
    }
}
