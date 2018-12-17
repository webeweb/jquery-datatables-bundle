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

use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables editor exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception
 */
class BaDataTablesEditorException extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new BadDataTablesEditorException("exception");

        $res = "The DataTables editor \"Exception\" must implement DataTablesEditorInterface";
        $this->assertEquals($res, $obj->getMessage());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructWithNull() {

        $obj = new BadDataTablesEditorException(null);

        $res = "The DataTables editor is null";
        $this->assertEquals($res, $obj->getMessage());
    }

}
