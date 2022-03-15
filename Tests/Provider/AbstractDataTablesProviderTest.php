<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Provider;

use DateTime;
use Exception;
use InvalidArgumentException;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtension;
use WBW\Bundle\CoreBundle\Tests\TestCaseHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Renderer\ColumnWidthInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Employee;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider\TestDataTablesProvider;

/**
 * Abstract DataTables provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Provider
 */
class AbstractDataTablesProviderTest extends AbstractTestCase {

    /**
     * Button Twig extension.
     *
     * @var ButtonTwigExtension
     */
    private $buttonTwigExtension;

    /**
     * DataTables provider.
     *
     * @var TestDataTablesProvider
     */
    private $dataTablesProvider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a generate() closure.
        $generate = TestCaseHelper::getRouterGenerateFunction();

        // Set the Router mock.
        $this->router->expects($this->any())->method("generate")->willReturnCallback($generate);

        // Set a Button Twig extension mock.
        $this->buttonTwigExtension = new ButtonTwigExtension($this->twigEnvironment);

        // Set a DataTables provider mock.
        $this->dataTablesProvider = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);
    }

    /**
     * Tests getCSVExporter()
     *
     * @return void
     */
    public function testGetCSVExporter(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->getCSVExporter());
    }

    /**
     * Tests getEditor()
     *
     * @return void
     */
    public function testGetEditor(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->getEditor());
    }

    /**
     * Tests getMethod()
     *
     * @return void
     */
    public function testGetMethod(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->getMethod());
    }

    /**
     * Tests getOptions()
     *
     * @return void
     */
    public function testGetOptions(): void {

        $obj = $this->dataTablesProvider;

        $res = $obj->getOptions();
        $this->assertInstanceOf(DataTablesOptionsInterface::class, $res);

        $this->assertCount(3, $res->getOptions());

        $this->assertEquals([[0, "asc"]], $res->getOption("order"));
        $this->assertTrue($res->getOption("responsive"));
        $this->assertEquals(1000, $res->getOption("searchDelay"));
    }

    /**
     * Tests renderActionButtonDelete()
     *
     * @return void
     */
    public function testRenderActionButtonDelete(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonDelete(new Employee(), "deleteRoute"));
    }

    /**
     * Tests renderActionButtonDelete()
     *
     * @return void
     */
    public function testRenderActionButtonDeleteWithInvalidArgumentException(): void {

        $obj = $this->dataTablesProvider;

        try {

            $obj->renderActionButtonDelete($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests renderActionButtonDuplicate()
     *
     * @return void
     */
    public function testRenderActionButtonDuplicate(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDuplicate.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonDuplicate(new Employee(), "duplicateRoute"));
    }

    /**
     * Tests renderActionButtonDuplicate()
     *
     * @return void
     */
    public function testRenderActionButtonDuplicateWithInvalidArgumentException(): void {

        $obj = $this->dataTablesProvider;

        try {

            $obj->renderActionButtonDuplicate($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests renderActionButtonEdit()
     *
     * @return void
     */
    public function testRenderActionButtonEdit(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonEdit(new Employee(), "editRoute"));
    }

    /**
     * Tests renderActionButtonEdit()
     *
     * @return void
     */
    public function testRenderActionButtonEditWithInvalidArgumentException(): void {

        $obj = $this->dataTablesProvider;

        try {

            $obj->renderActionButtonEdit($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests renderActionButtonNew()
     *
     * @return void
     */
    public function testRenderActionButtonNew(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonNew.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonNew(new Employee(), "newRoute"));
    }

    /**
     * Tests renderActionButtonNew()
     *
     * @return void
     */
    public function testRenderActionButtonNewWithInvalidArgumentException(): void {

        $obj = $this->dataTablesProvider;

        try {

            $obj->renderActionButtonNew($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests renderActionButtonNew()
     *
     * @return void
     */
    public function testRenderActionButtonNewWithNullEntity(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonNew.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonNew(null, "newRoute"));
    }

    /**
     * Tests renderActionButtonShow()
     *
     * @return void
     */
    public function testRenderActionButtonShow(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonShow(new Employee(), "showRoute"));
    }

    /**
     * Tests renderActionButtonShow()
     *
     * @return void
     */
    public function testRenderActionButtonShowWithInvalidArgumentException(): void {

        $obj = $this->dataTablesProvider;

        try {

            $obj->renderActionButtonShow($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests renderActionButtonSwitch()
     *
     * @return void
     */
    public function testRenderActionButtonSwitchWithFalse(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonSwitchOff.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonSwitch(new Employee(), "switchRoute", false));
    }

    /**
     * Tests renderActionButtonSwitch()
     *
     * @return void
     */
    public function testRenderActionButtonSwitchWithTrue(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonSwitchOn.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonSwitch(new Employee(), "switchRoute", true));
    }

    /**
     * Tests renderButtons()
     *
     * @return void
     */
    public function testRenderButtons(): void {

        $obj = $this->dataTablesProvider;

        $res = implode(" ", [
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt"),
            '<a class="btn btn-danger btn-xs" title="label.delete" href="wbw_jquery_datatables_delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>',
        ]);
        $this->assertEquals($res, $obj->renderButtons(new Employee(), "editRoute"));
    }

    /**
     * Tests renderDate()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRenderDate(): void {

        $obj = $this->dataTablesProvider;

        $this->assertEquals(null, $obj->renderDate(null));
        $this->assertEquals("14/01/2019", $obj->renderDate(new DateTime("2019-01-14")));
        $this->assertEquals("14-01-2019", $obj->renderDate(new DateTime("2019-01-14"), "d-m-Y"));
    }

    /**
     * Tests renderDateTime()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRenderDateTime(): void {

        $obj = $this->dataTablesProvider;

        $this->assertEquals(null, $obj->renderDateTime(null));
        $this->assertEquals("14/01/2019 18:15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00")));
        $this->assertEquals("14-01-2019 18h15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00"), "d-m-Y H\hi"));
    }

    /**
     * Tests the renderFloat() methods.
     *
     * @return void
     */
    public function testRenderFloat(): void {

        $obj = $this->dataTablesProvider;

        $this->assertEquals(null, $obj->renderFloat(null));
        $this->assertEquals("1,000.00", $obj->renderFloat(1000));
        $this->assertEquals("1,000.000", $obj->renderFloat(1000, 3));
        $this->assertEquals("1 000,000", $obj->renderFloat(1000, 3, ",", " "));
    }

    /**
     * Tests renderRow()
     *
     * @return void
     */
    public function testRenderRow(): void {

        // Set an Entity mock.
        $entity = $this->getMockBuilder(Employee::class)->getMock();
        $entity->expects($this->any())->method("getId")->willReturn(1);

        $obj = $this->dataTablesProvider;

        $this->assertEquals(["data-id" => 1], $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ATTR, $entity, 0));
        $this->assertNull($obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_CLASS, $entity, 0));
        $this->assertEquals(["pkey" => 1], $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_DATA, $entity, 0));
        $this->assertEquals("test-1", $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ID, $entity, 0));
    }

    /**
     * Tests renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtons(): void {

        $obj = $this->dataTablesProvider;

        $res = implode(" ", [
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt"),
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt"),
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt"),
        ]);
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), "editRoute", "deleteRoute", "showRoute"));
    }

    /**
     * Tests renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithDeleteRoute(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, "deleteRoute"));
    }

    /**
     * Tests renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithEditRoute(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), "editRoute"));
    }

    /**
     * Tests renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithShowRoute(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, null, "showRoute"));
    }

    /**
     * Tests wrapContent()
     *
     * @return void
     */
    public function testWrapContent(): void {

        $obj = $this->dataTablesProvider;

        $this->assertEquals("content", $obj->wrapContent(null, "content", null));
        $this->assertEquals("prefix-content", $obj->wrapContent("prefix-", "content", null));
        $this->assertEquals("prefix-content-suffix", $obj->wrapContent("prefix-", "content", "-suffix"));
        $this->assertEquals("content-suffix", $obj->wrapContent(null, "content", "-suffix"));
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = $this->dataTablesProvider;

        $this->assertInstanceOf(DataTablesProviderInterface::class, $obj);
        $this->assertInstanceOf(ColumnWidthInterface::class, $obj);

        $this->assertSame($this->buttonTwigExtension, $obj->getButtonTwigExtension());
        $this->assertSame($this->router, $obj->getRouter());
        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
