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

namespace WBW\Bundle\DocumentBundle\Tests\Provider;

use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\MimeTypeIconProvider;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * Mime type icon provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Provider
 */
class MimeTypeIconProviderTest extends AbstractTestCase {

    /**
     * Test getIcon()
     *
     * @return void
     */
    public function testGetIcon(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DOCUMENT);
        $document->setMimeType("application/x-php");

        $obj = new MimeTypeIconProvider();

        $this->assertEquals("application-x-php.svg", $obj->getIcon($document));
    }

    /**
     * Test getIconAsset()
     *
     * @return void
     */
    public function testGetIconAsset(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DIRECTORY);

        $obj = new MimeTypeIconProvider();

        $this->assertStringContainsString("folder.svg", $obj->getIconAsset($document));
    }

    /**
     * Test getIcon()
     *
     * @return void
     */
    public function testGetIconWithDirectory(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setType(DocumentInterface::TYPE_DIRECTORY);

        $obj = new MimeTypeIconProvider();

        $this->assertEquals("folder.svg", $obj->getIcon($document));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.document.provider.mime_type_icon", MimeTypeIconProvider::SERVICE_NAME);

        $obj = new MimeTypeIconProvider();

        $this->assertNotNull($obj->getMimeTypeImageProvider());
    }
}
