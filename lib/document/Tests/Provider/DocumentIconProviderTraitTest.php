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

use WBW\Bundle\DocumentBundle\Provider\DocumentIconProvider;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\Provider\TestDocumentIconTrait;

/**
 * Document icon provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Provider
 */
class DocumentIconProviderTraitTest extends AbstractTestCase {

    /**
     * Test setDocumentIconProvider()
     *
     * @return void
     */
    public function testSetDocumentIconProvider(): void {

        // Set a Document icon provider mock.
        $documentIconProvider = new DocumentIconProvider();

        $obj = new TestDocumentIconTrait();

        $obj->setDocumentIconProvider($documentIconProvider);
        $this->assertSame($documentIconProvider, $obj->getDocumentIconProvider());
    }
}
