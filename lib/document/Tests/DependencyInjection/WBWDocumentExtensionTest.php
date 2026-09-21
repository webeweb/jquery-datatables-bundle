<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests\DependencyInjection;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtension;
use WBW\Bundle\CommonBundle\EventListener\KernelEventListener;
use WBW\Bundle\CommonBundle\EventListener\KernelEventListenerInterface;
use WBW\Bundle\DocumentBundle\Command\ListStorageProviderCommand;
use WBW\Bundle\DocumentBundle\Controller\DocumentController;
use WBW\Bundle\DocumentBundle\Controller\DropzoneController;
use WBW\Bundle\DocumentBundle\DataTables\Provider\DocumentDataTablesProvider;
use WBW\Bundle\DocumentBundle\DependencyInjection\Configuration;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;
use WBW\Bundle\DocumentBundle\EventListener\DocumentEventListener;
use WBW\Bundle\DocumentBundle\Form\Type\Document\MoveDocumentFormType;
use WBW\Bundle\DocumentBundle\Form\Type\Document\NewDirectoryFormType;
use WBW\Bundle\DocumentBundle\Form\Type\Document\UploadDocumentFormType;
use WBW\Bundle\DocumentBundle\Form\Type\DocumentFormType;
use WBW\Bundle\DocumentBundle\Manager\StorageManager;
use WBW\Bundle\DocumentBundle\Provider\MimeTypeIconProvider;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * Document extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\DependencyInjection
 */
class WBWDocumentExtensionTest extends AbstractTestCase {

    /**
     * Configs.
     *
     * @var array<string,mixed>|null
     */
    private $configs;

    /**
     * Container builder.
     *
     * @var ContainerBuilder|null
     */
    private $containerBuilder;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a configs array mock.
        $this->configs = [
            WBWDocumentExtension::EXTENSION_ALIAS => [],
        ];

        // Set an Entity manager mock.
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set a Kernel event listener mock.
        $kernelEventListener = $this->getMockBuilder(KernelEventListenerInterface::class)->getMock();

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Button Twig extension mock.
        $buttonTwigExtension = new ButtonTwigExtension($twigEnvironment);

        // Set a Container builder mock.
        $this->containerBuilder = new ContainerBuilder();

        $this->containerBuilder->set("doctrine.orm.entity_manager", $entityManager);
        $this->containerBuilder->set("logger", $logger);
        $this->containerBuilder->set("router", $router);
        $this->containerBuilder->set("translator", $translator);

        $this->containerBuilder->set("Psr\\Container\\ContainerInterface", $this->containerBuilder);

        $this->containerBuilder->set(ButtonTwigExtension::SERVICE_NAME, $buttonTwigExtension);
        $this->containerBuilder->set(KernelEventListener::SERVICE_NAME, $kernelEventListener);
    }

    /**
     * Test getAlias()
     *
     * @return void
     */
    public function testGetAlias(): void {

        $obj = new WBWDocumentExtension();

        $this->assertEquals(WBWDocumentExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Test getConfiguration()
     *
     * @return void
     */
    public function testGetConfiguration(): void {

        $obj = new WBWDocumentExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Test load()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWDocumentExtension();

        $obj->load($this->configs, $this->containerBuilder);

        // Commands
        $this->assertInstanceOf(ListStorageProviderCommand::class, $this->containerBuilder->get(ListStorageProviderCommand::SERVICE_NAME));

        // Controllers
        $this->assertInstanceOf(DocumentController::class, $this->containerBuilder->get(DocumentController::SERVICE_NAME));
        $this->assertInstanceOf(DropzoneController::class, $this->containerBuilder->get(DropzoneController::SERVICE_NAME));

        // DataTables providers
        $this->assertInstanceOf(DocumentDataTablesProvider::class, $this->containerBuilder->get(DocumentDataTablesProvider::SERVICE_NAME));

        // Event listeners
        $this->assertInstanceOf(DocumentEventListener::class, $this->containerBuilder->get(DocumentEventListener::SERVICE_NAME));

        // Forms
        $this->assertInstanceOf(DocumentFormType::class, $this->containerBuilder->get(DocumentFormType::SERVICE_NAME));

        $this->assertInstanceOf(MoveDocumentFormType::class, $this->containerBuilder->get(MoveDocumentFormType::SERVICE_NAME));
        $this->assertInstanceOf(NewDirectoryFormType::class, $this->containerBuilder->get(NewDirectoryFormType::SERVICE_NAME));
        $this->assertInstanceOf(UploadDocumentFormType::class, $this->containerBuilder->get(UploadDocumentFormType::SERVICE_NAME));

        // Managers
        $this->assertInstanceOf(StorageManager::class, $this->containerBuilder->get(StorageManager::SERVICE_NAME));

        // Providers
        $this->assertInstanceOf(MimeTypeIconProvider::class, $this->containerBuilder->get(MimeTypeIconProvider::SERVICE_NAME));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_document", WBWDocumentExtension::EXTENSION_ALIAS);
    }
}
