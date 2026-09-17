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

namespace WBW\Bundle\DocumentBundle\Tests\Provider\Storage;

use FilesystemIterator;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use SplFileInfo;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\Storage\FilesystemStorageProvider;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\Model\TestDocument;

/**
 * Filesystem storage provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Provider\Storage
 */
class FilesystemStorageProviderTest extends AbstractTestCase {

    /**
     * Logger
     *
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Directory.
     *
     * @var string|null
     */
    private $storageProviderDirectory;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Logger mock.
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a storage provider directory mock.
        $this->storageProviderDirectory = realpath(__DIR__ . "/../../../../../var/data");

        // Clean up.
        $iterator = new FilesystemIterator($this->storageProviderDirectory);

        /** @var SplFileInfo $current */
        foreach ($iterator as $current) {
            if (".gitkeep" === $current->getFilename()) {
                continue;
            }
            (new Filesystem())->remove($current->getPathname());
        }
    }

    /**
     * Test deleteDirectory()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDeleteDirectory(): void {

        // Set a filename.
        $filename = implode(DIRECTORY_SEPARATOR, [$this->storageProviderDirectory, "1"]);

        // Create the filename.
        (new Filesystem())->mkdir($filename);
        $this->assertFileExists($filename);

        // Set a Document mock.
        $directory = new TestDocument();
        $directory->setId(1);
        $directory->setType(DocumentInterface::TYPE_DIRECTORY);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $obj->deleteDirectory($directory);
        $this->assertFileNotExists($filename);
    }

    /**
     * Test deleteDirectory()
     *
     * @return void
     */
    public function testDeleteDirectoryWithDocument(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        try {
            $obj->deleteDirectory($document);
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

        // Set a filename.
        $filename = implode(DIRECTORY_SEPARATOR, [$this->storageProviderDirectory, "1"]);

        // Create the filename.
        (new Filesystem())->touch($filename);
        $this->assertFileExists($filename);

        // Set a Document mock.
        $document = new TestDocument();
        $document->setId(1);
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $obj->deleteDocument($document);
        $this->assertFileNotExists($filename);
    }

    /**
     * Test deleteDocument()
     *
     * @return void
     */
    public function testDeleteDocumentWithDirectory(): void {

        // Set a Document mock.
        $directory = new Document();
        $directory->setType(DocumentInterface::TYPE_DIRECTORY);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        try {
            $obj->deleteDocument($directory);
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
    public function testDownloadDirectory(): void {

        // Set a Document mock.
        $directory = new Document();
        $directory->setName("directory");
        $directory->setType(DocumentInterface::TYPE_DIRECTORY);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $res = $obj->downloadDirectory($directory);
        $this->assertInstanceOf(StreamedResponse::class, $res);

        $this->assertContains("content-disposition", $res->headers->keys());
        $this->assertContains("content-type", $res->headers->keys());

        $this->assertRegExp('/^attachement; filename="[0-9.\-]{16}_directory\.zip"$/', $res->headers->get("content-disposition"));
        $this->assertEquals("application/zip", $res->headers->get("content-type"));
        $this->assertEquals(200, $res->getStatusCode());
    }

    /**
     * Test downloadDocument()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testDownloadDocument(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setExtension("php");
        $document->setMimeType("text/php");
        $document->setName("document");

        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $res = $obj->downloadDocument($document);
        $this->assertInstanceOf(StreamedResponse::class, $res);

        $this->assertContains("content-disposition", $res->headers->keys());
        $this->assertContains("content-type", $res->headers->keys());

        $this->assertRegExp('/^attachement; filename="[0-9.\-]{16}_document\.php"$/', $res->headers->get("content-disposition"));
        $this->assertEquals("text/php", $res->headers->get("content-type"));
        $this->assertEquals(200, $res->getStatusCode());
    }

    /**
     * Test moveDocument()
     *
     * @return void
     */
    public function testMoveDocument(): void {

        // Set the filenames.
        $filename1 = implode(DIRECTORY_SEPARATOR, [$this->storageProviderDirectory, "1"]);
        $filename2 = implode(DIRECTORY_SEPARATOR, [$this->storageProviderDirectory, "2"]);

        // Create the filenames.
        (new Filesystem())->mkdir($filename1);
        (new Filesystem())->touch($filename2);
        $this->assertFileExists($filename1);
        $this->assertFileExists($filename2);

        // Set a Document mock.
        $directory = new TestDocument();
        $directory->setId(1);
        $directory->setType(DocumentInterface::TYPE_DIRECTORY);

        $document = new TestDocument();
        $document->setId(2);
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $document->saveParent();
        $document->setParent($directory);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $obj->moveDocument($document);
        $this->assertFileNotExists($filename2);
        $this->assertFileExists($filename1);
        $this->assertFileExists(implode(DIRECTORY_SEPARATOR, [$filename1, "2"]));
    }

    /**
     * Test newDirectory()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNewDirectory(): void {

        // Set a filename.
        $filename = implode(DIRECTORY_SEPARATOR, [$this->storageProviderDirectory, "1"]);

        // Set a Document mock.
        $directory = new TestDocument();
        $directory->setId(1);
        $directory->setType(DocumentInterface::TYPE_DIRECTORY);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $obj->newDirectory($directory);
        $this->assertFileExists($filename);
    }

    /**
     * Test newDirectory()
     *
     * @return void
     */
    public function testNewDirectoryWithDocument(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        try {
            $obj->newDirectory($document);
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
    public function testUploadDocument(): void {

        // Set a filename.
        $filename = implode(DIRECTORY_SEPARATOR, [$this->storageProviderDirectory, "1"]);

        // Set an uploaded file mock.
        $uploadedFile = new UploadedFile(__DIR__ . "/../../Fixtures/Model/TestDocument.php.bak", "TestDocument.php", "application/x-php", 604, true);

        // Set a Document mock.
        $document = new TestDocument();
        $document->setId(1);
        $document->setType(DocumentInterface::TYPE_DOCUMENT);
        $document->setUploadedFile($uploadedFile);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $obj->uploadDocument($document);
        $this->assertFileExists($filename);
    }

    /**
     * Test uploadDocument()
     *
     * @return void
     */
    public function testUploadDocumentWithDirectory(): void {

        // Set a Document mock.
        $directory = new Document();
        $directory->setType(DocumentInterface::TYPE_DIRECTORY);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        try {
            $obj->uploadDocument($directory);
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

        $this->assertEquals("wbw.edm.provider.storage.filesystem", FilesystemStorageProvider::SERVICE_NAME);

        $obj = new FilesystemStorageProvider($this->logger, $this->storageProviderDirectory);

        $this->assertEquals($this->storageProviderDirectory, $obj->getDirectory());
        $this->assertSame($this->logger, $obj->getLogger());
    }
}
