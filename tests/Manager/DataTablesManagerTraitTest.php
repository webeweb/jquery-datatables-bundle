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

namespace WBW\Bundle\DataTablesBundle\Tests\Manager;

use WBW\Bundle\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Manager\TestDataTablesManagerTrait;

/**
 * DataTables manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Manager
 */
class DataTablesManagerTraitTest extends AbstractTestCase {

    /**
     * Test setDataTablesManager()
     *
     * @return void
     */
    public function testSetDataTablesManager(): void {

        // Set a DataTables manager mock.
        $dataTablesManager = new DataTablesManager();

        $obj = new TestDataTablesManagerTrait();

        $obj->setDataTablesManager($dataTablesManager);
        $this->assertSame($dataTablesManager, $obj->getDataTablesManager());
    }
}
