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
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptionsInterface;
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
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a Button Twig extension mock.
        $this->buttonTwigExtension = new ButtonTwigExtension($this->twigEnvironment);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $this->assertSame($this->buttonTwigExtension, $obj->getButtonTwigExtension());
        $this->assertSame($this->router, $obj->getRouter());
        $this->assertSame($this->translator, $obj->getTranslator());
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

        $this->assertCount(2, $res->getOptions());

        $this->assertTrue($res->hasOption("responsive"));
        $this->assertTrue($res->getOption("responsive"));

        $this->assertTrue($res->hasOption("searchDelay"));
        $this->assertEquals(1000, $res->getOption("searchDelay"));
    }

    /**
     * Tests the renderButtons() method.
     *
     * @return void
     */
    public function testRenderButtons() {

        // Set the Router mock.
        $this->router->expects($this->any())->method("generate")->willReturnCallback(function($name, $parameters = [], $referenceType = RouterInterface::ABSOLUTE_PATH) {
            return $name;
        });

        $obj = new TestDataTablesProvider($this->router, $this->translator, $this->buttonTwigExtension);

        $res = <<< EOT
<a class="btn btn-default btn-xs" title="label.edit" href="editRoute" data-toggle="tooltip" data-placement="top"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> <a class="btn btn-danger btn-xs" title="label.delete" href="deleteRoute" data-toggle="tooltip" data-placement="top"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
EOT;
        $this->assertEquals($res, $obj->renderButtons(new Employee(), "editRoute", "deleteRoute"));
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
}
