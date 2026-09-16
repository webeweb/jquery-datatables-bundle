<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2026 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DocumentBundle\Tests\Serializer;

use WBW\Bundle\DocumentBundle\Serializer\SerializerKeys;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * Serializer keys test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Serializer
 */
class SerializerKeysTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("children", SerializerKeys::CHILDREN);
        $this->assertEquals("numberDownloads", SerializerKeys::NUMBER_DOWNLOADS);
    }
}
