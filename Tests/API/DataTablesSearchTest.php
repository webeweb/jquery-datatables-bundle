<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables search test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesSearchTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     */
    public function testConstruct() {

        $obj = new DataTablesSearch();

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }

}
