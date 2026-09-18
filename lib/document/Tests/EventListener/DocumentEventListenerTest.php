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

namespace WBW\Bundle\DocumentBundle\Tests\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\DocumentBundle\Event\DocumentEvent;
use WBW\Bundle\DocumentBundle\EventListener\DocumentEventListener;
use WBW\Bundle\DocumentBundle\Manager\StorageManager;
use WBW\Bundle\DocumentBundle\Manager\StorageManagerInterface;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\StorageProviderInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\TestFixtures;

/**
 * Document event listener test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\EventListener
 */
class DocumentEventListenerTest extends AbstractTestCase {

    /**
     * Directory.
     *
     * @var DocumentInterface|null
     */
    private $directory;

    /**
     * Directory event.
     *
     * @var DocumentEvent|null
     */
    private $directoryEvent;

    /**
     * Document.
     *
     * @var DocumentInterface|null
     */
    private $document;

    /**
     * Document event.
     *
     * @var DocumentEvent|null
     */
    private $documentEvent;

    /**
     * Entity manager.
     *
     * @var EntityManagerInterface|null
     */
    private $entityManager;

    /**
     * Storage manager.
     *
     * @var StorageManager|null
     */
    private $storageManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Directory mock.
        $this->directory = TestFixtures::getDirectory();

        // Set a Document mock.
        $this->document = TestFixtures::getDocument();

        // Set a Directory event mock.
        $this->directoryEvent = new DocumentEvent("", $this->directory);

        // Set a Document event mock.
        $this->documentEvent = new DocumentEvent("", $this->document);

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set an Entity manager mock.
        $this->entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set a Storage manager mock.
        $this->storageManager = $this->getMockBuilder(StorageManagerInterface::class)->getMock();
    }

    /**
     * Test onDeleteDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeleteDocument(): void {

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $res = $obj->onDeleteDocument($this->documentEvent);
        $this->assertSame($res, $this->documentEvent);
    }

    /**
     * Test onDeleteDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeleteDocumentWithDirectory(): void {

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $res = $obj->onDeleteDocument($this->directoryEvent);
        $this->assertSame($res, $this->directoryEvent);
    }

    /**
     * Test onDownloadDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDownloadDocument(): void {

        // Set a Storage provider mock.
        $storageProvider = $this->getMockBuilder(StorageProviderInterface::class)->getMock();
        $storageProvider->expects($this->any())->method("downloadDocument")->willReturn(new Response());

        $this->storageManager->addProvider($storageProvider);

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $res = $obj->onDownloadDocument($this->documentEvent);
        $this->assertSame($res, $this->documentEvent);
    }

    /**
     * Test onDownloadDirectory()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDownloadDocumentWithDirectory(): void {

        // Set a Storage provider mock.
        $storageProvider = $this->getMockBuilder(StorageProviderInterface::class)->getMock();
        $storageProvider->expects($this->any())->method("downloadDirectory")->willReturn(new Response());

        $this->storageManager->addProvider($storageProvider);

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $res = $obj->onDownloadDocument($this->directoryEvent);
        $this->assertSame($res, $this->directoryEvent);
    }

    /**
     * Test onMoveDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnMoveDocument(): void {

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $res = $obj->onMoveDocument($this->documentEvent);
        $this->assertSame($res, $this->documentEvent);
    }

    /**
     * Test onNewDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnNewDocument(): void {

        // Set the Document mock.
        $this->document->setParent($this->directory);

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $res = $obj->onNewDocument($this->documentEvent);
        $this->assertSame($res, $this->documentEvent);
    }

    /**
     * Test onNewDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnNewDocumentWithDirectory(): void {

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $res = $obj->onNewDocument($this->directoryEvent);
        $this->assertSame($res, $this->directoryEvent);
    }

    /**
     * Test __construct()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function test__construct(): void {

        $this->assertSame("wbw.document.event_listener.document", DocumentEventListener::SERVICE_NAME);

        $obj = new DocumentEventListener($this->entityManager, $this->storageManager);

        $this->assertSame($this->entityManager, $obj->getEntityManager());
        $this->assertSame($this->storageManager, $obj->getStorageManager());
    }
}
