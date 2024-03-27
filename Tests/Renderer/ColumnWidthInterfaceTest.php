<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer;

use WBW\Bundle\DataTablesBundle\Renderer\ColumnWidthInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Column width interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer
 */
class ColumnWidthInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("20px", ColumnWidthInterface::COLUMN_WIDTH_XXS);
        $this->assertEquals("40px", ColumnWidthInterface::COLUMN_WIDTH_XS);
        $this->assertEquals("80px", ColumnWidthInterface::COLUMN_WIDTH_S);
        $this->assertEquals("120px", ColumnWidthInterface::COLUMN_WIDTH_M);
        $this->assertEquals("160px", ColumnWidthInterface::COLUMN_WIDTH_L);
        $this->assertEquals("200px", ColumnWidthInterface::COLUMN_WIDTH_XL);
        $this->assertEquals("240px", ColumnWidthInterface::COLUMN_WIDTH_XXL);
        $this->assertEquals("280px", ColumnWidthInterface::COLUMN_WIDTH_XXXL);

        $this->assertEquals(ColumnWidthInterface::COLUMN_WIDTH_L, ColumnWidthInterface::COLUMN_WIDTH_ACTIONS);
        $this->assertEquals(ColumnWidthInterface::COLUMN_WIDTH_M, ColumnWidthInterface::COLUMN_WIDTH_DATE);
        $this->assertEquals(ColumnWidthInterface::COLUMN_WIDTH_XXS, ColumnWidthInterface::COLUMN_WIDTH_ICON);
        $this->assertEquals(ColumnWidthInterface::COLUMN_WIDTH_L, ColumnWidthInterface::COLUMN_WIDTH_LABEL);
        $this->assertEquals(ColumnWidthInterface::COLUMN_WIDTH_S, ColumnWidthInterface::COLUMN_WIDTH_THUMBNAIL);
        $this->assertEquals(ColumnWidthInterface::COLUMN_WIDTH_XS, ColumnWidthInterface::COLUMN_WIDTH_UNIT);
    }
}
