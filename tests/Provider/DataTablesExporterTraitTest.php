<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Provider;

use WBW\Bundle\DataTablesBundle\Provider\DataTablesExporterInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\TestDataTablesExporterTrait;

/**
 * DataTables exporter trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Provider
 */
class DataTablesExporterTraitTest extends AbstractTestCase {

    /**
     * Test setExporter()
     *
     * @return void
     */
    public function testSetExporter(): void {

        // Set a DataTables exporter mock.
        $exporter = $this->getMockBuilder(DataTablesExporterInterface::class)->getMock();

        $obj = new TestDataTablesExporterTrait();

        $obj->setExporter($exporter);
        $this->assertSame($exporter, $obj->getExporter());
    }
}
