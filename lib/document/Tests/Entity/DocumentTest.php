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

namespace WBW\Bundle\DocumentBundle\Tests\Entity;

use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * Document test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Entity
 */
class DocumentTest extends AbstractTestCase {

    /**
     * Test getChoiceLabel()
     *
     * @return void
     */
    public function testGetChoiceLabel(): void {

        $obj = new Document();

        $this->assertNull($obj->getChoiceLabel());

        $obj->setName("name");
        $this->assertEquals("name", $obj->getChoiceLabel());
    }

    /**
     * Test __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Document();

        $this->assertNull($obj->getChoiceLabel());
    }
}
