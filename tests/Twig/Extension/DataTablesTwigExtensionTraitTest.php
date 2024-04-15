<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Twig\Extension;

use Twig\Environment;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Twig\Extension\TestDataTablesTwigExtensionTrait;
use WBW\Bundle\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Twig\Extension
 */
class DataTablesTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setDataTablesTwigExtension()
     *
     * @return void
     */
    public function testSetDataTablesTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a DataTables Twig extension mock.
        $dataTablesTwigExtension = new DataTablesTwigExtension($twigEnvironment, "test");

        $obj = new TestDataTablesTwigExtensionTrait();

        $obj->setDataTablesTwigExtension($dataTablesTwigExtension);
        $this->assertSame($dataTablesTwigExtension, $obj->getDataTablesTwigExtension());
    }
}
