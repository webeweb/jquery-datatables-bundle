<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Service;

use SplFileInfo;
use Throwable;
use WBW\Bundle\CommonBundle\Service\UploadedFileService;
use WBW\Bundle\CommonBundle\Service\UploadedFileServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Uploaded file service test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class UploadedFileServiceTest extends AbstractTestCase {

    /**
     * Directory.
     *
     * @var string
     */
    private $directory;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a directory mock.
        $this->directory = realpath(__DIR__ . "/../../../../var");
    }

    /**
     * Test exists()
     *
     * @return void
     */
    public function testExists(): void {

        $obj = new UploadedFileService($this->directory);

        $this->assertFalse($obj->exists("basename.bak"));
    }

    /**
     * Test path()
     *
     * @return void
     */
    public function testPath(): void {

        $dir = $this->directory;

        $obj = new UploadedFileService($this->directory);

        $this->assertEquals("$dir/basename.bak", $obj->path("basename.bak"));
    }

    /**
     * Test save()
     *
     * @return void
     */
    public function testSave(): void {

        // Set a directory mock.
        $dir = $this->directory . "/uploads/subdirectory";

        if (true === file_exists("$dir/basename.bak")) {
            unlink("$dir/basename.bak");
        }
        if (true === file_exists($dir)) {
            rmdir($dir);
        }

        // Set the file mocks.
        $src = __DIR__ . "/UploadedFileServiceTest.php";
        $dst = __DIR__ . "/UploadServiceTest.bak";

        if (true === file_exists($dst)) {
            unlink($dst);
        }

        copy($src, $dst);

        // Set an SPL file info mock.
        $uploadedFile = new SplFileInfo($dst);

        $obj = new UploadedFileService($this->directory);

        $res = $obj->save($uploadedFile, "/subdirectory", "basename.bak");
        $this->assertEquals("/uploads/subdirectory/basename.bak", $res);

        $this->assertFileExists("$dir/basename.bak");
    }

    /**
     * Test uniqId()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testUniqId(): void {

        $obj = new UploadedFileService($this->directory);

        $this->assertRegExp("/^[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}$/", $obj->uniqId());
    }

    /**
     * Test unlink()
     *
     * @return void
     */
    public function testUnlink(): void {

        $obj = new UploadedFileService($this->directory);

        $this->assertNull($obj->unlink("exception"));
        $this->assertTrue($obj->unlink("/uploads/subdirectory/basename.bak"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.service.uploaded_file", UploadedFileService::SERVICE_NAME);
        $this->assertEquals("/uploads", UploadedFileService::UPLOAD_DIRECTORY);

        $obj = new UploadedFileService($this->directory);

        $this->assertInstanceOf(UploadedFileServiceInterface::class, $obj);

        $this->assertEquals($this->directory, $obj->getDirectory());
    }
}
