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

namespace WBW\Bundle\DocumentBundle\Tests\Model;

use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\Model\TestDocumentTrait;

/**
 * Document trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Model
 */
class DocumentTraitTest extends AbstractTestCase {

    /**
     * Test setDocument()
     *
     * @return void
     */
    public function testSetDocument(): void {

        // Set a Document mock.
        $document = $this->getMockBuilder(DocumentInterface::class)->getMock();

        $obj = new TestDocumentTrait();

        $obj->setDocument($document);
        $this->assertSame($document, $obj->getDocument());
    }
}
