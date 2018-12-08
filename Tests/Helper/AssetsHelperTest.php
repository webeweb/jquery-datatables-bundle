<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\CoreBundle\Tests\Fixtures\Helper\TestAssetsHelper;

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
     * {@inheritdoc}
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
     */
    public function testListAssets() {

        $res = TestAssetsHelper::listAssets($this->directoryAssets);
        $this->assertCount(16, $res);

        $this->assertRegexp("/datatables\-.*\.zip$/", $res[0]);
        $this->assertRegexp("/datatables\-autofill\-.*\.zip$/", $res[1]);
        $this->assertRegexp("/datatables\-buttons\-.*\.zip$/", $res[2]);
        $this->assertRegexp("/datatables\-colreorder\-.*\.zip$/", $res[3]);
        $this->assertRegexp("/datatables\-fixedcolumns\-.*\.zip$/", $res[4]);
        $this->assertRegexp("/datatables\-fixedheader\-.*\.zip$/", $res[5]);
        $this->assertRegexp("/datatables\-i18n\-.*\.zip$/", $res[6]);
        $this->assertRegexp("/datatables\-jszip\-.*\.zip$/", $res[7]);
        $this->assertRegexp("/datatables\-keytable\-.*\.zip$/", $res[8]);
        $this->assertRegexp("/datatables\-pdfmake\-.*\.zip$/", $res[9]);
        $this->assertRegexp("/datatables\-responsive\-.*\.zip$/", $res[10]);
        $this->assertRegexp("/datatables\-rowgroup\-.*\.zip$/", $res[11]);
        $this->assertRegexp("/datatables\-rowreorder\-.*\.zip$/", $res[12]);
        $this->assertRegexp("/datatables\-scroller\-.*\.zip$/", $res[13]);
        $this->assertRegexp("/datatables\-select\-.*\.zip$/", $res[14]);
        $this->assertRegexp("/editable\-table\.zip$/", $res[15]);
    }

}
