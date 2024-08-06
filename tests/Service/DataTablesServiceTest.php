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

namespace WBW\Bundle\DataTablesBundle\Tests\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\RouterInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesCsvExporterException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManagerInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Bundle\DataTablesBundle\Service\DataTablesService;
use WBW\Bundle\DataTablesBundle\Service\DataTablesServiceInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\OfficeDataTablesProvider;

/**
 * DataTables service test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Service
 */
class DataTablesServiceTest extends AbstractTestCase {

    /**
     * DataTables column.
     *
     * @var DataTablesColumnInterface|null
     */
    private $dataTablesColumn;

    /**
     * DataTables CSV exporter.
     *
     * @var DataTablesCsvExporterInterface|null
     */
    private $dataTablesCsvExporter;

    /**
     * DataTables editor.
     *
     * @var DataTablesEditorInterface|null
     */
    private $dataTablesEditor;

    /**
     * DataTables manager.
     *
     * @var DataTablesManagerInterface|null
     */
    private $dataTablesManager;

    /**
     * DataTables provider.
     *
     * @var DataTablesProviderInterface|null
     */
    private $dataTablesProvider;

    /**
     * DataTables repository.
     *
     * @var DataTablesRepositoryInterface|null
     */
    private $dataTablesRepository;

    /**
     * Entity manager.
     *
     * @var EntityManagerInterface|null
     */
    private $entityManager;

    /**
     * Logger.
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Router.
     *
     * @var RouterInterface|null
     */
    private $router;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a DataTables column mock.
        $this->dataTablesColumn = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $this->dataTablesColumn->expects($this->any())->method("getData")->willReturn("test");

        // Set a DataTables CSV exporter mock.
        $this->dataTablesCsvExporter = $this->getMockBuilder(DataTablesCsvExporterInterface::class)->getMock();

        // Set a DataTables editor mock.
        $this->dataTablesEditor = $this->getMockBuilder(DataTablesEditorInterface::class)->getMock();

        // Set a DataTables options mock.
        $dataTablesOptions = $this->getMockBuilder(DataTablesOptionsInterface::class)->getMock();

        // Set a DataTables provider mock.
        $this->dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $this->dataTablesProvider->expects($this->any())->method("getColumns")->willReturn([$this->dataTablesColumn]);
        $this->dataTablesProvider->expects($this->any())->method("getCsvExporter")->willReturn($this->dataTablesCsvExporter);
        $this->dataTablesProvider->expects($this->any())->method("getEditor")->willReturn($this->dataTablesEditor);
        $this->dataTablesProvider->expects($this->any())->method("getEntity")->willReturn("test");
        $this->dataTablesProvider->expects($this->any())->method("getName")->willReturn("test");
        $this->dataTablesProvider->expects($this->any())->method("getOptions")->willReturn($dataTablesOptions);

        // Set a DataTables manager mock.
        $this->dataTablesManager = $this->getMockBuilder(DataTablesManagerInterface::class)->getMock();
        $this->dataTablesManager->expects($this->any())->method("getProvider")->willReturn($this->dataTablesProvider);
        $this->dataTablesManager->expects($this->any())->method("getProviders")->willReturn([$this->dataTablesProvider]);

        // Set a find() callback.
        $findCallback = function($id, $lockMode = null, $lockVersion = null) {

            if (1 !== $id) {
                return null;
            }

            return $this;
        };

        // Set a DataTables manager mock.
        $this->dataTablesRepository = $this->getMockBuilder(DataTablesRepositoryInterface::class)->getMock();
        $this->dataTablesRepository->expects($this->any())->method("find")->willReturnCallback($findCallback);

        // Set an Entity manager mock.
        $this->entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();
        $this->entityManager->expects($this->any())->method("getRepository")->willReturn($this->dataTablesRepository);

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Router mock.
        $this->router = $this->getMockBuilder(RouterInterface::class)->getMock();
        $this->router->expects($this->any())->method("generate")->willReturnCallback(DefaultTestCase::getRouterGenerateFunction());
    }

    /**
     * Test getDataTablesColumn()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesColumn(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        $this->assertSame($this->dataTablesColumn, $obj->getDataTablesColumn($this->dataTablesProvider, "test"));
    }

    /**
     * Test getDataTablesColumn()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesColumnWithBadDataTablesColumnException(): void {

        // Set a DataTables provider mock.
        $dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        try {
            $obj->getDataTablesColumn($dataTablesProvider, "test");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(BadDataTablesColumnException::class, $ex);
            $this->assertEquals('The DataTables column with name "test" does not exist', $ex->getMessage());
        }
    }

    /**
     * Test getDataTablesCsvExporter()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesCsvExporter(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        $this->assertSame($this->dataTablesCsvExporter, $obj->getDataTablesCsvExporter($this->dataTablesProvider));
    }

    /**
     * Test getDataTablesCsvExporter()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesCsvExporterWithBadDataTablesCsvExporterException(): void {

        // Set a DataTables provider mock.
        $dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        try {
            $obj->getDataTablesCsvExporter($dataTablesProvider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(BadDataTablesCsvExporterException::class, $ex);
            $this->assertEquals("The DataTables CSV exporter is null", $ex->getMessage());
        }
    }

    /**
     * Test getDataTablesEditor()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesEditor(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        $this->assertSame($this->dataTablesEditor, $obj->getDataTablesEditor($this->dataTablesProvider));
    }

    /**
     * Test getDataTablesEditor()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesEditorWithBadDataTablesEditorException(): void {

        // Set a DataTables provider mock.
        $dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        try {
            $obj->getDataTablesEditor($dataTablesProvider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(BadDataTablesEditorException::class, $ex);
            $this->assertEquals("The DataTables editor is null", $ex->getMessage());
        }
    }

    /**
     * Test getDataTablesEntityById()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesEntityById(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        $this->assertNotNull($obj->getDataTablesEntityById($this->dataTablesProvider, 1));
    }

    /**
     * Test getDataTablesEntityById()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesEntityByIdWithEntityNotFoundException(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        try {
            $obj->getDataTablesEntityById($this->dataTablesProvider, 0);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(EntityNotFoundException::class, $ex);
        }
    }

    /**
     * Test getDataTablesProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesProvider(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);
        $obj->setDataTablesManager($this->dataTablesManager);

        $this->assertSame($this->dataTablesProvider, $obj->getDataTablesProvider("test"));
    }

    /**
     * Test getDataTablesRepository()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesRepository(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        $this->assertSame($this->dataTablesRepository, $obj->getDataTablesRepository($this->dataTablesProvider));
    }

    /**
     * Test getDataTablesRepository()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesRepositoryWithBadDataTablesRepositoryException(): void {

        // Set a DataTables provider mock.
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();
        $entityManager->expects($this->any())->method("getRepository")->willReturn(null);

        $obj = new DataTablesService($entityManager, $this->logger, $this->router);

        try {
            $obj->getDataTablesRepository($this->dataTablesProvider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(BadDataTablesRepositoryException::class, $ex);
            $this->assertStringContainsString("must implement " . DataTablesRepositoryInterface::class, $ex->getMessage());
        }
    }

    /**
     * Test getDataTablesUrl()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesUrl(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        $this->assertEquals("wbw_datatables_index", $obj->getDataTablesUrl($this->dataTablesProvider));
        $this->assertEquals("url", $obj->getDataTablesUrl(new OfficeDataTablesProvider()));
    }

    /**
     * Test getDataTablesWrapper()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetDataTablesWrapper(): void {

        $obj = new DataTablesService($this->entityManager, $this->logger, $this->router);

        $this->assertInstanceOf(DataTablesWrapperInterface::class, $obj->getDataTablesWrapper($this->dataTablesProvider));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set an Entity manager mock.
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();

        $this->assertEquals("wbw.datatables.service", DataTablesService::SERVICE_NAME);

        $obj = new DataTablesService($entityManager, $logger, $router);

        $this->assertInstanceOf(DataTablesServiceInterface::class, $obj);

        $this->assertNull($obj->getDataTablesManager());
        $this->assertSame($entityManager, $obj->getEntityManager());
        $this->assertSame($logger, $obj->getLogger());
        $this->assertSame($router, $obj->getRouter());
        $this->assertNull($obj->getUser());
    }
}
