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

namespace WBW\Bundle\DocumentBundle\Tests\Manager;

use WBW\Bundle\DocumentBundle\Manager\StorageManagerInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\Manager\TestStorageManagerTrait;

/**
 * Storage manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Manager
 */
class StorageManagerTraitTest extends AbstractTestCase {

    /**
     * Test setStorageManager()
     *
     * @return void
     */
    public function testSetStorageManager(): void {

        // Set a Storage manager mock.
        $storageManager = $this->getMockBuilder(StorageManagerInterface::class)->getMock();

        $obj = new TestStorageManagerTrait();

        $obj->setStorageManager($storageManager);
        $this->assertSame($storageManager, $obj->getStorageManager());
    }
}
