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

use WBW\Bundle\CommonBundle\Provider\Image\MimeTypeImageProvider;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Mime type image provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Image
 */
class MimeTypeImageProviderTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.provider.image.mime_type", MimeTypeImageProvider::SERVICE_NAME);
    }
}
