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

use WBW\Bundle\DocumentBundle\Provider\StorageProviderInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * Storage provider interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Provider
 */
class StorageProviderInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.edm.provider.storage", StorageProviderInterface::STORAGE_PROVIDER_TAG_NAME);
    }
}
