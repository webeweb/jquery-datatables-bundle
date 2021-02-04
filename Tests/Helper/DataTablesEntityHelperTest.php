<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Symfony\Component\Serializer\Serializer;
use WBW\Bundle\JQuery\DataTablesBundle\Entity\DataTablesEntityInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Employee;

/**
 * DataTables entity helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class DataTablesEntityHelperTest extends AbstractTestCase {

    /**
     * Tests the isCompatible() method.
     *
     * @return void
     */
    public function testIsCompatible(): void {

        // Set a DataTables entity mock.
        $dtEntity = $this->getMockBuilder(DataTablesEntityInterface::class)->getMock();

        $this->assertTrue(DataTablesEntityHelper::isCompatible($dtEntity));
        $this->assertTrue(DataTablesEntityHelper::isCompatible(new Employee()));
        $this->assertFalse(DataTablesEntityHelper::isCompatible($this));
    }

    /**
     * Tests the newSerializer() method.
     *
     * @return void
     */
    public function testNewSerializer(): void {

        $res = DataTablesEntityHelper::newSerializer();

        $this->assertInstanceOf(Serializer::class, $res);
    }
}
