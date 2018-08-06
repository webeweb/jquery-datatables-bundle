<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;

/**
 * Already registered DataTables provider exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception
 * @final
 */
final class AlreadyRegisteredDataTablesProviderExceptionTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new AlreadyRegisteredDataTablesProviderException("exception");

        $this->assertEquals("A DataTables provider with name \"exception\" is already registered", $obj->getMessage());
    }

}
