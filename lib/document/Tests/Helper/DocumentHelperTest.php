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

namespace WBW\Bundle\DocumentBundle\Tests\Helper;

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Helper\DocumentHelper;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\TestFixtures;

/**
 * Document helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Helper
 */
class DocumentHelperTest extends AbstractTestCase {

    /**
     * Test decreaseSize()
     *
     * @return void.
     */
    public function testDecreaseSize(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setParent(new Document());
        $document->getParent()->setParent(new Document());

        DocumentHelper::decreaseSize(1, $document->getParent());
        $this->assertEquals(-1, $document->getParent()->getSize());
        $this->assertEquals(-1, $document->getParent()->getParent()->getSize());
    }

    /**
     * Test flattenChildren()
     *
     * @return void
     */
    public function testFlattenChildren(): void {

        $arg = TestFixtures::getDocuments();

        $res = DocumentHelper::flattenChildren($arg[0]);
        $this->assertCount(9, $res);

        $this->assertSame($arg[1], $res[0]);
        $this->assertSame($arg[2], $res[1]);
        $this->assertSame($arg[3], $res[2]);
        $this->assertSame($arg[4], $res[3]);
        $this->assertSame($arg[5], $res[4]);
        $this->assertSame($arg[6], $res[5]);
        $this->assertSame($arg[7], $res[6]);
        $this->assertSame($arg[8], $res[7]);
        $this->assertSame($arg[9], $res[8]);
    }

    /**
     * Test getFilename()
     *
     * @return void
     */
    public function testGetFilenameWithDirectory(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setName("directory");
        $document->setType(DocumentInterface::TYPE_DIRECTORY);

        $this->assertEquals("directory", DocumentHelper::getFilename($document));
    }

    /**
     * Test getFilename()
     *
     * @return void
     */
    public function testGetFilenameWithDocument(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setName("filename");
        $document->setExtension("ext");
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $this->assertEquals("filename.ext", DocumentHelper::getFilename($document));
    }

    /**
     * Test getPathname()
     *
     * @return void
     */
    public function testGetPathnameWithDirectory(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setName("directory");
        $document->setType(DocumentInterface::TYPE_DIRECTORY);

        $this->assertEquals("directory", DocumentHelper::getPathname($document));
    }

    /**
     * Test getPathname()
     *
     * @return void
     */
    public function testGetPathnameWithDocument(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setName("filename");
        $document->setExtension("ext");
        $document->setType(DocumentInterface::TYPE_DOCUMENT);
        $document->setParent(new Document());
        $document->getParent()->setName("directory")->setType(DocumentInterface::TYPE_DIRECTORY);

        $this->assertEquals("directory/filename.ext", DocumentHelper::getPathname($document));
    }

    /**
     * Test getPaths()
     *
     * @return void
     */
    public function testGetPaths(): void {

        // Set a Document mock.
        $document = new Document();
        $document->addChild(new Document());

        $this->assertEquals([$document], DocumentHelper::getPaths($document));
        $this->assertEquals([$document, $document->getChildren()[0]], DocumentHelper::getPaths($document->getChildren()[0]));
    }

    /**
     * Test increaseSize()
     *
     * @return void.
     */
    public function testIncreaseSize(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setParent(new Document());
        $document->getParent()->setParent(new Document());

        DocumentHelper::increaseSize(1, $document->getParent());
        $this->assertEquals(1, $document->getParent()->getSize());
        $this->assertEquals(1, $document->getParent()->getParent()->getSize());
    }

    /**
     * Test isDirectory()
     *
     * @return void
     */
    public function testIsDirectory(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DIRECTORY);

        $this->assertTrue(DocumentHelper::isDirectory($document));
    }

    /**
     * Test isDirectory()
     *
     * @return void
     */
    public function testIsDirectoryWithInvalidArgumentException(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        try {
            DocumentHelper::isDirectory($document);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The document must be of 'directory' type", $ex->getMessage());
        }
    }

    /**
     * Test isDocument()
     *
     * @return void
     */
    public function testIsDocument(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $this->assertTrue(DocumentHelper::isDocument($document));
    }

    /**
     * Test isDocument()
     *
     * @return void
     */
    public function testIsDocumentWithInvalidArgumentException(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DIRECTORY);

        try {
            DocumentHelper::isDocument($document);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The document must be of 'document' type", $ex->getMessage());
        }
    }
}
