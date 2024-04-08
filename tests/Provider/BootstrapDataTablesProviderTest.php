<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Provider;

use DateTime;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtension;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity\Employee;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\TestBootstrapDataTablesProvider;

/**
 * Bootstrap DataTables provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Provider
 */
class BootstrapDataTablesProviderTest extends AbstractTestCase {

    /**
     * Button Twig extension.
     *
     * @var ButtonTwigExtension|null
     */
    private $buttonTwigExtension;

    /**
     * DataTable provider.
     *
     * @var TestBootstrapDataTablesProvider|null
     */
    private $dataTablesProvider;

    /**
     * Router.
     *
     * @var RouterInterface|null
     */
    private $router;

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

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set the Router mock.
        $this->router = $this->getMockBuilder(RouterInterface::class)->getMock();
        $this->router->expects($this->any())->method("generate")->willReturnCallback(DefaultTestCase::getRouterGenerateFunction());

        // Set a Translator mock.
        $this->translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $this->translator->expects($this->any())->method("trans")->willReturnCallback(DefaultTestCase::getTranslatorTransFunction());

        // Set a Button Twig extension mock.
        $this->buttonTwigExtension = new ButtonTwigExtension($twigEnvironment);

        // Set a DataTables provider mock.
        $this->dataTablesProvider = new TestBootstrapDataTablesProvider($this->translator, $this->router, $this->buttonTwigExtension);
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
     * Test renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtons(): void {

        $exp = implode(" ", [
            file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonShow.html.txt"),
            file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonEdit.html.txt"),
            file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonDelete.html.txt"),
        ]);

        $obj = $this->dataTablesProvider;
        $this->assertEquals($exp, $obj->renderRowButtons(new Employee(), "showRoute", "editRoute", "deleteRoute"));
    }

    /**
     * Test renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithDeleteRoute(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonDelete.html.txt");

        $obj = $this->dataTablesProvider;
        $this->assertEquals($exp, $obj->renderRowButtons(new Employee(), null, null, "deleteRoute"));
    }

    /**
     * Test renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithEditRoute(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonEdit.html.txt");

        $obj = $this->dataTablesProvider;
        $this->assertEquals($exp, $obj->renderRowButtons(new Employee(), null, "editRoute"));
    }

    /**
     * Test renderRowButtons()
     *
     * @return void
     */
    public function testRenderRowButtonsWithShowRoute(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonShow.html.txt");

        $obj = $this->dataTablesProvider;
        $this->assertEquals($exp, $obj->renderRowButtons(new Employee(), "showRoute"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = $this->dataTablesProvider;

        $this->assertInstanceOf(DataTablesProviderInterface::class, $obj);

        $this->assertSame($this->buttonTwigExtension, $obj->getButtonTwigExtension());
        $this->assertSame($this->router, $obj->getRouter());
        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
