<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception;

use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables repository exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception
 */
class BaDataTablesRepositoryException extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new BadDataTablesRepositoryException("exception");

        $res = "The DataTables repository \"Exception\" must implement DataTablesRepositoryInterface";
        $this->assertEquals($res, $obj->getMessage());
    }
}
