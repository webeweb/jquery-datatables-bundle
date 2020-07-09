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
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
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
    protected function setUp() {
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
    public function testGetCSVExporter() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertNull($obj->getCSVExporter());
    }

    /**
     * Tests the getEditor() method.
     *
     * @return void
     */
    public function testGetEditor() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertNull($obj->getEditor());
    }

    /**
     * Tests the getMethod() method.
     *
     * @return void
     */
    public function testGetMethod() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertNull($obj->getMethod());
    }

    /**
     * Tests the getOptions() method.
     *
     * @return void
     */
    public function testGetOptions() {

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
    public function testRenderActionButtonDelete() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-danger btn-xs" title="label.delete" href="route" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderActionButtonDelete(new Employee(), "route"));
    }

    /**
     * Tests the renderActionButtonDelete() method.
     *
     * @return void
     */
    public function testRenderActionButtonDeleteWithInvalidArgumentException() {

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
    public function testRenderActionButtonDuplicate() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-default btn-xs" title="label.duplicate" href="route" data-toggle="tooltip" data-placement="top"><i class="fa fa-copy"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderActionButtonDuplicate(new Employee(), "route"));
    }

    /**
     * Tests the renderActionButtonDuplicate() method.
     *
     * @return void
     */
    public function testRenderActionButtonDuplicateWithInvalidArgumentException() {

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
    public function testRenderActionButtonEdit() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-default btn-xs" title="label.edit" href="route" data-toggle="tooltip" data-placement="top"><i class="fa fa-pen"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderActionButtonEdit(new Employee(), "route"));
    }

    /**
     * Tests the renderActionButtonEdit() method.
     *
     * @return void
     */
    public function testRenderActionButtonEditWithInvalidArgumentException() {

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
    public function testRenderActionButtonShow() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-info btn-xs" title="label.show" href="route" data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderActionButtonShow(new Employee(), "route"));
    }

    /**
     * Tests the renderActionButtonShow() method.
     *
     * @return void
     */
    public function testRenderActionButtonShowWithInvalidArgumentException() {

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
    public function testRenderButtons() {

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
    public function testRenderDate() {

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
    public function testRenderDateTime() {

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
    public function testRenderFloat() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertEquals("", $obj->renderFloat(null));
        $this->assertEquals("1,000.00", $obj->renderFloat(1000));
        $this->assertEquals("1,000.000", $obj->renderFloat(1000, 3));
        $this->assertEquals("1 000,000", $obj->renderFloat(1000, 3, ",", " "));
    }

    /**
     * Tests the renderRow() method.
     *
     * @return void
     */
    public function testRenderRow() {

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
    public function testRenderRowButtons() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-info btn-xs" title="label.show" href="showRoute" data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a> <a class="btn btn-default btn-xs" title="label.edit" href="editRoute" data-toggle="tooltip" data-placement="top"><i class="fa fa-pen"></i></a> <a class="btn btn-danger btn-xs" title="label.delete" href="deleteRoute" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), "editRoute", "deleteRoute", "showRoute"));
    }

    /**
     * Tests the renderRowButtons() method.
     *
     * @return void
     */
    public function testRenderRowButtonsWithDeleteRoute() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-danger btn-xs" title="label.delete" href="deleteRoute" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, "deleteRoute"));
    }

    /**
     * Tests the renderRowButtons() method.
     *
     * @return void
     */
    public function testRenderRowButtonsWithEditRoute() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-default btn-xs" title="label.edit" href="editRoute" data-toggle="tooltip" data-placement="top"><i class="fa fa-pen"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), "editRoute"));
    }

    /**
     * Tests the renderRowButtons() method.
     *
     * @return void
     */
    public function testRenderRowButtonsWithShowRoute() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-info btn-xs" title="label.show" href="showRoute" data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>
EOT;
        $this->assertEquals($res, $obj->renderRowButtons(new Employee(), null, null, "showRoute"));
    }

    /**
     * Tests the wrapContent() method.
     *
     * @return void
     */
    public function testWrapContent() {

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
    public function test__construct() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertSame($this->buttonTwigExtension, $obj->getButtonTwigExtension());
        $this->assertSame($this->router, $obj->getRouter());
        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
