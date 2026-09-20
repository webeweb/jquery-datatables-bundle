<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests\DataTables\Provider;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtension;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DocumentBundle\DataTables\Provider\DocumentDataTablesProvider;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\MimeTypeIconProvider;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * Document DataTables provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\DataTables\Provider
 */
class DocumentDataTablesProviderTest extends AbstractTestCase {

    /**
     * Button Twig extension.
     *
     * @var ButtonTwigExtension|null
     */
    private $buttonTwigExtension;

    /**
     * Document DataTables provider.
     *
     * @var DocumentDataTablesProvider|null
     */
    private $documentDataTablesProvider;

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

        // Set a Document DataTables provider.
        $this->documentDataTablesProvider = new DocumentDataTablesProvider($this->translator, $this->router, $this->buttonTwigExtension);
        $this->documentDataTablesProvider->setMimeTypeIconProvider(new MimeTypeIconProvider());
    }

    /**
     * Test getColumns()
     *
     * @return void
     */
    public function testGetColumns(): void {

        $obj = $this->documentDataTablesProvider;

        $res = $obj->getColumns();
        $this->assertCount(5, $res);

        $this->assertEquals("name", $res[0]->getData());
        $this->assertEquals("label.name", $res[0]->getName());

        $this->assertEquals("size", $res[1]->getData());
        $this->assertEquals("label.size", $res[1]->getName());
        $this->assertEquals("60px", $res[1]->getWidth());

        $this->assertEquals("updatedAt", $res[2]->getData());
        $this->assertEquals("label.updated_at", $res[2]->getName());
        $this->assertEquals(DataTablesColumnInterface::DATATABLES_WIDTH_M, $res[2]->getWidth());

        $this->assertEquals("type", $res[3]->getData());
        $this->assertEquals("label.type", $res[3]->getName());
        $this->assertEquals(DataTablesColumnInterface::DATATABLES_WIDTH_L, $res[3]->getWidth());
        $this->assertFalse($res[3]->getSearchable());

        $this->assertEquals("actions", $res[4]->getData());
        $this->assertEquals("label.actions", $res[4]->getName());
        $this->assertEquals(DataTablesColumnInterface::DATATABLES_WIDTH_L, $res[4]->getWidth());
        $this->assertFalse($res[4]->getOrderable());
        $this->assertFalse($res[4]->getSearchable());
    }

    /**
     * Test getEntity()
     *
     * @return void
     */
    public function testGetEntity(): void {

        $obj = $this->documentDataTablesProvider;

        $this->assertEquals(Document::class, $obj->getEntity());
    }

    /**
     * Test getName()
     *
     * @return void
     */
    public function testGetName(): void {

        $obj = $this->documentDataTablesProvider;

        $this->assertEquals(DocumentDataTablesProvider::DATATABLES_NAME, $obj->getName());
    }

    /**
     * Test getOptions()
     *
     * @return void
     */
    public function testGetOptions(): void {

        $obj = $this->documentDataTablesProvider;

        $res = $obj->getOptions();
        $this->assertFalse($res->getOption("bPaginate"));
        $this->assertEquals([[3, "desc"], [0, "asc"]], $res->getOption("order"));
    }

    /**
     * Test getPrefix()
     *
     * @return void
     */
    public function testGetPrefix(): void {

        $obj = $this->documentDataTablesProvider;

        $this->assertEquals("d", $obj->getPrefix());
    }

    /**
     * Test getUrl()
     *
     * @return void
     */
    public function testGetUrl(): void {

        $obj = $this->documentDataTablesProvider;

        $this->assertEquals("wbw_document_document_index", $obj->getUrl());
    }

    /**
     * Test getView()
     *
     * @return void
     */
    public function testGetView(): void {

        $obj = $this->documentDataTablesProvider;

        $this->assertEquals("@WBWDocument/document/index.html.twig", $obj->getView());
    }

    /**
     * Test onKernelRequest()
     *
     * @return void
     */
    public function testOnKernelRequest(): void {

        // Set a Request mock.
        $request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        // Set a Request event mock.
        $requestEvent = $this->getMockBuilder(RequestEvent::class)->disableOriginalConstructor()->getMock();
        $requestEvent->expects($this->any())->method("getRequest")->willReturn($request);

        $obj = $this->documentDataTablesProvider;

        $obj->onKernelRequest($requestEvent);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test renderColumn()
     *
     * @return void
     * @throws Throwable Throws an exception if an errors occurs.
     */
    public function testRenderColumn(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setExtension("php");
        $document->setMimeType("application/octet-stream");
        $document->setName("document");
        $document->setSize(1024);
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $obj = $this->documentDataTablesProvider;

        $btn = [
            '<a class="btn btn-default btn-xs" title="label.edit" href="wbw_document_document_edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pen"></i></a>',
            '<a class="btn btn-danger btn-xs" title="label.delete" href="wbw_document_document_delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>',
            '<a class="btn btn-info btn-xs" title="label.download" href="wbw_document_document_download" data-toggle="tooltip" data-placement="top"><i class="fa fa-download"></i></a>',
            '<a class="btn btn-default btn-xs" title="label.move" href="wbw_document_document_move" data-toggle="tooltip" data-placement="top"><i class="fa fa-arrows-alt"></i></a>',
        ];

        $col = $obj->getColumns();

        $this->assertEquals('<span class="pull-left"><img src="/bundles/wbwcommon/img/mimetype/default/application-octet-stream.svg" height="32px"/></span>document.php', $obj->renderColumn($col[0], $document));
        $this->assertRegExp('/^<span class="pull-right">1[\.,]00 Kio<\/span>$/', $obj->renderColumn($col[1], $document));
        $this->assertRegExp("/^[0-9\- :]{16}$/", $obj->renderColumn($col[2], $document));
        $this->assertEquals("application/octet-stream", $obj->renderColumn($col[3], $document));
        $this->assertEquals(implode(" ", $btn), $obj->renderColumn($col[4], $document));
    }

    /**
     * Test renderColumn()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRenderColumnWithDirectory(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setName("document");
        $document->setSize(1024);
        $document->setType(DocumentInterface::TYPE_DIRECTORY);
        $document->setUpdatedAt(new DateTime());

        $obj = $this->documentDataTablesProvider;

        $btn = [
            '<a class="btn btn-default btn-xs" title="label.edit" href="wbw_document_document_edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pen"></i></a>',
            '<a class="btn btn-danger btn-xs" title="label.delete" href="wbw_document_document_delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>',
            '<a class="btn btn-info btn-xs" title="label.download" href="wbw_document_document_download" data-toggle="tooltip" data-placement="top"><i class="fa fa-download"></i></a>',
            '<a class="btn btn-default btn-xs" title="label.move" href="wbw_document_document_move" data-toggle="tooltip" data-placement="top"><i class="fa fa-arrows-alt"></i></a>',
            '<a class="btn btn-primary btn-xs" title="label.index" href="wbw_document_document_index" data-toggle="tooltip" data-placement="top"><i class="fa fa-folder-open"></i></a>',
            '<a class="btn btn-success btn-xs" title="label.upload" href="wbw_document_dropzone_upload" data-toggle="tooltip" data-placement="top"><i class="fa fa-upload"></i></a>',
        ];

        $col = $obj->getColumns();

        $this->assertEquals('<span class="pull-left"><img src="/bundles/wbwcommon/img/mimetype/default/folder.svg" height="32px"/></span>document<br/><span class="font-italic">label.items_count</span>', $obj->renderColumn($col[0], $document));
        $this->assertRegExp('/^<span class="pull-right">1[\.,]00 Kio<\/span>$/', $obj->renderColumn($col[1], $document));
        $this->assertRegExp("/^[0-9\- :]{16}$/", $obj->renderColumn($col[2], $document));
        $this->assertEquals("label.directory", $obj->renderColumn($col[3], $document));
        $this->assertEquals(implode(" ", $btn), $obj->renderColumn($col[4], $document));
    }

    /**
     * Test renderRow()
     *
     * @return void
     */
    public function testRenderRow(): void {

        $obj = $this->documentDataTablesProvider;

        $this->assertNull($obj->renderRow("", null, 0));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw-document-document", DocumentDataTablesProvider::DATATABLES_NAME);
        $this->assertEquals("wbw.document.datatables.provider.document", DocumentDataTablesProvider::SERVICE_NAME);

        $obj = new DocumentDataTablesProvider($this->translator, $this->router, $this->buttonTwigExtension);

        $this->assertSame($this->buttonTwigExtension, $obj->getButtonTwigExtension());
        $this->assertSame($this->router, $obj->getRouter());
        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
