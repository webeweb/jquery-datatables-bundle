<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Exception;
use WBW\Bundle\CoreBundle\Tests\Fixtures\Helper\TestAssetsHelper;
use WBW\Bundle\JQuery\DataTablesBundle\DataTablesVersionInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Assets helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class AssetsHelperTest extends AbstractTestCase {

    /**
     * Directory "assets".
     *
     * @var string
     */
    private $directoryAssets;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set the directories.
        $this->directoryAssets = getcwd() . "/Resources/assets";
    }

    /**
     * Tests the listAssets() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testListAssets() {

        $res = TestAssetsHelper::listAssets($this->directoryAssets);
        $this->assertCount(15, $res);

        $this->assertRegexp("/" . preg_quote("datatables-" . DataTablesVersionInterface::DATATABLES_VERSION . ".zip") . "$/", $res[0]);
        $this->assertRegexp("/" . preg_quote("datatables-autofill-" . DataTablesVersionInterface::DATATABLES_AUTOFILL_VERSION . ".zip") . "$/", $res[1]);
        $this->assertRegexp("/" . preg_quote("datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . ".zip") . "$/", $res[2]);
        $this->assertRegexp("/" . preg_quote("datatables-colreorder-" . DataTablesVersionInterface::DATATABLES_COLREORDER_VERSION . ".zip") . "$/", $res[3]);
        $this->assertRegexp("/" . preg_quote("datatables-fixedcolumns-" . DataTablesVersionInterface::DATATABLES_FIXEDCOLUMNS_VERSION . ".zip") . "$/", $res[4]);
        $this->assertRegexp("/" . preg_quote("datatables-fixedheader-" . DataTablesVersionInterface::DATATABLES_FIXEDHEADER_VERSION . ".zip") . "$/", $res[5]);
        $this->assertRegexp("/" . preg_quote("datatables-jszip-" . DataTablesVersionInterface::DATATABLES_JSZIP_VERSION . ".zip") . "$/", $res[6]);
        $this->assertRegexp("/" . preg_quote("datatables-keytable-" . DataTablesVersionInterface::DATATABLES_KEYTABLE_VERSION . ".zip") . "$/", $res[7]);
        $this->assertRegexp("/" . preg_quote("datatables-pdfmake-" . DataTablesVersionInterface::DATATABLES_PDFMAKE_VERSION . ".zip") . "$/", $res[8]);
        $this->assertRegexp("/" . preg_quote("datatables-responsive-" . DataTablesVersionInterface::DATATABLES_RESPONSIVE_VERSION . ".zip") . "$/", $res[9]);
        $this->assertRegexp("/" . preg_quote("datatables-rowgroup-" . DataTablesVersionInterface::DATATABLES_ROWGROUP_VERSION . ".zip") . "$/", $res[10]);
        $this->assertRegexp("/" . preg_quote("datatables-rowreorder-" . DataTablesVersionInterface::DATATABLES_ROWREORDER_VERSION . ".zip") . "$/", $res[11]);
        $this->assertRegexp("/" . preg_quote("datatables-scroller-" . DataTablesVersionInterface::DATATABLES_SCROLLER_VERSION . ".zip") . "$/", $res[12]);
        $this->assertRegexp("/" . preg_quote("datatables-select-" . DataTablesVersionInterface::DATATABLES_SELECT_VERSION . ".zip") . "$/", $res[13]);
        $this->assertRegexp("/editable\-table\.zip$/", $res[14]);
    }
}
