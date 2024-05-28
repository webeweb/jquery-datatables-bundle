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

use WBW\Bundle\CommonBundle\Service\UploadedFileServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Service\TestUploadedFileServiceTrait;

/**
 * Uploaded file service trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class UploadedFileServiceTraitTest extends AbstractTestCase {

    /**
     * Test setUploadedFileService()
     *
     * @return void
     */
    public function testSetUploadedFileService(): void {

        // Set an Uploaded file service mock.
        $uploadedFileService = $this->getMockBuilder(UploadedFileServiceInterface::class)->getMock();

        $obj = new TestUploadedFileServiceTrait();

        $obj->setUploadedFileService($uploadedFileService);
        $this->assertSame($uploadedFileService, $obj->getUploadedFileService());
    }
}
