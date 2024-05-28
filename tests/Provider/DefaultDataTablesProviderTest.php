<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Provider;

use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity\Employee;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\TestDefaultDataTablesProvider;

/**
 * Default DataTables provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Provider
 */
class DefaultDataTablesProviderTest extends AbstractTestCase {

    /**
     * DataTable provider.
     *
     * @var TestDefaultDataTablesProvider|null
     */
    private $dataTablesProvider;

    /**
     * Translator.
     *
     * @var TranslatorInterface|null
     */
    private $translator;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Translator mock.
        $this->translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();

        // Set a DataTables provider mock.
        $this->dataTablesProvider = new TestDefaultDataTablesProvider($this->translator);
    }

    /**
     * Test getCsvExporter()
     *
     * @return void
     */
    public function testGetCsvExporter(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->getCsvExporter());
    }

    /**
     * Test getEditor()
     *
     * @return void
     */
    public function testGetEditor(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->getEditor());
    }

    /**
     * Test getMethod()
     *
     * @return void
     */
    public function testGetMethod(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->getMethod());
    }

    /**
     * Test getOptions()
     *
     * @return void
     */
    public function testGetOptions(): void {

        $obj = $this->dataTablesProvider;

        $res = $obj->getOptions();
        $this->assertInstanceOf(DataTablesOptionsInterface::class, $res);

        $this->assertCount(5, $res->getOptions());

        $this->assertNotNull($res->getOption("language"));
        $this->assertEquals([[0, "asc"]], $res->getOption("order"));
        $this->assertTrue($res->getOption("responsive"));
        $this->assertEquals(["return" => true], $res->getOption("search"));
        $this->assertEquals([["responsivePriority" => 1, "targets" => -1,]], $res->getOption("columnDefs"));
    }

    /**
     * Test renderRow()
     *
     * @return void
     */
    public function testRenderRow(): void {

        // Set an Entity mock.
        $entity = $this->getMockBuilder(Employee::class)->getMock();
        $entity->expects($this->any())->method("getId")->willReturn(1);

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ATTR, $entity, 0));
        $this->assertNull($obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_CLASS, $entity, 0));
        $this->assertEquals(["id" => 1, "name" => "test"], $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_DATA, $entity, 0));
        $this->assertEquals("test_1", $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ID, $entity, 0));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = $this->dataTablesProvider;

        $this->assertInstanceOf(DataTablesProviderInterface::class, $obj);

        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
