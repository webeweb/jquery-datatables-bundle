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
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Employee;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider\TestDataTablesProvider;

/**
 * Abstract DataTables provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
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
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Button Twig extension mock.
        $this->buttonTwigExtension = new ButtonTwigExtension($this->twigEnvironment);

        // Set the Router mock.
        $this->router->expects($this->any())->method("generate")->willReturnCallback(function($name, $parameters = [], $referenceType = RouterInterface::ABSOLUTE_PATH) {
            return $name;
        });
    }

    /**
     * Tests the getCSVExporter() method.
     *
     * @return void
     */
    public function testGetCSVExporter(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertNull($obj->getCSVExporter());
    }

    /**
     * Tests the getEditor() method.
     *
     * @return void
     */
    public function testGetEditor(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertNull($obj->getEditor());
    }

    /**
     * Tests the getMethod() method.
     *
     * @return void
     */
    public function testGetMethod(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertNull($obj->getMethod());
    }

    /**
     * Tests the getOptions() method.
     *
     * @return void
     */
    public function testGetOptions(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = $obj->getOptions();
        $this->assertInstanceOf(DataTablesOptionsInterface::class, $res);

        $this->assertCount(3, $res->getOptions());

        $this->assertEquals([[0, "asc"]], $res->getOption("order"));
        $this->assertTrue($res->getOption("responsive"));
        $this->assertEquals(1000, $res->getOption("searchDelay"));
    }

    /**
     * Tests the renderActionButtonDelete() method.
     *
     * @return void
     */
    public function testRenderActionButtonDelete(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonDelete(new Employee(), "deleteRoute"));
    }

    /**
     * Tests the renderActionButtonDelete() method.
     *
     * @return void
     */
    public function testRenderActionButtonDeleteWithInvalidArgumentException(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        try {

            $obj->renderActionButtonDelete($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests the renderActionButtonDuplicate() method.
     *
     * @return void
     */
    public function testRenderActionButtonDuplicate(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDuplicate.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonDuplicate(new Employee(), "duplicateRoute"));
    }

    /**
     * Tests the renderActionButtonDuplicate() method.
     *
     * @return void
     */
    public function testRenderActionButtonDuplicateWithInvalidArgumentException(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        try {

            $obj->renderActionButtonDuplicate($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests the renderActionButtonEdit() method.
     *
     * @return void
     */
    public function testRenderActionButtonEdit(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonEdit(new Employee(), "editRoute"));
    }

    /**
     * Tests the renderActionButtonEdit() method.
     *
     * @return void
     */
    public function testRenderActionButtonEditWithInvalidArgumentException(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        try {

            $obj->renderActionButtonEdit($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests the renderActionButtonShow() method.
     *
     * @return void
     */
    public function testRenderActionButtonShow(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt");
        $this->assertEquals($res, $obj->renderActionButtonShow(new Employee(), "showRoute"));
    }

    /**
     * Tests the renderActionButtonShow() method.
     *
     * @return void
     */
    public function testRenderActionButtonShowWithInvalidArgumentException(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        try {

            $obj->renderActionButtonShow($this, "route");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Tests the renderButtons() method.
     *
     * @return void
     */
    public function testRenderButtons(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-default btn-xs" title="label.edit" href="editRoute" data-toggle="tooltip" data-placement="top"><i class="fa fa-pen"></i></a> <a class="btn btn-danger btn-xs" title="label.delete" href="wbw_jquery_datatables_delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderButtons(new Employee(), "editRoute"));
    }

    /**
     * Tests the renderDate() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRenderDate(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals("", $obj->renderDate(null));
        $this->assertEquals("14/01/2019", $obj->renderDate(new DateTime("2019-01-14")));
        $this->assertEquals("14-01-2019", $obj->renderDate(new DateTime("2019-01-14"), "d-m-Y"));
    }

    /**
     * Tests the renderDateTime() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRenderDateTime(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals("", $obj->renderDateTime(null));
        $this->assertEquals("14/01/2019 18:15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00")));
        $this->assertEquals("14-01-2019 18h15", $obj->renderDateTime(new DateTime("2019-01-14 18:15:00"), "d-m-Y H\hi"));
    }

    /**
     * Tests the renderFloat() methods.
     *
     * @return void
     */
    public function testRenderFloat(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals("", $obj->renderFloat(null));
        $this->assertEquals("1,000.00", $obj->renderFloat(1000));
        $this->assertEquals("1,000.000", $obj->renderFloat(1000, 3));
        $this->assertEquals("1 000,000", $obj->renderFloat(1000, 3, ",", " "));
    }

    /**
     * Tests the renderPercent() methods.
     *
     * @return void
     */
    public function testRenderPercent(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals("", $obj->renderPercent(null));
        $this->assertEquals("100.00 %", $obj->renderPercent(100));
    }

    /**
     * Tests the renderPrice() methods.
     *
     * @return void
     */
    public function testRenderPrice(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals("", $obj->renderPrice(null));
        $this->assertEquals("1,000.00 €", $obj->renderPrice(1000));
        $this->assertEquals("1,000.00 $", $obj->renderPrice(1000, "$"));
    }

    /**
     * Tests the renderRow() method.
     *
     * @return void
     */
    public function testRenderRow(): void {

        // Set an Entity mock.
        $entity = $this->getMockBuilder(Employee::class)->getMock();
        $entity->expects($this->any())->method("getId")->willReturn(1);

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals(["data-id" => 1], $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ATTR, $entity, 0));
        $this->assertNull($obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_CLASS, $entity, 0));
        $this->assertEquals(["pkey" => 1], $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_DATA, $entity, 0));
        $this->assertEquals("test-1", $obj->renderRow(DataTablesResponseInterface::DATATABLES_ROW_ID, $entity, 0));
    }

    /**
     * Tests the renderRowButtons() method.
     *
     * @return void
     */
    public function testRenderRowButtons(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = implode(" ", [
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt"),
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt"),
            file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt"),
        ]);
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), "editRoute", "deleteRoute", "showRoute"));
    }

    /**
     * Tests the renderRowButtons() method.
     *
     * @return void
     */
    public function testRenderRowButtonsWithDeleteRoute(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonDelete.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, "deleteRoute"));
    }

    /**
     * Tests the renderRowButtons() method.
     *
     * @return void
     */
    public function testRenderRowButtonsWithEditRoute(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonEdit.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), "editRoute"));
    }

    /**
     * Tests the renderRowButtons() method.
     *
     * @return void
     */
    public function testRenderRowButtonsWithShowRoute(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = file_get_contents(__DIR__ . "/AbstractDataTablesProviderTest.testRenderActionButtonShow.html.txt");
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, null, "showRoute"));
    }

    /**
     * Tests the wrapContent() method.
     *
     * @return void
     */
    public function testWrapContent(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals("content", $obj->wrapContent(null, "content", null));
        $this->assertEquals("prefix-content", $obj->wrapContent("prefix-", "content", null));
        $this->assertEquals("prefix-content-suffix", $obj->wrapContent("prefix-", "content", "-suffix"));
        $this->assertEquals("content-suffix", $obj->wrapContent(null, "content", "-suffix"));
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertSame($this->buttonTwigExtension, $obj->getButtonTwigExtension());
        $this->assertSame($this->router, $obj->getRouter());
        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
