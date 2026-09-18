<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests\Manager;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\DocumentBundle\Manager\StorageManager;
use WBW\Bundle\DocumentBundle\Manager\StorageManagerInterface;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\StorageProviderInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\TestFixtures;

/**
 * Storage manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Manager
 */
class StorageManagerTest extends AbstractTestCase {

    /**
     * Directory.
     *
     * @var DocumentInterface|null
     */
    private $directory;

    /**
     * Document.
     *
     * @var DocumentInterface|null
     */
    private $document;

    /**
     * Logger
     *
     * @var LoggerInterface|null
     */
    private $logger;

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

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Storage manager mock.
        $this->storageManager = new StorageManager($this->logger);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        // Set a Storage provider mock.
        $storageProvider = $this->getMockBuilder(StorageProviderInterface::class)->getMock();

        $obj = new StorageManager($this->logger);

        $obj->addProvider($storageProvider);
        $this->assertSame($storageProvider, $obj->getProviders()[0]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     */
    public function testAddProviderWithInvalidArgumentException(): void {

        // Set a Provider mock.
        $provider = $this->getMockBuilder(ProviderInterface::class)->getMock();

        $obj = new StorageManager($this->logger);

        try {
            $obj->addProvider($provider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements " . StorageProviderInterface::class, $ex->getMessage());
        }
    }

    /**
     * Test deleteDirectory()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDeleteDirectory(): void {

        $obj = $this->storageManager;

        $obj->deleteDirectory($this->directory);
        $this->assertNull(null);
    }

    /**
     * Test deleteDirectory()
     *
     * @return void
     */
    public function testDeleteDirectoryWithInvalidArgumentException(): void {

        $obj = $this->storageManager;

        try {
            $obj->deleteDirectory($this->document);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
        }
    }

    /**
     * Test deleteDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDeleteDocument(): void {

        $obj = $this->storageManager;

        $obj->deleteDocument($this->document);
        $this->assertNull(null);
    }

    /**
     * Test deleteDocument()
     *
     * @return void
     */
    public function testDeleteDocumentWithInvalidArgumentException(): void {

        $obj = $this->storageManager;

        try {
            $obj->deleteDocument($this->directory);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
        }
    }

    /**
     * Test the downloadedDirectory().
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDownloadDirectory(): void {

        $obj = $this->storageManager;

        $obj->downloadDirectory($this->directory);
        $this->assertNull(null);
    }

    /**
     * Test the downloadedDirectory().
     *
     * @return void
     */
    public function testDownloadDirectoryWithInvalidArgumentException(): void {

        $obj = $this->storageManager;

        try {
            $obj->downloadDirectory($this->document);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
        }
    }

    /**
     * Test the downloadedDirectory().
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDownloadDirectoryWithoutProvider(): void {

        $obj = new StorageManager($this->logger);

        $obj->downloadDirectory($this->directory);
        $this->assertNull(null);
    }

    /**
     * Test downloadDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDownloadDocument(): void {

        $obj = $this->storageManager;

        $obj->downloadDocument($this->document);
        $this->assertNull(null);
    }

    /**
     * Test the downloadedDocument().
     *
     * @return void
     */
    public function testDownloadDocumentWithInvalidArgumentException(): void {

        $obj = $this->storageManager;

        try {
            $obj->downloadDocument($this->directory);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
        }
    }

    /**
     * Test downloadDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDownloadDocumentWithoutProvider(): void {

        $obj = new StorageManager($this->logger);

        $obj->downloadDocument($this->document);
        $this->assertNull(null);
    }

    /**
     * Test moveDocument()
     *
     * @return void
     */
    public function testMoveDocument(): void {

        $obj = $this->storageManager;

        $obj->moveDocument($this->document);
        $this->assertNull(null);
    }

    /**
     * Test newDirectory()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNewDirectory(): void {

        $obj = $this->storageManager;

        $obj->newDirectory($this->directory);
        $this->assertNull(null);
    }

    /**
     * Test newDirectory()
     *
     * @return void
     */
    public function testNewDirectoryWithInvalidArgumentException(): void {

        $obj = $this->storageManager;

        try {
            $obj->newDirectory($this->document);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
        }
    }

    /**
     * Test uploadDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testUploadedDocument(): void {

        $obj = $this->storageManager;

        $obj->uploadDocument($this->document);
        $this->assertNull(null);
    }

    /**
     * Test uploadDocument()
     *
     * @return void
     */
    public function testUploadedDocumentWithInvalidArgumentException(): void {

        $obj = $this->storageManager;

        try {
            $obj->uploadDocument($this->directory);
        } catch (Throwable $ex) {
            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
        }
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertSame("wbw.document.manager.storage", StorageManager::SERVICE_NAME);

        $obj = new StorageManager($this->logger);

        $this->assertInstanceOf(StorageManagerInterface::class, $obj);
    }
}
