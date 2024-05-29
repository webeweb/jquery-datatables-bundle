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

namespace WBW\Bundle\CommonBundle\Tests\Provider\Image;

use WBW\Bundle\CommonBundle\Provider\Image\MimeTypeImageProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Image\TestMimeTypeImageProviderTrait;

/**
 * Mime type image provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Image
 */
class MimeTypeImageProviderTraitTest extends AbstractTestCase {

    /**
     * Test setMimeTypeImageProvider()
     *
     * @return void
     */
    public function testSetMimeTypeImageProvider(): void {

        // Set a Mimy type image provider mock.
        $mimeTypeImageProvider = $this->getMockBuilder(MimeTypeImageProviderInterface::class)->getMock();

        $obj = new TestMimeTypeImageProviderTrait();

        $obj->setMimeTypeImageProvider($mimeTypeImageProvider);
        $this->assertSame($mimeTypeImageProvider, $obj->getMimeTypeImageProvider());
    }
}
