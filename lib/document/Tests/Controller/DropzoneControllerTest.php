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

namespace WBW\Bundle\DocumentBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Throwable;
use WBW\Bundle\DocumentBundle\Controller\DropzoneController;
use WBW\Bundle\DocumentBundle\Form\Type\AbstractFormType;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractWebTestCase;

/**
 * Dropzone controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Controller
 */
class DropzoneControllerTest extends AbstractWebTestCase {

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();
        parent::setUpSchemaTool();

        parent::setUpDocumentsEntities();
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexAction(): void {

        $client = $this->client;

        $client->request("GET", "/dropzone/index/1");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(0, $res);
    }

    /**
     * Test serializeAction()
     *
     * @return void
     */
    public function testSerializeAction(): void {

        $client = $this->client;

        $client->request("GET", "/dropzone/serialize/1");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);
        $this->assertCount(16, $res);

        $this->assertEquals(1, $res["id"]);
        $this->assertNotNull($res["createdAt"]);
        $this->assertNull($res["extension"]);
        $this->assertEquals("Home", $res["filename"]);
        $this->assertNull($res["hashMD5"]);
        $this->assertNull($res["hashSHA1"]);
        $this->assertNull($res["hashSHA256"]);
        $this->assertNull($res["mimeType"]);
        $this->assertEquals("Home", $res["name"]);
        $this->assertEquals(0, $res["numberDownloads"]);
        $this->assertNull($res["parent"]);
        $this->assertEquals(0, $res["size"]);
        $this->assertEquals(DocumentInterface::TYPE_DIRECTORY, $res["type"]);
        $this->assertNull($res["updatedAt"]);
    }

    /**
     * Test uploadAction()
     *
     * @return void
     */
    public function testUploadAction(): void {

        $path = realpath(__DIR__ . "/../Fixtures/Model/TestDocument.php");

        // Set an Uploaded file mock.
        $upload = new UploadedFile($path, "TestDocument.php", "application/php", 604);

        $client = $this->client;

        $crawler = $client->request("GET", "/dropzone/upload");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("text/html; charset=", $client->getResponse()->headers->get("Content-Type"));

        $submit = $crawler->filter("form");
        $form   = $submit->form([
            "wbw_document_document_upload[uploadedFile]" => $upload,
        ]);
        $client->submit($form);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(200, $res["status"]);
        $this->assertEquals("Document uploaded successfully", $res["notify"]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.document.controller.dropzone", DropzoneController::SERVICE_NAME);
    }
}
