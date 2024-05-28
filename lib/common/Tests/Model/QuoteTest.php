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

namespace WBW\Bundle\CommonBundle\Tests\Model;

use WBW\Bundle\CommonBundle\Model\Quote;
use WBW\Bundle\CommonBundle\Model\QuoteInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Quote test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Model
 */
class QuoteTest extends AbstractTestCase {

    /**
     * Test setAuthor()
     *
     * @return void
     */
    public function testSetAuthor(): void {

        $obj = new Quote();

        $obj->setAuthor("author");
        $this->assertEquals("author", $obj->getAuthor());
    }

    /**
     * Test setSaint()
     *
     * @return void
     */
    public function testSetSaint(): void {

        $obj = new Quote();

        $obj->setSaint("saint");
        $this->assertEquals("saint", $obj->getSaint());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Quote();

        $this->assertInstanceOf(QuoteInterface::class, $obj);

        $this->assertNull($obj->getAuthor());
        $this->assertNull($obj->getContent());
        $this->assertNull($obj->getDate());
        $this->assertNull($obj->getSaint());
    }
}
