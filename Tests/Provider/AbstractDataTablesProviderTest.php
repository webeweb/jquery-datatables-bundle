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
use InvalidArgumentException;
use Throwable;
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
     * DataTable provider.
     *
     * @var TestDataTablesProvider
     */
    private $dataTablesProvider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a generate() callback.
        $generate = TestCaseHelper::getRouterGenerateFunction();

        // Set the Router mock.
        $this->router->expects($this->any())->method("generate")->willReturnCallback($generate);

        // Set a Button Twig extension mock.
        $this->buttonTwigExtension = new ButtonTwigExtension($this->twigEnvironment);

        // Set a DataTables provider mock.
        $this->dataTablesProvider = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);
    }

    /**
     * Test getCSVExporter()
     *
     * @return void
     */
    public function testGetCSVExporter(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->getCSVExporter());
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

        $this->assertCount(3, $res->getOptions());

        $this->assertEquals([[0, "asc"]], $res->getOption("order"));
        $this->assertTrue($res->getOption("responsive"));
        $this->assertEquals(1000, $res->getOption("searchDelay"));
    }

    /**
     * Test renderActionButtonComment()
     *
     * @return void
     */
    public function testRenderActionButtonCommentWithComment(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonCommentWithComment.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonComment(new Employee(), "commentRoute", "comment"));
    }

    /**
     * Test renderActionButtonComment()
     *
     * @return void
     */
    public function testRenderActionButtonCommentWithoutComment(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonCommentWithoutComment.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonComment(new Employee(), "commentRoute", null));
    }

    /**
     * Test renderActionButtonDelete()
     *
     * @return void
     */
    public function testRenderActionButtonDelete(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonDelete(new Employee(), "deleteRoute"));
    }

    /**
     * Test renderActionButtonDuplicate()
     *
     * @return void
     */
    public function testRenderActionButtonDuplicate(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDuplicate.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonDuplicate(new Employee(), "duplicateRoute"));
    }

    /**
     * Test renderActionButtonEdit()
     *
     * @return void
     */
    public function testRenderActionButtonEdit(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonEdit(new Employee(), "editRoute"));
    }

    /**
     * Test renderActionButtonNew()
     *
     * @return void
     */
    public function testRenderActionButtonNew(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonNew.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonNew(new Employee(), "newRoute"));
    }

    /**
     * Test renderActionButtonNew()
     *
     * @return void
     */
    public function testRenderActionButtonNewWithNullEntity(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonNew.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonNew(null, "newRoute"));
    }

    /**
     * Test renderActionButtonPdf()
     *
     * @return void
     */
    public function testRenderActionButtonPdf(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonPdf.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonPdf(new Employee(), "pdfRoute"));
    }

    /**
     * Test renderActionButtonShow()
     *
     * @return void
     */
    public function testRenderActionButtonShow(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonShow(new Employee(), "showRoute"));
    }

    /**
     * Test renderActionButtonSwitch()
     *
     * @return void
     */
    public function testRenderActionButtonSwitchWithFalse(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonSwitchWithFalse.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonSwitch(new Employee(), "switchRoute", false));
    }

    /**
     * Test renderActionButtonSwitch()
     *
     * @return void
     */
    public function testRenderActionButtonSwitchWithTrue(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonSwitchWithTrue.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonSwitch(new Employee(), "switchRoute", true));
    }

    /**
     * Test renderActionButton()
     *
     * @return void
     */
    public function testRenderActionButtonWithInvalidArgumentException(): void {

        $obj = $this->dataTablesProvider;

        try {

            $obj->renderActionButtonDelete($this, "route");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Test renderButtons()
     *
     * @return void
     */
    public function testRenderButtons(): void {

        $obj = $this->dataTablesProvider;

        $res = implode(" ", [
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt"),
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt"),
        ]);

        $res = str_replace("deleteRoute", "wbw_jquery_datatables_delete", $res);
        $this->assertEquals($res, $obj->renderButtons(new Employee(), "editRoute"));
    }

    /**
     * Test renderDate()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRenderDate(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->renderDate(null));
        $this->assertEquals("14/01/2019", $obj->renderDate(new DateTime("2019-01-14")));
        $this->assertEquals("14-01-2019", $obj->renderDate(new DateTime("2019-01-14"), "d-m-Y"));
    }

    /**
     * Test renderDateTime()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRenderDateTime(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->renderDateTime(null));
        $this->assertEquals("14/01/2019 18:15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00")));
        $this->assertEquals("14-01-2019 18h15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00"), "d-m-Y H\hi"));
    }

    /**
     * Test the renderFloat() methods.
     *
     * @return void
     */
    public function testRenderFloat(): void {

        $obj = $this->dataTablesProvider;

        $this->assertNull($obj->renderFloat(null));
        $this->assertEquals("1,000.00", $obj->renderFloat(1000));
        $this->assertEquals("1,000.000", $obj->renderFloat(1000, 3));
        $this->assertEquals("1 000,000", $obj->renderFloat(1000, 3, ",", " "));
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

        $this->assertEquals(["data-id" => 1], $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ATTR, $entity, 0));
        $this->assertNull($obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_CLASS, $entity, 0));
        $this->assertEquals(["pkey" => 1], $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_DATA, $entity, 0));
        $this->assertEquals("test-1", $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ID, $entity, 0));
    }

    /**
     * Test renderRowButtons()
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
     * Test renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithDeleteRoute(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, "deleteRoute"));
    }

    /**
     * Test renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithEditRoute(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), "editRoute"));
    }

    /**
     * Test renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithShowRoute(): void {

        $obj = $this->dataTablesProvider;

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, null, "showRoute"));
    }

    /**
     * Test wrapContent()
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
     * Test __construct()
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
