<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension;

use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Twig\Extension\TestDataTablesTwigExtensionTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;
use WBW\Bundle\SyntaxHighlighterBundle\Tests\AbstractTestCase;

/**
 * DataTables Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension
 */
class DataTablesTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() mmethod.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestDataTablesTwigExtensionTrait();

        $this->assertNull($obj->getDataTablesTwigExtension());
    }

    /**
     * Tests the setDataTablesTwigExtension() method.
     *
     * @return void
     */
    public function testSetDataTablesTwigExtension() {

        // Set a DataTables Twig extension mock.
        $dataTablesTwigExtension = new DataTablesTwigExtension($this->twigEnvironment, new RendererTwigExtension($this->twigEnvironment));

        $obj = new TestDataTablesTwigExtensionTrait();

        $obj->setDataTablesTwigExtension($dataTablesTwigExtension);
        $this->assertSame($dataTablesTwigExtension, $obj->getDataTablesTwigExtension());
    }

}
