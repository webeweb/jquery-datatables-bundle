<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension;

use WBW\Bundle\CoreBundle\Tests\AbstractTestCase;
use WBW\Bundle\CoreBundle\Twig\Extension\AssetsTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Twig\Extension\TestDataTablesTwigExtensionTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension
 */
class DataTablesTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setDataTablesTwigExtension()
     *
     * @return void
     */
    public function testSetDataTablesTwigExtension(): void {

        // Set a DataTables Twig extension mock.
        $dataTablesTwigExtension = new DataTablesTwigExtension($this->twigEnvironment, new AssetsTwigExtension($this->twigEnvironment), "test");

        $obj = new TestDataTablesTwigExtensionTrait();

        $obj->setDataTablesTwigExtension($dataTablesTwigExtension);
        $this->assertSame($dataTablesTwigExtension, $obj->getDataTablesTwigExtension());
    }
}
